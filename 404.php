<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>

<article class="post">

  <header class="post-header">
    <h1 class="post-title"><?php _e( 'Not Found', 'minimawp' ); ?></h1>
  </header>

  <div class="post-content">
<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'minimawp' ); ?></p>

					<?php get_search_form(); ?>
</div>

</article>

<?php get_footer(); ?>
