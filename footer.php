

<?php if (is_home() || is_archive() || is_search() || is_404() ) { ?>
</div>
<?php } ?>

      </div>
    </div>

    <footer class="site-footer">

  <div class="wrapper">

    <div class="footer-col-wrapper">
      <div class="footer-col footer-col-1">
<?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
} else {
?>        <ul class="contact-list">
          <li><a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></li>
          <li><?php bloginfo('name'); ?></li>
        </ul>
<?php 
}
?>
      </div>

      <div class="footer-col footer-col-2">

<?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
} else {
?>
<?php
}
?>
      </div>

      <div class="footer-col footer-col-3">
<?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
} else {
?>
<?php
}
?>
      </div>

    </div>

  </div>

</footer>
<?php wp_footer(); ?>
  </body>

</html>

