<?php

function mwp_custom_menu() {
        register_nav_menu('mwp-custom-menu',__('Top Menu'));
}
add_action('init', 'mwp_custom_menu');

function mwp_customize_register($wp_customize) {

$wp_customize->add_section('mwp_options', array(
'title'		=> 'Theme Options',
'priority'	=> 200
));

$wp_customize->add_setting('mwp_enable_disqus', array(
'default' => '0',
'transport'	=> 'refresh'
));
$wp_customize->add_setting('mwp_disqus_shortname', array(
'default' 	=> '',
'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('mwp_enable_disqus', array(
'section'	=> 'mwp_options',
'label'		=> 'Enable Disqus?',
'type'		=> 'checkbox',
'default'	=> '0',
));

$wp_customize->add_control('mwp_disqus_shortname', array(
'section'	=> 'mwp_options',
'label'		=> 'Shortname: ',
'type'		=> 'text',
));

}

add_action('customize_register', 'mwp_customize_register');



register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

add_post_type_support( 'page', 'excerpt' );




add_theme_support( 'html5', array( 'search-form' ) );
function disable_self_ping( &$links ) {
 foreach ( $links as $l => $link )
 if ( 0 === strpos( $link, get_option( 'home' ) ) )
 unset($links[$l]);
}
add_action( 'pre_ping', 'disable_self_ping' );


// Disable Embeds
function my_deregister_scripts(){
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// Remove type=text/javascript or text/css on links/script tags
add_action('wp_loaded', 'output_buffer_start');
function output_buffer_start() { 
    ob_start("output_callback"); 
}

add_action('shutdown', 'output_buffer_end');
function output_buffer_end() { 
    ob_end_flush(); 
}

function output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}
