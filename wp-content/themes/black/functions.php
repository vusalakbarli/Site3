<?php

//style and script
add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
    wp_enqueue_style('style-name', get_stylesheet_uri(), array(), "9.811129");
}

// Generate menu
register_nav_menus(array(
    'Primary' => __('Primary menu')
));
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    $classes = array("nav-item");
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_menu_atts', 10, 3);
function add_menu_atts($atts, $item, $args)
{
    $atts['class'] = 'nav-item-link';
    // $atts['rel'] = 'nofollow';
    if ($item->current) {
        $atts['class'] = "nav-item-link__active";
    }
    $atts["href"] = wp_make_link_relative($atts["href"]);
    return $atts;
}

add_filter('walker_nav_menu_start_el', 'filter_function_name_2880', 10, 4);
function filter_function_name_2880($item_output, $item, $depth, $args)
{
    $match_class = "nav-item-link__active";
    if (preg_match('/' . $match_class . '/', $item_output)) {
        preg_match('/\">(.*)<\//', $item_output, $matches);
        $item_output = '<span class="' . $match_class . '">' . $matches[1] . '</span>';
    }
    return $item_output;
}

add_filter('nav_menu_item_id', '__return_false');

// SHOW THUMBNAILS
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
// remove admin-bar on front-page
show_admin_bar(true);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
function my_function_admin_bar()
{
    return false;
}
// remove unnesusary wp-styles
add_filter('show_admin_bar', 'my_function_admin_bar');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_resource_hints', 2);


