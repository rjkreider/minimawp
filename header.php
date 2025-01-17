<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php if (is_single() || is_page()) { echo the_title(); echo " | "; } ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('site-description');?>">

<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">

<?php wp_head(); ?>
</head>

  <body>

    <header class="site-header">

	<div class="wrapper">
	<a class="site-title"  href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bloginfo('name');?>
	</a>

    <nav class="site-nav">
<input type="checkbox" id="nav-trigger" class="nav-trigger">
<label for="nav-trigger">
          <span class="menu-icon">
            <svg viewBox="0 0 18 15" width="18px" height="15px">
              <path d="M18,1.484c0,0.82-0.665,1.484-1.484,1.484H1.484C0.665,2.969,0,2.304,0,1.484l0,0C0,0.665,0.665,0,1.484,0 h15.032C17.335,0,18,0.665,18,1.484L18,1.484z M18,7.516C18,8.335,17.335,9,16.516,9H1.484C0.665,9,0,8.335,0,7.516l0,0 c0-0.82,0.665-1.484,1.484-1.484h15.032C17.335,6.031,18,6.696,18,7.516L18,7.516z M18,13.516C18,14.335,17.335,15,16.516,15H1.484 C0.665,15,0,14.335,0,13.516l0,0c0-0.82,0.665-1.483,1.484-1.483h15.032C17.335,12.031,18,12.695,18,13.516L18,13.516z"></path>
            </svg>
          </span>
        </label>

	 <div class="trigger">
<?php
// Define menu parameters
$menuParam = array(
    'theme_location' => 'mwp-custom-menu',
    'container' => false,
    'echo' => false,
    'items_wrap' => '%3$s', // Outputs only the menu items without wrapping <ul>
    'depth' => 1,
);

add_filter('nav_menu_link_attributes', 'time_thief_custom_menu_link_attributes', 10, 3);
function time_thief_custom_menu_link_attributes($atts, $item, $args)
{
    // Check if this is the correct menu
    if (isset($args->theme_location) && $args->theme_location === 'mwp-custom-menu') {
        $atts['class'] = (isset($atts['class']) ? $atts['class'] . ' ' : '') . 'page-link';
    }
    return $atts;
}

$menu = wp_nav_menu($menuParam);

$allowed_html = array(
    'a' => array(
        'href' => array(),
        'class' => array(),
        'title' => array(),
    ),
    'form' => array(
        'role' => array(),
        'method' => array(),
        'id' => array(),
        'action' => array(),
    ),
    'input' => array(
        'type' => array(),
        'placeholder' => array(),
        'name' => array(),
        'id' => array(),
        'value' => array(),
    ),
);
if ($menu) {
if (get_theme_mod('mwp_enable_search')==1) {
   $searchMenuItem = '<form role="search" method="get" id="menu-search-form" action="'. home_url('/') . '"><input type="search" placeholder="&#x1F50E;&#xFE0E;Search..." name="s" id="menu-search-input" value></form>';
   $menu .= $searchMenuItem;
}
echo wp_kses($menu,$allowed_html);
}
?>

	</div> 
</nav>
</div>
</div>
</header>

    <div class="page-content">
      <div class="wrapper">
<?php if (is_home() || is_archive() || is_search() || is_404() ) { ?>
        <div class="home">
<?php } ?>

