<?php get_header(); ?>
<?php require get_template_directory().'/helpers/geocode_adress.php'; ?>
<main role="main" class="main-content main-archive">
  <section class="container-fluid archive-biens">
      <div class="row">
        <div class="col-auto results-biens">
          <div class="col-12 archive-biens-title pl-0 pr-0">
            <h3 class="text-immo-light fs-13 fw-700 source-sans"><?php echo get_bloginfo(); ?></h3>
            <?php $total_post = wp_count_posts('biens')->publish; ?>
            <h1 class="fw-700 fs-52 mt-0 mb-15">Découvrez nos <?php echo $total_post; ?>  biens</h1>
            <form class="mb-20" action="/">
              <select class="filter-field type" name="transaction" id="transaction">
                <option value="rent">Location</option>
                <option value="sold">Vente</option>
              </select>
              <select class="filter-field type" name="type" id="type">
                <option value="rent">Appartement</option>
                <option value="sold">Maison</option>
              </select>
              <input class="filter-field price-min" type="number" name="zip-code" placeholder="Code Postal">
              <input class="filter-field rooms-min" type="number" name="rooms-min" placeholder="Pièces min">
              <input class="filter-field rooms-max" type="number" name="rooms-max" placeholder="Pièces max">
              <input class="filter-field surface-min" type="number" name="surface-min" placeholder="Surface min">
              <input class="filter-field surface-max" type="number" name="surface-max" placeholder="Surface max">
              <input class="filter-field price-min" type="number" name="price-min" placeholder="Prix min">
              <input class="filter-field price-max" type="number" name="price-max" placeholder="Prix max">
              <select class="filter-field orderby" name="orderby" id="orderby" placeholder="Trier par">
                <option value="date">Les plus récents</option>
                <option value="price">Les moins chers</option>
              </select>
            </form>
            <div class="d-flex justify-content-between">
              <button class="btn-immo fs-15 filters">Filtrer les résultats</button>
            </div>
          </div>
          <div id="target" class="">
          <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <?php
      $thumbnail = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_site_url().'/wp-content/uploads/2020/01/default-image-agence-twist.jpg'; // get the sub field value
      ?>
      <?php
        if(get_field('lat') == "") {
          // geocode
          $geocode = geocodeAdress(get_field('adress') . " " . get_field('city'));
          update_field('lat', $geocode["lat"]);
          update_field('lng', $geocode["lng"]);
        }
        ?>
            <div class="p-relative bien archive-post-hover apparition-3 anim-300" data-link="<?= get_permalink() ?>" data-thumbnail="<?= $thumbnail; ?>" data-url="<?= get_permalink() ?>" data-title="<?= get_the_title() ?>" data-price="<?= get_field('price') ?>" data-gps="<?= get_field('lat') ?>,<?= get_field('lng') ?>">
              <a class="w-auto" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <div class="col-12 archive-post anim-300 d-flex mb-30 p-relative">
                    <div class="slider-archive-biens p-relative">
                      <?php echo get_the_post_thumbnail( $post->ID, 'full ' ); ?>
                      <?php if ( have_rows('gallery_img') ): ?>
                        <?php while ( have_rows('gallery_img') ) : the_row(); ?>
                          <?php
                          // repeater galerie single biens
                          $image = get_sub_field('img');
                          if ( !empty($image) ): ?>
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                      <?php endwhile; ?>
                      <?php else: ?>
                    <?php endif; ?>
                  </div>
                  <div class="archive-post-content d-flex flex-column justify-content-center">
                    <?php $term_list = wp_get_post_terms($post->ID, 'taxonomy-biens', array("fields" => "all"));
                    foreach($term_list as $term_single) {?>
                      <span class="fs-12 fw-600 uppercase text-immo"><?php echo $term_single->name; ?></span>
                    <?php } ?>
                    <h3 class="fs-22 fw-600 source-sans"><?php the_title(); ?></h3>
                    <div class="d-flex mb-20">
                      <span class="text-grey fs-13 mr-20"><?php the_field('surface'); ?> m2</span>
                      <span class="text-grey fs-13 mr-20"><?php the_field('rooms'); ?> pièces</span>
                      <span class="text-grey fs-13"><?php the_field('bedrooms'); ?> chambres</span>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="fs-15 text-black mw-80">
                        <?php echo excerpt(20); ?>
                      </div>
                      <div class="w-auto">
                        <span class="fw-600 fs-16 archive-bien-price"><?php the_field('price'); ?> €</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
          </div>
        </div>
        <div class="col-auto hidden-resp results-map">
          <div id="map"></div>
        </div>
      </div>
  </section>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYM2FZ6PBFvla3XFMkE6xALHBw2KPY3LY&callback=initMap"></script>
</main>

<?php get_footer(); ?>
