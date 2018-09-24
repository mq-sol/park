<?php
App::uses('AppModel', 'Model');
/**
 * ParkSurveyPhoto Model
 *
 * @property ParkList $ParkList
 */
class ParkSurveyPhoto extends AppModel {


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

    public function parkList(){
        $fields = array(
            "DISTINCT ParkSurveyPhoto.park_list_id",
            "ParkList.park_name"
        );
        $data = $this->find('all',
            array(
                'fields' => $fields,
                'order' => "ParkSurveyPhoto.park_list_id"
            )
        );
        return $data;
    }

}
