<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property ParkList $ParkList
 */
class Photo extends AppModel {


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
}
