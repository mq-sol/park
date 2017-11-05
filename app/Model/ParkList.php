<?php
App::uses('AppModel', 'Model');
/**
 * ParkList Model
 *
 */
class ParkList extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


    public function geojson(){
        $rs = $this->find('all');
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );
        foreach ($rs as $key => $row){
            $properties = $row["ParkList"];

            unset($properties['latitude']);
            unset($properties['longitude']);
            $geometry = array(
                "type" => "Point", 
                "coordinates" => array(
                    $row["ParkList"]["longitude"],
                    $row["ParkList"]["latitude"],
                    "0"
                )
            );

            //
            $feature = array(
                 'type' => 'Feature',
                 'geometry' => $geometry,
                 'properties' => $properties
            );

            array_push($geojson['features'], $feature);
        }
        return $geojson;

    }
}
