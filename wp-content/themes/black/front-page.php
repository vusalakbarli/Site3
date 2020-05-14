<?php get_header(); ?>
    <article class="post-content" id="sql-text">
        <h1><?php echo get_the_title() ?></h1>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </article>
<?php $post_id = get_field('post-id') ?>
<?php if ($post_id) { ?>
    <div class="top_post-preview">
        <div class="post-preview_slider-wrapper">
            <div class="post-preview_slider-arrows">
                <div class="container"></div>
            </div>
            <div class="container">
                <div class="post-preview_slider">
                    <?php foreach ($post_id as $key => $post_id) { ?>
                        <div class="post-preview">
                            <img src="<?php echo get_field('thumbnail', $post_id['id']) ?>">
                            <h4><?php echo get_field('title', $post_id['id']) ?></h4>
                            <p><?php echo get_field('description_slider', $post_id['id']) ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
<?php } ?>
    <main class="main">
        <div class="container">
            <div class="inner-flex">
                <div class="main-content">
                    <div class="main-text"></div>
                    <div class="for-h"></div>
                    <div class="main-items-list">
                        <?php
                        $cat_post = new WP_Query(array(
                            'category_name' => 'hotel'
                        ));
                        while ( $cat_post->have_posts() ) {
                            $cat_post->the_post();
                            get_template_part('main-item');
                            wp_reset_postdata(); };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>