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

<?php get_footer(); ?>
