<section class="latest_posts">
    <?=wp_get_attachment_image(get_field('background'),'full',false,array('class' => 'latest_posts__bg'))?>
    <div class="container-xl text-center py-5">
        <h2 class="mb-0 pb-5">Journal</h2>
        <div class="row g-4 mb-5">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4
        ));
        while ($q->have_posts()) {
            $q->the_post();
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
        ?>
        </div>
        <a href="/journal/" class="button button-green">Read More</a>
    </div>
</section>