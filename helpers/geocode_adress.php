<?php
if(!function_exists('geocodeAdress')) {
    function geocodeAdress(String $adress){
        $adress = htmlspecialchars($adress);

        $req = curl_init();

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=". urlencode($adress) ."&key=AIzaSyBYM2FZ6PBFvla3XFMkE6xALHBw2KPY3LY";

        curl_setopt($req, CURLOPT_URL, $url);
        curl_setopt($req, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($req);


        // $to_return = str_replace('', '"', $output);

        return json_decode($output, true)['results'][0]['geometry']['location'];
    }
}