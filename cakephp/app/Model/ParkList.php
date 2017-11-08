<?php
App::uses('AppModel', 'Model');
/**
 * ParkList Model
 *
 * @property Detail $Detail
 * @property Photo $Photo
 * @property Post $Post
 */
class ParkList extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Detail' => array(
			'className' => 'Detail',
			'foreignKey' => 'park_list_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'park_list_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'park_list_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    public function geojson($lat = null, $lng = null){
        $opt = array();
        /* */
        $opt = array(
            "recursive" => -1,
            "limit" => 20,
        );
        if ($lat != null && $lng != null){
            $opt["order"] = "Glength(GeomFromText(concat('LineString(', x(point) ,' ', y(point) , ', $lng $lat)')))";
        }
        /* */
        $rs = $this->find('all',$opt);
        $geojson = array(
           'type'      => 'FeatureCollection',
           'features'  => array()
        );
        foreach ($rs as $key => $row){
            $properties = $row["ParkList"];

            unset($properties['point']);
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
