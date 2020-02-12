<?php
/**
 * All helper functions for woocommerce helper
 *
 * @package Responsive
 */

if ( ! function_exists( 'responsive_woo_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_woo_woocommerce_template_loop_product_title() {

		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="responsive-loop-product__link">';
		responsive_template_loop_product_title();
		echo '</a>';
	}
}


if ( ! function_exists( 'responsive_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_template_loop_product_title() {
		echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'responsive_woocommerce_shop_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_shop_elements_positioning() {

		// Default sections.
		$sections = array( 'category', 'title', 'price', 'ratings', 'add_cart' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}

if ( ! function_exists( 'responsive_woocommerce_product_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_product_elements_positioning() {

		// Default sections.
		$sections = array( 'category', 'title', 'price', 'ratings', 'short_desc', 'add_cart' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}
/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'responsive_woo_shop_product_short_description' ) ) {
	/**
	 * Product short description
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_product_short_description() {
		if ( has_excerpt() ) {
			the_excerpt();
		}
	}
}
/**
 * Shop page - Category
 */
if ( ! function_exists( 'responsive_woo_shop_parent_category' ) ) {
	/**
	 * Product Category
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_parent_category() {
		if ( apply_filters( 'responsive_woo_shop_parent_category', true ) ) {

			echo '<p class="responsive_woo_shop_parent_category">';

			global $product;
			$product_categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ';', '', '' ) : $product->get_categories( ';', '', '' );

			$product_categories = htmlspecialchars_decode( wp_strip_all_tags( $product_categories ) );
			if ( $product_categories ) {
				list($parent_cat) = explode( ';', $product_categories );
				echo esc_html( $parent_cat );
			}
			echo '</p>';
		}
	}
}
