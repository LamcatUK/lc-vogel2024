<section class="events">
    <?=wp_get_attachment_image(get_field('background'),'full',false,array('class' => 'events__bg'))?>
    <div class="container-xl py-5">
        <h2 class="text-center pb-3">Upcoming Events</h2>
        <div class="row">
            <?php
            $today = date('Y-m-d');

            $count = get_field('events_to_show');

            $q = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => $count,
                'meta_key'       => 'event_date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'event_date',
                        'value'   => $today,
                        'compare' => '>=',
                        'type'    => 'DATE'
                    ),
                ),
            ));
            if ( $q->have_posts() ) {
                while ( $q->have_posts() ) {
                    $q->the_post();
                    ?>
            <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2 events__row">
                <div class="events__date">
                    <?php
                    $event_date = get_field('event_date', get_the_ID());

                    $date = new DateTime($event_date);

                    $day = $date->format('d');
                
                    $month_year = $date->format('F Y');
                    ?>
                    <div class="events__date--day"><?=esc_html($day)?></div>
                    <div class="events__date--mon"><?=esc_html($month_year)?></div>
                </div>
                <div class="events__detail">
                    <div class="events__venue"><?=get_field('event_venue', get_the_ID())?></div>
                    <div class="events__location"><?=get_field('event_location', get_the_ID())?></div>
                </div>
                <div class="events__link">
                    <a href="<?=get_field('events_link', get_the_ID())?>" target="_blank" class="button button-tickets">Tickets</a>
                </div>
            </div>
                    <?php
                }
            } else {
                // No posts found
                echo 'No upcoming events found.';
            }

            wp_reset_postdata();
            ?>
        </div>
        <?php
        if (get_field('cta') ?? null) {
            $l = get_field('cta');
            ?>
            <div class="text-center pt-5">
                <a href="<?=$l['url']?>" target="<?=$l['target']?>" class="button button-green"><?=$l['title']?></a>
            </div>
            <?php
        }
        ?>
    </div>
</section>