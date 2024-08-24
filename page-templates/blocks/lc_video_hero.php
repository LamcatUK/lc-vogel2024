<section class="video_hero">
    <video autoplay muted loop playsinline poster="<?=get_field('preview_image')?>">
        <source src="<?=get_field('video_1080p')?>" type="video/mp4" media="(min-width: 1080px)">
        <source src="<?=get_field('video_720p')?>" type="video/mp4" media="(min-width: 720px)">
        <source src="<?=get_field('video_480p')?>" type="video/mp4" media="(min-width: 480px)">
        <source src="<?=get_field('video_360p')?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>