<?php
App::uses('AppController', 'Controller');
/**
 * Details Controller
 *
 * @property Detail $Detail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DetailsController extends AppController {

    public $uses = array("Details", "ParkList");

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
/**
 * lists method
 *
 * @return void
 */
	public function lists() {
		$this->Detail->recursive = 0;
		$this->set('details', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid %s', __('detail')));
		}
		$this->set('detail', $this->Detail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detail->create();
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('detail')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'lists'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('detail')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$parkLists = $this->Detail->ParkList->find('list');
		$this->set(compact('parkLists'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid %s', __('detail')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('detail')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'lists'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('detail')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Detail->read(null, $id);
		}
		$parkLists = $this->Detail->ParkList->find('list');
		$this->set(compact('parkLists'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid %s', __('detail')));
		}
		if ($this->Detail->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('detail')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'lists'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('detail')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'lists'));
	}

    public function index(){

    }

    public function nextview(){

    }

    public function items($park_list_id){
        $park_list = $this->ParkList->findById($park_list_id);
        $this->set(compact('park_list'));
    }
}
