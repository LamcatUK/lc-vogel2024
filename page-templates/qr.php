<?php
/*
Template Name: QR Links
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
// <a class="qr__button" href="https://wa.me/<?=ltrim(parse_phone(get_field('contact_phone','options')), '+')
?>" target="_blank">
?>
<main>
    <div class="container-xl pt-5 qr">
        <h2 class="mb-0">Contact Vogel</h2>
        <a class="qr__button" href="mailto:<?= get_field('contact_email', 'options') ?>">
            <i class="fa-solid fa-envelope"></i> Email
        </a>
        <h2 class="mb-0">Connect</h2>
        <?php
        $s = get_field('socials', 'options');
        // echo '<pre>' . var_dump($s) . '</pre>';

        if ($s['linkedin_url'] ?? null) {
        ?>
            <a href="<?= $s['linkedin_url'] ?>" target="_blank" class="qr__button">
                <i class="fa-brands fa-linkedin-in"></i> LinkedIn
            </a>
        <?php
        }
        if ($s['instagram_url'] ?? null) {
        ?>
            <a href="<?= $s['instagram_url'] ?>" target="_blank" class="qr__button">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
        <?php
        }
        if ($s['facebook_url'] ?? null) {
        ?>
            <a href="<?= $s['facebook_url'] ?>" target="_blank" class="qr__button">
                <i class="fa-brands fa-facebook-f"></i> Facebook
            </a>
        <?php
        }
        if ($s['tiktok_url'] ?? null) {
        ?>
            <a href="<?= $s['tiktok_url'] ?>" target="_blank" class="qr__button">
                <i class="fa-brands fa-tiktok"></i> TikTok
            </a>
        <?php
        }
        if ($s['soundcloud_url'] ?? null) {
        ?>
            <a href="<?= $s['soundcloud_url'] ?>" target="_blank" class="qr__button">
                <i class="fa-brands fa-soundcloud"></i> SoundCloud
            </a>
        <?php
        }
        ?>
    </div>
</main>
<?php
get_footer();
?>