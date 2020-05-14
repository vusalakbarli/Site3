
<?php get_header(); ?>
    <article class="post-content" id="sql-text">
        <!-- <h1><?php echo(get_post_meta($post->ID, 'h1', true)); ?></h1> -->
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </article>
    <div class="main-title single-main-title error-main">
        <div class="main-title-block single-main-title-block">
            <h1 class="error-title">404</h1>
        </div>
    </div>
<?php get_footer(); ?>