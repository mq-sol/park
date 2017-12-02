<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property ParkList $ParkList
 */
class Post extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParkList' => array(
			'className' => 'ParkList',
			'foreignKey' => 'park_list_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function avg($park_list_id){
        $sql = "select age_list, (COALESCE(avg,0.00)) as avg from (select age, avg(rank) from posts where park_list_id = $park_list_id group by age) as a right join (select * from generate_series(0, 6) as age_list) as b on (a.age = b.age_list);";
        $rs = $this->query($sql);
        $ret = array();
        foreach ($rs as $row){
            $ret[] = $row[0];
        }
        return $ret;
    }
}
