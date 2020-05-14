
<footer class="footer">
    <nav class="footer-nav navigation-menu">
        <div class="container">
            <a href="/" class="header-logo">
                <img src="<?php bloginfo("template_url"); ?>/images/footer-logo.png" alt="">
            </a>
            <?php wp_nav_menu( array('theme_location' => 'Primary',
                'menu' => 'footer_menu',
                'menu_class' => 'footer-nav-list nav-list-wrapper kill-list',
                'container' => '',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>') );?>
        </div>
    </nav>
    <div class="footer-copywrite">
        <div class="container ">
            Copyright 2020 © ExperienceGeo. All Rights Reserved
        </div>
    </div>


</footer>
</div>
<script type="text/javascript">
    var t = document.getElementById('sql-text'),
        block = document.getElementsByClassName('main-text')[0],
        h1 = document.querySelector('#sql-text h1'),
        h1block= document.querySelector('.for-h');
    if(h1block)
        h1block.append(h1);
    if(block)
        block.appendChild(t);

</script>
<script src="<?php bloginfo('template_url');?>/js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>
<script  src="<?php bloginfo('template_url');?>/js/slick.min.js?v=2.1"></script>
<script  src="<?php bloginfo('template_url');?>/js/bundle.js?v1"></script>
<?php wp_footer(); ?>
</body>
</html>

