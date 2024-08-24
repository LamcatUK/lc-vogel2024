<section class="tiles">
    <div class="container-xl py-5">
        <h2 class="text-center mb-0"><?=get_field('title')?></h2>
    </div>
    <div class="tiles__grid">
        <?php
        while (have_rows('tiles')) {
            the_row();
            ?>
        <a class="tiles__tile" href="<?=get_sub_field('link')?>" target="_blank">
            <?=wp_get_attachment_image( get_sub_field('tiles__bg'), 'large', false, array('class' => 'tiles__bg') )?>
            <div class="tiles__inner text-center">
                <i class="fa-brands fa-<?=strtolower(get_sub_field('service'))?> fa-2x"></i>
                <div class="tiles__title"><?=get_sub_field('service')?></div>
            </div>
        </a>
            <?php
        }
        ?>
    </div>
</section>