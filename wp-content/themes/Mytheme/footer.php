
    <footer class="footer">
      <div class="container">
        <div class="footer-wrapper">
          <div class="footer-navigation">
            <a href="/" class="footer-logo">
              <img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="">
            </a>
            <?php wp_nav_menu( array('theme_location' => 'Primary',
              'menu' => 'footer-online_menu',
              'menu_class' => 'footer-nav-list kill-list',
              'container' => '',
              'items_wrap' => '<ul class="%2$s">%3$s</ul>') );?>
          </div>
          <div class="footer-copywrite"> © <?php echo $_SERVER['HTTP_HOST']; ?> ALL RIGHTS RESERVED</div>
        </div>
      </div>
      
     
    </footer>
  </div>
 
  <script src="<?php bloginfo('template_url');?>/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>
  <script  src="<?php bloginfo('template_url');?>/js/slick.min.js?v=2.1"></script>
  <script  src="<?php bloginfo('template_url');?>/js/bundle.js?v1"></script>    
  <?php wp_footer(); ?>
</body>
</html>

