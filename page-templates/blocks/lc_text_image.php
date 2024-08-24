<?php
$order_image = get_field('order') == 'Image Text' ? 'order-md-1 offset-md-1' : 'order-md-2';
$order_text = get_field('order') == 'Image Text' ? 'order-md-2' : 'order-md-1 offset-md-1'; 
?>
<section class="text_image">
    <div class="container-xl py-5">
        <h2 class="d-md-none text-center"><?=get_field('title')?></h2>
        <div class="row gy-5">
            <div class="col-md-4 <?=$order_image?> text-center"><?=wp_get_attachment_image(get_field('image'),'large',false,array('class' => 'text_image__image'))?></div>
            <div class="col-md-6 <?=$order_text?> d-flex flex-column justify-content-center">
                <div class="h2 d-none d-md-block"><?=get_field('title')?></div>
                <div class="text_image__content mb-4"><?=get_field('content')?></div>
                <?php
                if (get_field('cta') ?? null) {
                    $l = get_field('cta');
                    ?>
                <div class="text-center text-md-start">
                    <a href="<?=$l['url']?>" target="<?=$l['target']?>" class="button button-green"><?=$l['title']?></a>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>