<?php
if(!class_exists('BienFactory')) {
    class BienFactory {

        public static function bienFromArray($params) {
            /**
         * Bien constructor.
         * @param int $id
         * @param int $author_id
         * @param $type
         * @param bool $rent
         * @param float $surface
         * @param string $title
         * @param string $description
         * @param int $rooms
         * @param string $heat_mode
         * @param string $city
         * @param $adress
         * @param $DPE
         * @param $GES
         * @param $global_state
         * @param $phone
         * @param $price
         * @param $geoPosition
         * optionnals
         * @param $annual_taxes
         * @param $nb_neightboor
         * @param $exposition
         * @param $taxes
         * @param $lift
         * @param $parking
         * @param $floor
         * @param $honoraires
         * @param $individual_heat
         * @param $creation_year
         * @param $bedrooms
         * @param $bathrooms
         * @param $toilets
         * @param $normalized_surface
         */
            return new Bien(
                self::testParam($params['id']),
                self::testParam($params['author_id']),
                self::testParam($params['type']),
                self::testParam($params['rent']),
                self::testParam($params['surface']),
                self::testParam($params['title']),
                self::testParam($params['description']),
                self::testParam($params['rooms']),
                self::testParam($params['heat_mode']),
                self::testParam($params['city']),
                self::testParam($params['adress']),
                self::testParam($params['DPE']),
                self::testParam($params['GES']),
                self::testParam($params['global_state']),
                self::testParam($params['phone']),
                self::testParam($params['price']),
                self::testParam($params['geoPosition']),
                self::testParam($params['annual_taxes']),
                self::testParam($params['nb_neightboor']),
                self::testParam($params['exposition']),
                self::testParam($params['taxes']),
                self::testParam($params['lift']),
                self::testParam($params['parking']),
                self::testParam($params['floor']),
                self::testParam($params['honoraires']),
                self::testParam($params['individual_heat']),
                self::testParam($params['creation_year']),
                self::testParam($params['bedrooms']),
                self::testParam($params['bathrooms']),
                self::testParam($params['toilets']),
                self::testParam($params['normalized_surface']),
                self::testParam($params['acid']),
                self::testParam($params['lot_habitation']),
                self::testParam($params['copropriete']),
                self::testParam($params['tax_by_year']),
                self::testParam($params['syndic']),
                self::testParam($params['works_copro']),
                self::testParam($params['visit']),
                self::testParam($params['max_floor'])
            );
        }


        public static function testParam($param) {
            if (!isset($param)) return null;

            return $param;
        }

    }
}