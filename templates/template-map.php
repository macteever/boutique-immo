<?php /* Template Name: map */
get_header(); ?>
<main role="main" class="maps-main">
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <?php
                    $myposts = get_posts(array(
                        'post_type' => 'biens',
                        'post_staus'=> 'publish',
                        'posts_per_page' => 10
                    ));
                ?>
                <div class="col-3"><h1>Annonces</h1>
                <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                <div class="bien" data-gps="<?= get_field('lat') ?>,<?= get_field('lng') ?>">
                    <?= get_the_title() ?>
                </div>
                <?php endforeach; ?>
                </div>
                <div class="col-9">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_API_KEY ?>&callback=initMap"
    async defer></script>