<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$pp = get_option('page_for_posts');

?>
<main id="main" class="pb-5">
    <section class="hero pt-5">
        <div class="container-xl pt-5 text-center">
            <h1><?=get_the_title($pp)?></h1>
            <?php
            if (get_the_content(null, false, $pp) ?? null) {
                ?>
            <div class="fs-700 text-white text-balance mb-4"><?=get_the_content(null, false, $pp)?></div>
                <?php
            }
            ?>
        </div>
    </section>
    <div class="container-xl py-5 mb-5">
        <div class="grid">
            <?php
    while (have_posts()) {
        the_post();
        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if (!$img) {
            $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
        }
        $cats = get_the_category();
        $category = wp_list_pluck($cats, 'name');
        $flashcat = acf_slugify($category[0]);
        $catclass = implode(' ', array_map('acf_slugify', $category));
        $category = implode(', ', $category);

        $the_date = get_the_date('jS F, Y');

        ?>
            <a class="grid__card"
                href="<?=get_the_permalink(get_the_ID())?>">
                <div class="card">
                    <div class="card__image_container">
                        <?=get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'card__image'))?>
                    </div>
                    <div class="card__inner">
                        <h3 class="card__title mb-0">
                            <?=get_the_title()?>
                        </h3>
                        <div class="card__date"><?=$the_date?>
                        </div>
                        <div class="card__content">
                            <div class="card__content__overlay"></div>
                            <?=wp_trim_words(get_the_content(get_the_ID()), 20)?>
                        </div>
                    </div>
                </div>
            </a>
            <?php
    }
?>
        </div>
    </div>
</main>
<?php
get_footer();
?>