<?php
$countries = json_decode( file_get_contents('countries.json'), true );

if ($countries) {
    echo '<pre>';
    // print_r( getAllCountriesNames($countries) );

    // print_r( getAllCountriesFromContinent( $countries, 'Asia') );
    
    
    print_r( getAllCountriesWithSeasonTemperature( $countries, 'winter', 20 ) );


} else {
    throw new Exception('There is an Error with the JSON file.');
}

function getAllCountriesNames( $countries ) {
    $countries_names = array_map( fn ( $country ) => $country['name'], $countries );

    return $countries_names;
}

function getAllCountriesFromContinent( $countries, string $continent ) {
    $countries_names = array_filter($countries, fn ( $country ) => $country['continent'] === $continent );

    return $countries_names;
}

function getAllCountriesWithSeasonTemperature( $data_countries, string $season, int $temperature ) {
    $filtered_countries = [];
    $countries = array_map( function( $country ) use ( $season, $temperature ) {
        $filtered_temperatures = array_filter($country['average_temperatures'], function( $datapoint_temp, $datapoint_season  ) use ( $season, $temperature ) {
            $datapoint_temp = preg_replace( '/°C/', '', $datapoint_temp );

            return ( $datapoint_season === $season ) && ( intval( $datapoint_temp ) === intval( $temperature ) );
        }, ARRAY_FILTER_USE_BOTH);
        
        return( $filtered_temperatures );

    }, $data_countries);

    $countries = array_filter( $countries );

    return $countries;
}
