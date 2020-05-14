
<?php /*
Template Name: FAQ page
*/ ?>
<?php get_header(); ?>
<div class="main-title single-main-title">
    <div class="main-title-block with-bg">
        <div class="main_banner_container">
            <h1 class="main_banner_title"><?php echo get_field('online_banner-title')?></h1>
            <p class="main_banner_text"><?php echo get_field('online_banner-text')?></p>
        </div>
    </div>
</div>    <div class="main-top">
    <div class="container">
    </div>
</div>
    <main class="main page-main">
        <div class="container">
            <article class="post-content" id="sql-text">
                <h1><?php echo(get_post_meta($post->ID, 'h1', true)); ?></h1>
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </article>
            <section class="answers">
                <div class="akkordeon">
                    <ul class="kill-list">
                        <?php
                        $faq_repeater = get_field('faq_repeater');
                        foreach($faq_repeater as $key => $faq_item) {?>
                            <li class="akkordeon-section">
                                <p class="akkordeon-header"><?php echo $faq_item["question"] ?></p>
                                <div class="akkordeon-txt"><?php echo $faq_item["answer"] ?></div>
                            </li>
                        <?php }?>
                    </ul>
                </div>


            </section>
        </div>
    </main>
<?php get_footer(); ?>