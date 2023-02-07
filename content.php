<?php

    if(function_exists('bcn_display'))
    {
	?> <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/"> <?php
            bcn_display();
    ?> </div> <?php } ?>

<article class="post" itemscope itemtype="http://schema.org/BlogPosting">

  <?php
if (!is_page()) {
?><header class="post-header">
    <h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
    <p class="post-meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished"><?php the_date(); ?></time> /
<?php
$categories = get_the_category();
$separator = ', ';
$output = '';
if ( ! empty( $categories ) ) {
	foreach( $categories as $category ) {
		$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
	}
	echo trim( $output, $separator );
}
?> 
 </p>
  </header>
<?php } ?>
  <div class="post-content" itemprop="articleBody">
	<?php the_content(); ?>
  </div>
<?php
if (get_theme_mod('mwp_enable_disqus')==1 &&  get_theme_mod('mwp_disqus_shortname') != "") {
$disqus_shortname=strip_tags(addslashes(get_theme_mod('mwp_disqus_shortname')));
?>
<hr/><h2 style="font-weight:bolder;">Comments</h2>
<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
this.page.url = "<?php the_permalink(); ?>"; // <--- use canonical URL
this.page.identifier = "<?php the_permalink(); ?>";
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//<?php echo $disqus_shortname; ?>.disqus.com/embed.js'; // <--- use Disqus shortname

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<?php
}
?>
<?php
comments_template('/comments.php', $separate_comments=true); 
?>
</article>

<?php get_footer(); ?>
