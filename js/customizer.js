/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	//Primary color
	wp.customize('primary_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-header, .site-content').css('background-color', newval );
			$('h1, #text-2 h3, #text-2 .textwidget, .footcontanier h3, .footcontanier .textwidget').css('color', newval );
		} );
	});
	//Secondary color
	wp.customize('secondary_color',function( value ) {
		value.bind( function( newval ) {
			$('.headcontanier, .leftnavbar, .site-footer, .main-navigation').css('background-color', newval );
			$('.footer-widget-area').css('border-top-color', newval );
			$('h2').css('color', newval );
		} );
	});
	//tertiary color
	wp.customize('tertiary_color',function( value ) {
		value.bind( function( newval ) {
			$('#text-2').css('background-color', newval );
			$('h3').css('color', newval );
		} );
	});
	//tertiary color
	wp.customize('quaternary_color',function( value ) {
		value.bind( function( newval ) {
			$('.post_thumb').css('background-color', newval );
			$('h4').css('color', newval );
		} );
	});
} )( jQuery );