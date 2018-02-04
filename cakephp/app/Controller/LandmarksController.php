<?php
App::uses('AppController', 'Controller');
/**
 * Landmarks Controller
 *
 * @property Landmark $Landmark
 * @property PaginatorComponent $Paginator
 */
class LandmarksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function index(){
        $landmarks = $this->Landmark->find('all');
        
        $this->set(compact('landmarks'));
    }


}
