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

    public function geojson($lat = null, $lng = null, $order = 1){
        if ($order == 1){
            $sql = <<<_SQL_
SELECT row_to_json(featurecollection)
FROM (
    SELECT
    'FeatureCollection' AS type,
    array_to_json(array_agg(feature)) AS features
    FROM
    (
        SELECT
        'Feature' AS type,
        ST_AsGeoJSON(point, 6)::json AS geometry,
        row_to_json((
            SELECT p FROM (
                SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description,v.rank,v.len
            ) AS p
        )) AS properties
        FROM (SELECT *, st_length(geography(st_makeline(point, st_setsrid(st_makepoint($lng, $lat),4326)))) AS len
            FROM view_park_lists
            ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
            limit 20) AS v
        ORDER BY rank desc, len
    ) AS feature
) AS featurecollection;
_SQL_;
        }else{
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
                SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description,v.rank,
                    st_length(geography(st_makeline(point, st_setsrid(st_makepoint($lng,$lat),4326)))) as len
            ) AS p
        )) AS properties
        FROM view_park_lists AS v
        ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
        limit 20
    ) AS feature
) AS featurecollection;
_SQL_;
        }
        $rs = $this->query($sql);
        $result = $rs[0][0]["row_to_json"];
$this->log($result, LOG_DEBUG);
        return $result;

    }

    public function search($lat = null, $lng = null, $order = 1){
        if ($order == 1) {
            $sql = <<<_SQL_
            SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description, v.rank, len
            FROM (
                SELECT *, st_length(geography(st_makeline(point, st_setsrid(st_makepoint($lng, $lat),4326)))) AS len
                FROM view_park_lists
                ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
                limit 20) AS v
            ORDER BY rank desc, len
_SQL_;
        }else{
            $sql = <<<_SQL_
            SELECT v.id, v.park_name, v.park_name_rm, v.ok, v.ng, v.description, v.rank,
            st_length(geography(st_makeline(point, st_setsrid(st_makepoint($lng,$lat),4326)))) as len
            FROM view_park_lists AS v
            ORDER BY st_distance(point, st_setsrid(st_makepoint($lng, $lat),4326))
            limit 20
_SQL_;
        }
        $rs = $this->query($sql);
        $result = array();
        foreach($rs as $row){
            $result[] = $row[0];
        }
$this->log($result, LOG_DEBUG);
        return $result;
    }
}
