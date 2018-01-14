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
		),
		'Rank' => array(
			'className' => 'Rank',
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
        $sql = <<<_SQL_
SELECT row_to_json(featurecollection)
FROM (
        SELECT
        'FeatureCollection' AS type,
        array_to_json(array_agg(feature)) AS features
        FROM (
                SELECT
                'Feature' AS type,
                ST_AsGeoJSON(point, 6)::json AS geometry,
                row_to_json((
                SELECT p FROM (
                        SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description
                ) AS p
                )) AS properties
                FROM view_park_lists AS v
                ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
                limit 20
        ) AS feature
) AS featurecollection;
_SQL_;

        $rs = $this->query($sql);
        $result = $rs[0][0]["row_to_json"];
        return $result;

    }

    public function search($lat = null, $lng = null){
        $sql = <<<_SQL_
                SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description
                FROM view_park_lists AS v
                ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
                limit 20
_SQL_;

        $rs = $this->query($sql);
        $result = array();
        foreach($rs as $row){
            $result[] = $row[0];
        }
        return $result;
    }

    public function my_geojson($lat = null, $lng = null){
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

    public function showtest(){
        $lng=139.7168; 
        $lat=35.6147;
        $opt = array();
        /* */
        $opt = array(
            "limit" => 20,
        );
        if ($lat != null && $lng != null){
            $opt["order"] = "Glength(GeomFromText(concat('LineString(', x(point) ,' ', y(point) , ', $lng $lat)')))";
        }
        /* */
        $rs = $this->find('all',$opt);
    
        return $rs;    
    }

}