// H1 for category.php
add_action('admin_init', 'category_custom_fields', 1);
add_action('create_category', 'category_custom_fields_save');
add_action('category_add_form_fields', 'category_custom_fields_form');
function category_custom_fields()
{
    add_action('edit_category_form_fields', 'category_custom_fields_form');
    add_action('edited_category', 'category_custom_fields_save');
}
function category_custom_fields_form($tag)
{
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('H1 для категории'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[cat_h1]" id="Cat_meta[cat_h1]" size="25" style="width:60%;" value="<?php echo
                                                                                                                        $cat_meta['cat_h1'] ? $cat_meta['cat_h1'] : ''; ?>"><br />
            <span class="description"><?php _e('H1 категории'); ?></span>
        </td>
    </tr>
<?php
}
function category_custom_fields_save($term_id)
{
    if (isset($_POST['Cat_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Cat_meta'][$key])) {
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        update_option("category_$t_id", $cat_meta);
    }
}
// H1 for tag.php
add_action('admin_init', 'tag_custom_fields', 1);
function tag_custom_fields()
{
    add_action('edit_tag_form_fields', 'tag_custom_fields_form');
    add_action('edited_post_tag', 'tag_custom_fields_save');
    add_action('create_post_tag', 'tag_custom_fields_save');
    add_action('post_tag_add_form_fields', 'tag_custom_fields_form');
}

function tag_custom_fields_form($tag)
{
    $t_id = $tag->term_id;
    $cat_meta = get_option("post_tag_$t_id");
?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('H1 для tag.php'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[h1_for_tag]" id="Cat_meta[h1_for_tag]" size="25" style="width:60%;" value="<?php echo
                                                                                                                                $cat_meta['h1_for_tag'] ? $cat_meta['h1_for_tag'] : ''; ?>"><br />
            <span class="description"><?php _e('Title');
                                        echo ' H1'; ?></span>
        </td>
    </tr>
<?php
}

function tag_custom_fields_save($term_id)
{
    if (isset($_POST['Cat_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("post_tag_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Cat_meta'][$key])) {
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        update_option("post_tag_$t_id", $cat_meta);
    }
}

// Вывод произвольных игр. В код страницы вставить код: <!--@@@\d+-->
function insert_random_game($content)
{
    $pattern = '/<!--@@@\d+-->/miU';
    preg_match_all($pattern, $content, $matches);
    $size = count($matches[0]);
    $second_query = new WP_Query();
    $second_query->query(array('orderby' => 'rand'/*,'category__not_in'=>12*/));
    $array[] = 0;
    $m = 0;
    while ($second_query->have_posts()) {
        $second_query->the_post();
        $array[$m] = get_post($post->ID);
        $m++;
    }
    $len = count($array);
    $k = 0;
    for ($i = 0; $i < $size; $i++) {
        $game_line_part = '<ul class="wp-spisok-igr">';
        $result = substr($matches[0][$i], 7, -3) * 1;
        $result = $result + $k;
        for ($k; $k < $result && $k < $len; $k++) {
            $game_line_part =  $game_line_part . '<li><a href="' . get_permalink($array[$k]->ID) . '" title="' . get_the_title($array[$k]->ID) . '">' .
                get_the_post_thumbnail($array[$k]->ID) . '<b>' . get_the_title($array[$k]->ID) . '</b></a></li>';
        }
        $game_line_part = $game_line_part . ' </ul>';
        $content = preg_replace($pattern, $game_line_part, $content, 1);
    }
    wp_reset_postdata();
    return $content;
}

add_filter('excerpt_length', function () {
    return 45;
});
add_filter('excerpt_more', function ($more) {
    return '...';
});



function true_load_posts()
{

    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts($args);
    // если посты есть
    if (have_posts()) :

        // запускаем цикл
        while (have_posts()) : the_post();

            // get_template_part( 'template-parts/post/content', get_post_format() );
            get_template_part('template_parts/news-item');
        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


// Add nofollow tag on specific pages

function theme_pmtrade_header_metadata()
{
    global $wp;
    if ($wp->request == "promotions" || $wp->request == "parimatch" || $wp->request == "promo-12-19")
        echo '<meta name="robots" content="noindex, follow" />';
}

add_action('wp_head', 'theme_pmtrade_header_metadata');



add_action('wp_ajax_getRefer', 'getReferAndParams'); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action('wp_ajax_nopriv_getRefer', 'getReferAndParams');  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}


global $http_referer;
$http_referer = $_SERVER['HTTP_REFERER'];
function getReferAndParams()
{
    global $http_referer;

    $data = (object) [
        "referer" => $http_referer
    ];
    echo json_encode($data);
    wp_die();
}

// add_action('wp_enqueue_scripts', 'enqueue_scripts');
// function enqueue_scripts() {
//     wp_enqueue_script('jquery');
// }


// REMOVE UNUSED WP SCRIPTS AND CSS
function wpassist_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('tablepress-default');
    wp_dequeue_style('tablepress-custom');
    wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');


function wp_navigation()
{

    global $wp_query, $wp_rewrite;

    $pages = "";
    $max = $wp_query->max_num_pages;

    if (!$current = get_query_var("paged")) {

        $current = 1;
    }

    $a["base"] = str_replace(999999999, "%#%", get_pagenum_link(999999999));
    $a["total"] = $max;
    $a["current"] = $current;
    $total = 0; // 1 - выводить текст «Страница N из N», 0 - не выводить
    $a["mid_size"] = 5; // сколько ссылок показывать слева и справа от текущей
    $a["end_size"] = 5; // сколько ссылок показывать в начале и в конце
    $a["prev_text"] = "&larr;"; // текст ссылки «Предыдущая страница»
    $a["next_text"] = "&rarr;"; // текст ссылки «Следующая страница»

    if ($max > 1) {

        echo "<nav class=\"navigation\">";
    }

    if ($total == 1 && $max > 1) {

        $pages = "<span class=\"pages\">Страница " . $current . " из " . $max . "</span>\r\n";
    }

    echo $pages . paginate_links($a);

    if ($max > 1) {

        echo "</nav>";
    }
}
function contactform_func(){
    return"
                <form class=\"form-wrapper\">
                    <div class=\"form-row\">
                        <label for=\"name\">
                            Your Name
                            <input type=\"text\" class=\"js-input-validation\" pattern=\"[a-zA-Z]{2,32}\" required>
                        </label>
                        <label for=\"email\">
                            Your E-mail
                            <input type=\"email\" class=\"js-input-validation\" required>
                        </label>
                        <label for=\"phone\">
                            Your Phone
                            <input type=\"text\" class=\"js-input-validation\" pattern=\"^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$\" required>
                        </label>
                    </div>
                    <div class=\"form-row\">
                        <label for=\"message\">Your Message
                            <textarea name=\"message\" id=\"\" cols=\"30\" rows=\"10\" required></textarea>
                        </label>
                    </div>
                    <div class=\"form-row\">
                        <button class=\"js-form-validation\">send</button>
                    </div>
                </form>
    ";
}
add_shortcode('contact_form', 'contactform_func');