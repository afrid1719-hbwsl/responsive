import DimensionsComponent from './dimensions-component.js';


export const responsiveDimensions = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
	ReactDOM.render( <DimensionsComponent control={ control } />, control.container[0] );
	},
	ready: function() {

        'use strict';

        var control = this;
        control.container.on( 'click',
				'.responsive-switchers button',
				function( event ) {

					// Set up variables
					var $this 		= jQuery( this ),
						$devices 	= jQuery( '.responsive-switchers' ),
						$device 	= jQuery( event.currentTarget ).data( 'device' ),
						$control 	= jQuery( '.customize-control.has-switchers' ),
						$body 		= jQuery( '.wp-full-overlay' ),
						$footer_devices = jQuery( '.wp-full-overlay-footer .devices' );
			
					// Button class
					$devices.find( 'button' ).removeClass( 'active' );
					$devices.find( 'button.preview-' + $device ).addClass( 'active' );
			
					// Control class
					$control.find( '.control-wrap' ).removeClass( 'active' );
					$control.find( '.control-wrap.' + $device ).addClass( 'active' );
					$control.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + $device );
			
					// Wrapper class
					$body.removeClass( 'preview-desktop preview-tablet preview-mobile' ).addClass( 'preview-' + $device );
			
					// Panel footer buttons
					$footer_devices.find( 'button' ).removeClass( 'active' ).attr( 'aria-pressed', false );
					$footer_devices.find( 'button.preview-' + $device ).addClass( 'active' ).attr( 'aria-pressed', true );
			
					// Open switchers
					if ( $this.hasClass( 'preview-desktop' ) ) {
						$control.toggleClass( 'responsive-switchers-open' );
					}
				} 
			);
    },
} );
