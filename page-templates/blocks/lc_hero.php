<?php
$title = get_field('title') ?: get_the_title();
?>
<section class="hero">
    <div class="container-xl py-5">
        <h1 class="text-center"><?=$title?></h1>
    </div>
</section>