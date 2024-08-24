<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
$img = get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'single-blog__image'));

add_action('wp_head',function() {
    global $schema;
    echo $schema;
});

get_header();
// $img = get_the_post_thumbnail_url(get_the_ID(),'full');

?>
<main id="main" class="single-blog">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <section class="breadcrumbs text-white fs-200 container-xl pt-4 pb-2">
        <?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
    </section>
    <div class="container-xl">
        <div class="row g-4 pb-5 justify-content-center">
            <div class="col-lg-9 bg-white text-black">
                <h1 class="h1"><?=get_the_title()?>
                </h1>
                <?=$img?>
                <div class="single-blog__read">
                    <?=get_the_date()?> |
                    <?=estimate_reading_time_in_minutes(get_the_content(), 200, true, true)?>
                </div>
                <?php
foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            echo '<a id="' . $id . '" class="anchor"></a>';
            $sidebar[$heading] = $id;
        }
    }
    // echo render_block($block);
    echo apply_filters('the_content', render_block($block));
}
?>
            </div>
        </div>
        <?php

$cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');

$q = new WP_Query(array(
    'post_type' => 'post',
    'category__in' => $ids,
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID())
));

if ($q->have_posts()) {
    ?>
<section class="latest_posts">
    <h3 class="fs-700"><span>Related</span> Posts</h3>
    <div class="row mb-4">
        <?php
    while ($q->have_posts()) {
    $q->the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$img) {
        $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
    }

    ?>
        <div class="col-sm-6 col-xl-3">
            <div class="latest__line mb-3"></div>
            <a href="<?=get_the_permalink(get_the_ID())?>" class="latest_posts__card">
                <?=get_the_post_thumbnail( get_the_ID(), 'large', array('class' => 'latest_posts__card_bg') )?>
                <h3><?=get_the_title(get_the_ID())?></h3>
            </a>
            <div class="latest__line mt-3"></div>
        </div>
    <?php
    }
    wp_reset_postdata();
    ?>
    </div>
</section>
    <?php
}
?>
    </div>
</main>
<?php
get_footer();
?>