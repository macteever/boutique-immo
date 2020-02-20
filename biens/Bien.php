<?php
if(!class_exists('Bien')) {
    class Bien {
        protected $id;
        protected $author_id;
        protected $type;
        protected $isRent;
        protected $surface;
        protected $title;
        protected $description;
        protected $rooms;
        protected $heat_mode;
        protected $city;
        protected $adress;
        protected $DPE;
        protected $GES;
        protected $global_state;
        protected $phone;
        protected $price;
        // end required
        protected $geoPosition;
        protected $annual_taxes;
        protected $nb_neightboor;
        protected $exposition;
        protected $taxes;
        protected $lift;
        protected $parking;
        protected $floor;
        protected $honoraires;
        protected $individual_heat;
        protected $creation_year;
        protected $bedrooms;
        protected $bathrooms;
        protected $toilets;
        protected $normalized_surface;
        protected $acid;
        protected $lot_habitation;
        protected $copropriete;
        protected $tax_by_year;
        protected $syndic;
        protected $works_copro;
        protected $visit;
        protected $max_floor;


        /**
         * Bien constructor.
         * @param int $id
         * @param int $author_id
         * @param $type
         * @param bool $isRent
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
        public function __construct($id, $author_id, $type, $isRent, $surface, $title, $description, $rooms, $heat_mode, $city, $adress, $DPE, $GES, $global_state, $phone, $price, $geoPosition = null, $annual_taxes = null, $nb_neightboor = null, $exposition = null, $taxes = null, $lift = null, $parking = null, $floor = null, $honoraires= null, $individual_heat = null, $creation_year = null, $bedrooms = null, $bathrooms = null, $toilets = null, $normalized_surface = null, $acid = null, $lot_habitation = null,$copropriete = null,$tax_by_year = null, $syndic = null,$works_copro = null, $visit = null, $max_floor = null)
        {
            $this->id = $id;
            $this->author_id = $author_id;
            $this->type = $type;
            $this->isRent = $isRent;
            $this->surface = $surface;
            $this->title = $title;
            $this->description = $description;
            $this->rooms = $rooms;
            $this->heat_mode = $heat_mode;
            $this->city = $city;
            $this->adress = $adress;
            $this->DPE = $DPE;
            $this->GES = $GES;
            $this->global_state = $global_state;
            $this->phone = $phone;
            $this->price = $price;
            $this->geoPosition = $geoPosition;
            $this->annual_taxes = $annual_taxes;
            $this->nb_neightboor = $nb_neightboor;
            $this->exposition = $exposition;
            $this->taxes = $taxes;
            $this->lift = $lift;
            $this->parking = $parking;
            $this->floor = $floor;
            $this->honoraires = $honoraires;
            $this->individual_heat = $individual_heat;
            $this->creation_year = $creation_year;
            $this->bedrooms = $bedrooms;
            $this->bathrooms = $bathrooms;
            $this->toilets = $toilets;
            $this->normalized_surface = $normalized_surface;
            $this->acid = $acid;
            $this->lot_habitation = $lot_habitation;
            $this->copropriete = $copropriete;
            $this->tax_by_year = $tax_by_year;
            $this->syndic = $syndic;
            $this->works_copro = $works_copro;
            $this->visit = $visit;
            $this->max_floor = $max_floor;

            if($geoPosition === 'no def' && $this->adress !== null){
                $geocode = geocodeAdress($this->adress);
                $this->setGeoPosition(array($geocode['lat'], $geocode['lng']));
            }
        }

        public function getVisit() {
            return $this->visit;
        }

        public function getMaxFloor() {
            return $this->max_floor;
        }

        public function getLotHabitation() {
            return $this->lot_habitation;
        }

        public function getCopropriete() {
            return $this->copropriete;
        }
        public function getTaxByYear() {
            return $this->tax_by_year;
        }
        public function getSyndic() {
            return $this->syndic;
        }
        public function getWorksCopro() {
            return $this->works_copro;
        }

        /**
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        public function getAcid()
        {
            return $this->acid;
        }

        /**
         * @param int $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return int
         */
        public function getAuthorId()
        {
            return $this->author_id;
        }

        /**
         * @param int $author_id
         */
        public function setAuthorId($author_id)
        {
            $this->author_id = $author_id;
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param mixed $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        /**
         * @return bool
         */
        public function getIsRent()
        {
            return $this->isRent;
        }

        /**
         * @param bool $isRent
         */
        public function setIsRent($isRent)
        {
            $this->isRent = $isRent;
        }

        /**
         * @return float
         */
        public function getSurface()
        {
            return $this->surface;
        }

        /**
         * @param float $surface
         */
        public function setSurface($surface)
        {
            $this->surface = $surface;
        }

        /**
         * @return string
         */
        public function getTitle()
        {
            return $this->title;
        }
        
        /**
         * @param string $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }
        
        /**
         * @return string
         */
        public function getDescription()
        {
            return $this->description;
        }
        /**
         * @param string $title
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }
        /**
         * @return int
         */
        public function getRooms()
        {
            return $this->rooms;
        }

        /**
         * @param int $rooms
         */
        public function setRooms($rooms)
        {
            $this->rooms = $rooms;
        }

        /**
         * @return string
         */
        public function getHeatMode()
        {
            return $this->heat_mode;
        }

        /**
         * @param string $heat_mode
         */
        public function setHeatMode($heat_mode)
        {
            $this->heat_mode = $heat_mode;
        }

        /**
         * @return string
         */
        public function getCity()
        {
            return $this->city;
        }

        /**
         * @param string $city
         */
        public function setCity($city)
        {
            $this->city = $city;
        }

        /**
         * @return mixed
         */
        public function getAdress()
        {
            return $this->adress;
        }

        /**
         * @param mixed $adress
         */
        public function setAdress($adress)
        {
            $this->adress = $adress;
        }

        /**
         * @return mixed
         */
        public function getDPE()
        {
            return $this->DPE;
        }

        /**
         * @param mixed $DPE
         */
        public function setDPE($DPE)
        {
            $this->DPE = $DPE;
        }

        /**
         * @return mixed
         */
        public function getGES()
        {
            return $this->GES;
        }

        /**
         * @param mixed $GES
         */
        public function setGES($GES)
        {
            $this->GES = $GES;
        }

        /**
         * @return mixed
         */
        public function getGlobalState()
        {
            return $this->global_state;
        }

        /**
         * @param mixed $global_state
         */
        public function setGlobalState($global_state)
        {
            $this->global_state = $global_state;
        }

        /**
         * @return mixed
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * @param mixed $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getGeoPosition()
        {
            return $this->geoPosition;
        }

        /**
         * @param mixed $geoPosition
         */
        public function setGeoPosition($geoPosition)
        {
            $this->geoPosition = $geoPosition;
        }

        /**
         * @return mixed
         */
        public function getAnnualTaxes()
        {
            return $this->annual_taxes;
        }

        /**
         * @param mixed $annual_taxes
         */
        public function setAnnualTaxes($annual_taxes)
        {
            $this->annual_taxes = $annual_taxes;
        }

        /**
         * @return mixed
         */
        public function getNbNeightboor()
        {
            return $this->nb_neightboor;
        }

        /**
         * @param mixed $nb_neightboor
         */
        public function setNbNeightboor($nb_neightboor)
        {
            $this->nb_neightboor = $nb_neightboor;
        }

        /**
         * @return mixed
         */
        public function getExposition()
        {
            return $this->exposition;
        }

        /**
         * @param mixed $exposition
         */
        public function setExposition($exposition)
        {
            $this->exposition = $exposition;
        }

        /**
         * @return mixed
         */
        public function getTaxes()
        {
            return $this->taxes;
        }

        /**
         * @param mixed $taxes
         */
        public function setTaxes($taxes)
        {
            $this->taxes = $taxes;
        }

        /**
         * @return mixed
         */
        public function getLift()
        {
            return $this->lift;
        }

        /**
         * @param mixed $lift
         */
        public function setLift($lift)
        {
            $this->lift = $lift;
        }

        /**
         * @return mixed
         */
        public function getParking()
        {
            return $this->parking;
        }

        /**
         * @param mixed $parking
         */
        public function setParking($parking)
        {
            $this->parking = $parking;
        }

        /**
         * @return mixed
         */
        public function getFloor()
        {
            return $this->floor;
        }

        /**
         * @param mixed $floor
         */
        public function setFloor($floor)
        {
            $this->floor = $floor;
        }

        /**
         * @return mixed
         */
        public function getHonoraires()
        {
            return $this->honoraires;
        }

        /**
         * @param mixed $honoraires
         */
        public function setHonoraires($honoraires)
        {
            $this->honoraires = $honoraires;
        }

        /**
         * @return mixed
         */
        public function getIndividualHeat()
        {
            return $this->individual_heat;
        }

        /**
         * @param mixed $individual_heat
         */
        public function setIndividualHeat($individual_heat)
        {
            $this->individual_heat = $individual_heat;
        }

        /**
         * @return mixed
         */
        public function getCreationYear()
        {
            return $this->creation_year;
        }

        /**
         * @param mixed $creation_year
         */
        public function setCreationYear($creation_year)
        {
            $this->creation_year = $creation_year;
        }

        /**
         * @return mixed
         */
        public function getBedrooms()
        {
            return $this->bedrooms;
        }

        /**
         * @param mixed $bedrooms
         */
        public function setBedrooms($bedrooms)
        {
            $this->bedrooms = $bedrooms;
        }

        /**
         * @return mixed
         */
        public function getBathrooms()
        {
            return $this->bathrooms;
        }

        /**
         * @param mixed $bathrooms
         */
        public function setBathrooms($bathrooms)
        {
            $this->bathrooms = $bathrooms;
        }

        /**
         * @return mixed
         */
        public function getToilets()
        {
            return $this->toilets;
        }

        /**
         * @param mixed $toilets
         */
        public function setToilets($toilets)
        {
            $this->toilets = $toilets;
        }

        /**
         * @return mixed
         */
        public function getNormalizedSurface()
        {
            return $this->normalized_surface;
        }

        /**
         * @param mixed $normalized_surface
         */
        public function setNormalizedSurface($normalized_surface)
        {
            $this->normalized_surface = $normalized_surface;
        }



    }
}