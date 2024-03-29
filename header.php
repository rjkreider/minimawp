<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php if (is_single() || is_page()) { echo the_title(); echo " | "; } ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('site-description');?>">

  <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

  <body>

    <header class="site-header">

  <div class="wrapper" style="display:flex; justify-content: space-between; width:100%;align-items:center;">
<div style="display:flex; flex-direction:column;">    <a class="site-title"  href="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-bottom:0;padding-bottom:0!important;line-height:1em;padding-top:.5em;">
<?php bloginfo('name');?>
</a></span>
<span style="font-style: italic;margin-bottom: .5em;font-size: smaller;margin-top:0;"><?php bloginfo('description');?></span>
</div>

    <nav class="site-nav" style="margin-left:auto;">
      <a href="#" class="menu-icon">
        <svg viewBox="0 0 18 15">
          <path fill="#424242" d="M18,1.484c0,0.82-0.665,1.484-1.484,1.484H1.484C0.665,2.969,0,2.304,0,1.484l0,0C0,0.665,0.665,0,1.484,0 h15.031C17.335,0,18,0.665,18,1.484L18,1.484z"/>
          <path fill="#424242" d="M18,7.516C18,8.335,17.335,9,16.516,9H1.484C0.665,9,0,8.335,0,7.516l0,0c0-0.82,0.665-1.484,1.484-1.484 h15.031C17.335,6.031,18,6.696,18,7.516L18,7.516z"/>
          <path fill="#424242" d="M18,13.516C18,14.335,17.335,15,16.516,15H1.484C0.665,15,0,14.335,0,13.516l0,0 c0-0.82,0.665-1.484,1.484-1.484h15.031C17.335,12.031,18,12.696,18,13.516L18,13.516z"/>
        </svg>
      </a>

	 <div class="trigger">
		<?php
		$menuParam = array(
			'theme_location' => 'mwp-custom-menu',
			'container' => false,
			'echo' => false,
			'items_wrap' => '%3$s',
			'depth' => 1,
			'exclude' => 71,
			);

		echo strip_tags(wp_nav_menu($menuParam), '<a>');
		?>

		<div class="navsearchform">
			<?php get_search_form(); ?>
		</div>
	</div> 
</nav>
</div>

</header>

    <div class="page-content">
      <div class="wrapper">
<?php if (is_home() || is_archive() || is_search() || is_404() ) { ?>
        <div class="home">
<?php } ?>

