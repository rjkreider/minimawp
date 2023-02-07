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

function excerpt_first_sentencex( $string ) {
 
    $sentence = preg_split( '/(\.|!|\?)\s/', $string, 2, PREG_SPLIT_DELIM_CAPTURE );
    return $sentence['0'] . $sentence['1'];
 
}

function excerpt_first_sentence($string) {
    $split = preg_split('/(\.|\!|\?)/', $string, 3, PREG_SPLIT_DELIM_CAPTURE);
    $custom_desc = implode('', array_slice($split, 0, 4));

    return $custom_desc;
}
function xwp_trim_excerpt($text) { // Fakes an excerpt if needed
    global $post;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        $text = strip_tags($text);
        $excerpt_length = 55;
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words)> $excerpt_length) {
            array_pop($words);
            array_push($words, '[...]');
            $text = implode(' ', $words);
        }
    }
    return $text;
}

function lt_html_excerpt($text) { // Fakes an excerpt if needed
    global $post;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        /*just add all the tags you want to appear in the excerpt --
        be sure there are no white spaces in the string of allowed tags */
        $text = strip_tags($text,'<p><br><b><a><em><strong><code><pre><kbd>');
        /* you can also change the length of the excerpt here, if you want */
        $excerpt_length = 55; 
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words)> $excerpt_length) {
            array_pop($words);
            array_push($words, '[...]');
            $text = implode(' ', $words);
        }
    }
    return $text;
}

/* remove the default filter */
remove_filter('get_the_excerpt', 'xwp_trim_excerpt');

/* now, add your own filter */
add_filter('get_the_excerpt', 'lt_html_excerpt');
