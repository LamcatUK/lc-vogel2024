<section class="contact">
    <div class="container-xl py-5">
        <div class="row">
            <div class="col-md-6 offset-lg-1">
                <h2>Say Hello</h2>
                <?=do_shortcode('[contact-form-7 id="' . get_field('form_id') . '"]')?>
            </div>
            <div class="col-md-3 offset-lg-1">
                <h2>Booking</h2>
                <?=get_field('booking')?>
            </div>
        </div>
    </div>
</section>