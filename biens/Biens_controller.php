<?php
require get_template_directory().'/biens/Bien.php';
require get_template_directory().'/biens/Bien_factory.php';
require get_template_directory().'/helpers/geocode_adress.php';

if(!class_exists('BiensController')) {
    class BiensController {

        public function get_all(){
            $req = new WP_Query(array(
                'post_type' => "biens",
            ));

            return $this->fromQueryToBiens( $req );
        }

        public function get_from_user($user_id) {

        }

        public function get_by_id(int $id){
            $req = new WP_Query(array(
                'post_type' => "biens",
                "p" => $id
            ));

            return $this->fromQueryToBiens( $req )[0];
        }

        public function get_from_current_user() {
            if (get_current_user_id() == 0) return;

            $req = new WP_Query(array(
                'post_type' => "biens",
                'author' => get_current_user_id(),
            ));

            return $this->fromQueryToBiens( $req );
        }

        public function save(Bien $bien, $files = [], $status = 'draft'){
            if ($bien->getId() == null){
                $post = array(
                    'post_title'     => $bien->getTitle(), // The title of your post.
                    'post_type' => 'biens',
                    'post_author' => $bien->getAuthorId(),
                );
            } else {
                $post = array(
                    'import_id' => $bien->getId(),
                    'post_title'     => $bien->getTitle(), // The title of your post.
                    'post_type' => 'biens',
                    'post_author' => $bien->getAuthorId(),
                    'post_status' => $status
                );
            }
            
            $post_id = wp_insert_post( $post );

            var_dump($files);
            /**
         * Bien constructor.
         * @param int $id
         * optionnals
         */

            $selectors = ['global_state', 'normalized_surface', 'toilets', 'bathrooms', 'creation_year', 'individual_heat', 'honoraires', 'floor', 'parking', 'lift', 'taxes', 'exposition', 'nb_neightboor', 'annual_taxes', 'phone', 'global_state', 'acid','adress', 'DPE', 'GES', 'city', 'isRent', 'type', 'bedrooms', 'rooms','surface', 'heat_mode', 'price', 'adress', 'description', 'lot_habitation', 'copropriete', 'tax_by_year', 'syndic', 'works_copro', 'visit', 'maxfloor'];
            //$methodsNames = ['getCity', 'getRent', 'getBedrooms', 'getRooms', 'getSurface', 'getHeatMode', 'getPrice', 'getAdress']


            foreach ($selectors as $key => $selector) {
                $methodName = 'get'.str_replace('_', '', ucwords($selector, '_'));
                echo $selector . " set at " . $bien->{$methodName}();
                if($bien->{$methodName}() != null) update_field($selector, $bien->{$methodName}(), $post_id);
            }

            // geocode
            update_field('lat', $bien->getGeoPosition()[0], $post_id);
            update_field('lng', $bien->getGeoPosition()[1], $post_id);

            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            require_once( ABSPATH . 'wp-admin/includes/media.php' );
            
            $imgs = array();
            $i = 0;
            foreach ($files as $file => $array) {
                if ($files[$file]['error'] !== UPLOAD_ERR_OK) {
                    echo "error";
                }
                $attach_id = media_handle_upload( $file, 0);
                
                if($i != 0) {
                    array_push($imgs, array(
                        'img' => $attach_id
                    ));
                } else {
                    set_post_thumbnail($post_id, $attach_id);
                }

                $i++;
            }
            
            update_field('gallery_img', $imgs, $post_id);

            return $post_id;
        }

        public function update(Bien $bien) {
            if ($bien->getId() == null || $bien->getAuthorId() != get_current_user_id()){
                return;
            }

            $post = array(
                'ID' => $bien->getId(),
                'post_title'     => $bien->getTitle(), // The title of your post.
            );

            wp_update_post($post);
            $post_id = $bien->getId();

            $selectors = ['nb_chambres', 'nb_pieces','superficie', 'type_chauffage', 'prix', 'adresse', 'description', 'autres_donnees'];
            $methodsNames = ['getBedrooms', 'getRooms', 'getSize', 'getHeat', 'getPrice', 'getAdress', 'getDescription','getMore'];

            foreach ($selectors as $key => $selector) {
                update_field($selector, $bien->{$methodsNames[$key]}(), $post_id);
            }

            // geocode
            update_field('lat', $bien->getPosition()[0], $post_id);
            update_field('lng', $bien->getPosition()[1], $post_id);


        }

        private function fromQueryToBiens($query) {
            $list = [];
            if( $query->have_posts() ) {
                if(get_field('lat') === ''){
                    $gps = [get_field('lat'), get_field('lng')];
                }else{
                    $gps = 'no def';
                }
                while ( $query->have_posts() ) {
                    $query->the_post();
                    array_push($list, new Bien(get_the_title(),
                        get_the_author_meta('ID'),
                        get_field('nb_pieces'),
                        get_field('nb_chambres'),
                        get_field('superficie'),
                        get_field('type_chauffage'),
                        get_field('prix'),
                        get_field('adresse'),
                        get_field('description'),
                        null,
                        $gps,
                        get_the_ID()));
    //                public function __construct($title, $author_id, $rooms, $bedrooms, $size, $heat_type, $price, $adress, $more, $geoPosition, $id = null){

                }
            }

            return $list;
        }

        private function isAdmin(){

        }

    }
}