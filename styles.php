<?php

function arrisdesign_custom_styles($custom) {
	//Primary color
	$primary_color = esc_html(get_theme_mod( 'primary_color' ));
	if ( $primary_color != '#D9D4A6' ) {
		$custom = ".site-header, .site-content { background-color: {$primary_color}; }"."\n";
		$custom .= "h1, #text-2 h3, #text-2 .textwidget, .footcontanier h3, .footcontanier .textwidget { color: {$primary_color}; }"."\n";
	}
	//Secondary color
	$secondary_color = esc_html(get_theme_mod( 'secondary_color' ));
	if ( $secondary_color != '#3296B8' ) {
		$custom .= ".headcontanier, .leftnavbar, .site-footer, .main-navigation  { background-color: {$secondary_color}; }"."\n";
		$custom .= ".footer-widget-area { border-top-color: {$secondary_color}; }"."\n";
		$custom .= "h2 { color: {$secondary_color}; }"."\n";
	}
	$tertiary_color = esc_html(get_theme_mod( 'tertiary_color' ));
	if ( $tertiary_color != '#B4AA51' ) {
		$custom .= "#text-2 { background-color: {$tertiary_color}; }"."\n";
		$custom .= "h3 { color: {$tertiary_color}; }"."\n";
	}
	$quaternary_color = esc_html(get_theme_mod( 'quaternary_color' ));
	if ( $quaternary_color != '#025269' ) {
		$custom .= ".post_thumb { background-color: {$quaternary_color}; }"."\n";
		$custom .= "h4 { color: {$quaternary_color}; }"."\n";
	}

	//Fonts
	$headings_font = esc_html(get_theme_mod('headings_fonts'));	
	$body_font = esc_html(get_theme_mod('body_fonts'));	
	
	if ( $headings_font ) {
		$font_pieces = explode(":", $headings_font);
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$font_pieces[0]}; }"."\n";
	}
	if ( $body_font ) {
		$font_pieces = explode(":", $body_font);
		$custom .= "body { font-family: {$font_pieces[0]}; }"."\n";
	}	
	
	//Output all the styles
	wp_add_inline_style( 'arrisdesign-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'arrisdesign_custom_styles' );