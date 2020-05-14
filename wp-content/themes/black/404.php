
<?php get_header(); ?>
    <article class="post-content" id="sql-text">
        <!-- <h1><?php echo(get_post_meta($post->ID, 'h1', true)); ?></h1> -->
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </article>
    <main class="main">
        <div class="container">
            <div class="inner-flex">
                <div class="main-content">
                    <!-- <div class="for-h"></div> -->
                    <!-- <div class="main-text"></div>   -->
                    <div class="main-items-list">
                        <article class="error color-green" >
                            <h1 class="error-title">404</h1>
                            <div class="error-btn">
                                <a class="" onclick="javascript:history.back(); return false;">back</a>
                            </div>
                        </article>
                    </div>
                </div>
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
        
    </main>
<?php get_footer(); ?>