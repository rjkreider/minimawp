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

