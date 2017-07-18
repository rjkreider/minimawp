
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">

  <header class="post-header">
    <h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
    <p class="post-meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished"><?php the_date(); ?></time></p>
  </header>

  <div class="post-content" itemprop="articleBody">
	<?php the_content(); ?>
  </div>
</article>

<?php get_footer(); ?>
