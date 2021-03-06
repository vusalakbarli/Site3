<?php get_header(); ?>
    <article class="post-content" id="sql-text">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </article>
    <div class="main-title single-main-title">
        <div class="main-title-block single-main-title-block">
            <div class="container">
                <h1 class="heading page-heading"><?php echo(get_post_meta($post->ID, 'h1', true)); ?></h1>
                <?php if(get_field('online_banner-text')) {?>
                    <p><?php echo get_field('online_banner-text')?></p>
                <?php }?>
            </div>

        </div>
    </div>
    <main class="main page-main">
        <div class="container">
            <div class="main-text"></div>
        </div>
    </main>
<?php get_footer(); ?>