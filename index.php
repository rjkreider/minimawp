<?php get_header(); ?>

<?php if (is_home() || is_archive() || is_search() || is_404() ) {
?>  <ul class="post-list"> <?php } ?>
<?php
if (have_posts() ) : while (have_posts() ) : the_post();

if (is_home() || is_archive() || is_search() || is_404() ) {
?>
	<li>
	<span class="post-meta"><?php the_date(); ?></span>
	<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</li>
<?php
} else {
get_template_part('content', get_post_format());
}
endwhile; endif;
?>  
<?php if (is_home() || is_archive() || is_search() || is_404()) { ?>  </ul> <?php } ?>
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$the_query = new WP_Query( 'posts_per_page=5&paged=' . $paged ); 


if ( $the_query->have_posts() ) :

    // the loop
/**    while ( $the_query->have_posts() ) : $the_query->the_post(); 
        the_title();
    endwhile; 
**/
next_posts_link( '&laquo; Older Posts ', $the_query->max_num_pages );
previous_posts_link( ' <span style="float:right;">Newer Posts &raquo;</span>' );

// clean up after our query
wp_reset_postdata();
endif;  ?>
<?php get_footer(); ?>
