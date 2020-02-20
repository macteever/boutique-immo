<?php

// require get_template_directory().'/biens/Biens_controller.php';

function fetch_xml(){
    $handle = curl_init();

    $url = "http://clients.ac3-distribution.com/office12/boutiq/cache/export.xml";
    //http://clients.ac3-distribution.com/office12/boutiq/cache/export.xml

    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($handle);
    curl_close($handle);

    var_dump($output);
    
    $dom = new DOMDocument();
    $dom->loadXML( $output );
    return $dom;
}


function store_xml_data() {
    $biens = fetch_xml()->getElementsByTagName("BIEN");

    foreach ($biens as $bien) {
        
        $appartement = $bien->getElementsByTagName("APPARTEMENT")[0];
        $maison = $bien->getElementsByTagName("MAISON")[0];
        is_null($appartement) ? $bien_infos = $maison : $bien_infos = $appartement;
        is_null($appartement) ? $type = 'home' : $type = 'flat';
        
        $vente = $bien->getElementsByTagName("VENTE")[0];
        $location = $bien->getElementsByTagName("LOCATION")[0];
        is_null($vente) ? $transaction_info = $vente : $transaction_info = $location;
        $rent = is_null($vente) ? 'rent' : 'sale';


        // $rent = is_null($vente) ? true : false;
        // $surface = $bien_infos->getElementsByTagName("SURFACE_HABITABLE")[0]->nodeValue;
        // $title = $bien->getElementsByTagName("COMMENTAIRES")[0]->getElementsByTagName("FR")[0]->nodeValue;
        // $phone
        // $geoPosition
        // // optionnals
        // $normalized_surface


        // COMMENTAIRES NODE
        $title = $bien->getElementsByTagName("INTITULE")[0]->getElementsByTagName("FR")[0]->nodeValue;
        $description = $bien->getElementsByTagName("COMMENTAIRES")[0]->getElementsByTagName("FR")[0]->nodeValue;

        // GENERAL NODE
        $general = $bien->getElementsByTagName("INFO_GENERALES")[0];
        $id = $bien->getElementsByTagName("AFF_ID")[0]->nodeValue;
        $acid = $bien->getElementsByTagName("AFF_ID")[0]->nodeValue;
        $author_id = 0;

        // VENTE NODE
        $vente = $bien->getElementsByTagName("VENTE")[0];
        $price = $bien->getElementsByTagName("PRIX")[0]->nodeValue;
        $annual_taxes = $bien->getElementsByTagName("CHARGES_ANNUELLES")[0]->nodeValue;
        $taxes = $bien->getElementsByTagName("TAXE_FONCIERE")[0]->nodeValue;

        // APPARTEMENT|MAISON NODE
        $rooms = $bien->getElementsByTagName("NBRE_PIECES")[0]->nodeValue;
        $bedrooms = $bien->getElementsByTagName("NBRE_CHAMBRES")[0]->nodeValue;
        $phone = $bien->getElementsByTagName("AGENCE_TELEPHONE")[0]->nodeValue;
        $bathrooms = $bien->getElementsByTagName("NBRE_SALLE_BAIN")[0]->nodeValue;
        $toilets = $bien->getElementsByTagName("NBRE_WC")[0]->nodeValue;
        $surface = $bien->getElementsByTagName("SURFACE_HABITABLE")[0]->nodeValue;
        $normalized_surface = $bien->getElementsByTagName("SURFACE_CARREZ")[0]->nodeValue;
        $heat_type = $bien->getElementsByTagName("MODE_CHAUFFAGE")[0]->nodeValue;
        $individual_heat = $bien->getElementsByTagName("CHAUFFAGE")[0]->nodeValue;
        $GES = $bien->getElementsByTagName("GAZEFFETDESERRE")[0]->nodeValue;
        $DPE = $bien->getElementsByTagName("CONSOMMATIONENERGETIQUE")[0]->nodeValue;
        $global_state = $bien->getElementsByTagName("ETAT_GENERAL")[0]->nodeValue;
        $exposition = $bien->getElementsByTagName("EXPOSITION_SEJOUR")[0]->nodeValue;
        $lift = $bien->getElementsByTagName("ASCENSEUR")[0]->nodeValue;
        $parking = $bien->getElementsByTagName("NBRE_PARKING")[0]->nodeValue;
        $floor = $bien->getElementsByTagName("NUM_ETAGE")[0]->nodeValue;
        $honoraires = $bien->getElementsByTagName("CHARGE_HONORAIRES")[0]->nodeValue;
        $creation_year = $bien->getElementsByTagName("ANNEE_CONSTRUCTION")[0]->nodeValue;

        // LOCALISATION NODE
        $localisation = $bien->getElementsByTagName("LOCALISATION")[0]->nodeValue;
        $city = $bien->getElementsByTagName("VILLE")[0]->nodeValue;
        $adress = $bien->getElementsByTagName("SITUATION")[0]->nodeValue;

        $nb_neightboor = $bien->getElementsByTagName("NB_LOTS")[0]->nodeValue;
        $lot_habitation = $bien->getElementsByTagName("NB_LOTS_HAB")[0]->nodeValue;
        $copropriete = $bien->getElementsByTagName("COPROPRIETE")[0]->nodeValue;
        $tax_by_year = $bien->getElementsByTagName("CHARGES_ANUELLES")[0]->nodeValue;
        $syndic = $bien->getElementsByTagName("PROCEDURES")[0]->nodeValue;
        $works_copro = $bien->getElementsByTagName("TRAVAUX_COPROPRIETE")[0]->nodeValue;

        $max_floor = $bien->getElementsByTagName("NUM_DERNIER_ETAGE")[0]->nodeValue;
        $visit = $bien->getElementsByTagName("VISITE_VIRTUELLE")[0]->nodeValue;

        $imgsString = $bien->getElementsByTagName("IMAGES")[0]->nodeValue;

        $imgs = explode(PHP_EOL, $imgsString );

        $req = new WP_Query(array('post_type' => 'biens',
                                'meta_key' => 'acid',                    //(string) - Custom field key.
                                'meta_value' => $acid,                //(string) - Custom field value.                 //(number) - Custom field value.
                                'meta_compare' => '='
                            )
                        );
        var_dump($req->found_posts);
        echo $acid;

        // var_dump($params);

        if ($req->found_posts > 0) {
            echo "Post déjà en base";
        } else {
            $params = array(
                'id' => $id,
            'author_id' => $author_id,
            'rent' => $rent,
            'surface' => $surface,
            'title' => $title,
            'rooms' => $rooms,
            'heat_mode' => $heat_type,
            'city' => $city,
            'adress' => $adress,
            'DPE' => $DPE,
            'GES' => $GES,
            'global_state' => $global_state,
            'phone' => $phone,
            'price' => $price,
            'geoPosition' => 'no def',
            'annual_taxes' => $annual_taxes,
            'nb_neightboor' => $nb_neightboor,
            'exposition' => $exposition,
            'taxes' => $taxes,
            'lift' => $lift,
            'parking' => $parking,
            'floor' => $floor,
            'honoraires' => $floor,
            'individual_heat' => $individual_heat,
            'creation_year' => $creation_year,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'toilets' => $toilets,
            'normalized_surface' => $normalized_surface,
            'acid' => $acid,
            'type' => $type,
            'description' => $description,
            'nb_neightboor' => $nb_neightboor,
            'lot_habitation' => $lot_habitation,
            'copropriete' => $copropriete,
            'tax_by_year' => $tax_by_year,
            'syndic' => $syndic,
            'works_copro' => $works_copro,
            'max_floor' => $max_floor,
            'visit' => $visit
        );

            // var_dump($params);

            $bien = BienFactory::bienFromArray($params);

            $controller = new BiensController();
            $post_id = $controller->save($bien, $_FILES, 'publish');

            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            require_once( ABSPATH . 'wp-admin/includes/media.php' );

            $i = 0;
            $imgsLoc = [];
            foreach($imgs as $img) {
                echo "=====================\n";
                var_dump($img);
                echo "=====================\n";

                echo substr($img, 0, 4);

                if(substr($img, 0, 4) == "http") {
                    // $filename should be the path to a file in the upload directory.
                    $uploaddir = wp_upload_dir();
                    $uploadfile = $uploaddir['path'] . '/' . $post_id . uniqid() . ".jpg";

                    $contents= file_get_contents($img);
                    $savefile = fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);

                    $filename = $img;

                    // The ID of the post this attachment is for.

                    // Check the type of file. We'll use this as the 'post_mime_type'.
                    $filetype = wp_check_filetype( basename( $uploadfile ), null );

                    // Get the path to the upload directory.
                    $wp_upload_dir = wp_upload_dir();

                    // Prepare an array of post data for the attachment.
                    $attachment = array(
                        'guid'           => $wp_upload_dir['url'] . '/' . basename( $uploadfile ), 
                        'post_mime_type' => $filetype['type'],
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $uploadfile ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );

                    // Insert the attachment.
                    $attach_id = wp_insert_attachment( $attachment, $uploadfile, $post_id );


                    if($i != 0) {
                        array_push($imgsLoc, array(
                            'img' => $attach_id
                        ));
                    } else {
                        set_post_thumbnail($post_id, $attach_id);
                    }
                    $i++;
                }

                var_dump($imgsLoc);
                update_field('gallery_img', $imgsLoc, $post_id);

            }

            // $bienObject = new Bien($title, 1, $rooms, $bedrooms, $surface, $heat_type, $price, $city, null, null, $id);
            // $controller = new BiensController();
            // $controller->save($bienObject, []);
            echo "nouveau post ajouté en base";
        }
        //public function __construct($title, #$author_id, #$rooms, #$bedrooms, #$size, #$heat_type, #$price, $adress, $geoPosition, $more)
    }
}
?>