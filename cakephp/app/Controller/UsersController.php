<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function login(){
        $post = $this->request->data;
        $this->log(compact('post'),LOG_DEBUG);
        $this->autoRender=false;
        echo json_encode(array('success' => true));
    }

}
