<?php
App::uses('AppController', 'Controller');
/**
 * Admin Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 */
class AdminController extends AppController {
    public $uses = array("ParkSurveyPhoto", "ParkList");
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function parklist(){
        //公園一覧を取得


    }

    public function photo_survey($id){
        $lists = $this->Paginator->paginate(
            'ParkSurveyPhoto',
            array('park_list_id' => $id)
        );
        $this->set(compact('lists'));
    }

    public function photo_dl(){

    }


}
