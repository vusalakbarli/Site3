<?php get_header(); ?>
    <div class="main-title">
        <div class="main-title-block with-bg">
            <div class="main_banner_container">
                <h1 class="main_banner_title"><?php echo get_field('online_banner-title')?></h1>
                <h2 class="main_banner_subtitle"><?php echo get_field('online_banner-subtitle')?></h2>
                <h3 class="main_banner_subsubtitle"><?php echo get_field('online_banner-subtitle')?></h3>
                <p class="main_banner_text"><?php echo get_field('online_banner-text')?></p>
            </div>
        </div>
    </div>
    <div class="main-top">
        <div class="container">
            <span class="title">ALL CASINOS ARE: </span>
            <span class="main-top-item first">Licensed</span>
            <span class="main-top-item second">Secure & Trusted</span>
            <span class="main-top-item third">Fast Withdrawls</span>
        </div>
    </div>
    <main class="main">
        <p class="frontpage-heading heading tac accent">
               TOP 10 TRENDING CASINOS IN GEORGIA
        </p>

        <div class="container">
            <div class="main-bottom">
                <div class="main-bottom-table">
                    <table>
                        <tr>
                            <td class="table-img">OUR TOP PICKS</td>
                            <td class="table-bgc bonus">bonus</td>
                            <td class="table-bgc rate">user rating</td>
                            <td class="table-bgc score">our score</td>
                            <td>visit site</td>
                        </tr>
                        <?php 
                        $casino_items = get_field('casino_item'); $i = 1;
                        foreach($casino_items as $key => $casino_item) { 
                            ?>
                            <tr class="main-table-tr">
                                <td class="table-img"><span><?php echo $i; ?></span><img src="<?php echo $casino_item["casino_logo"] ?>"></td>
                                <td class="table-bgc bonus">
                                    <?php echo $casino_item["casino_bonus"] ?>
                                </td>
                                <td class="table-bgc rate">
                                    <div class="rate-img">
                                    <?php $stars = $casino_item['rate_stars'];
                                        for($j = 0; $j < $stars ; $j++) { ?>
                                        <img src="<?php bloginfo("template_url"); ?>/images/star.png" alt="">
                                    <?php }?>
                                    </div>
                                    <?php echo $casino_item["rate_text"] ?>
                                    <a href="<?php echo $casino_item["casno_link"] ?>" target="_blank">Read Review</a> 
                                </td>
                                <td class="table-bgc score">
                                    <p class="mob">our score</p>
                                    <?php echo $casino_item["casino_score"] ?>
                                </td>
                                <td>
                                    <a href="<?php echo $casino_item["casno_link"] ?>" class="table-btn" target="_blank">get bonus</a>
                                    <a href="<?php echo $casino_item["casno_link"] ?>" class="table-link"  target="_blank">Visit Casino</a>
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>