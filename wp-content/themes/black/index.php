            <?php get_header(); ?>
            <article class="container">
                <h1 class="red-title"><?php echo get_the_title() ?></h1>
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php the_content(); ?>
                <?php edit_post_link(__('Edit This')); ?>
                <?php endwhile; endif; ?>

            </article>



            <?php get_footer(); ?>
