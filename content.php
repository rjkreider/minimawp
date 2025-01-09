<?php

    if(function_exists('bcn_display'))
    {
	?> <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/"> <?php
            bcn_display();
    ?> </div> <?php } ?>

<article class="post h-entry" itemscope itemtype="http://schema.org/BlogPosting">

<header class="post-header">
    <h1 class="post-title p-name" itemprop="name headline"><?php the_title(); ?></h1>

<?php
if (!is_page()) {
?>
    <p class="post-meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished" class="dt-published"><?php the_date(); ?></time>

 </p>
  </header>
<?php } ?>
</header>
  <div class="post-content" itemprop="articleBody">
	<?php the_content(); ?>
<?php 

if (get_theme_mod('mwp_enable_postmeta')==1) {

// Get the categories for the current post
$categories = get_the_category();
$tags = get_the_tags();

if ($categories || $tags) : 
?>
    <div class="post-meta-footer">
        <!-- Categories section -->
        <?php if ($categories) : ?>
            <div class="post-categories">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="category-item">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Tags section -->
        <?php if ($tags) : ?>
            <div class="post-tags">
                <?php foreach ($tags as $tag) : ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-item">#<?php echo esc_html($tag->name); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif;

} ?>

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
