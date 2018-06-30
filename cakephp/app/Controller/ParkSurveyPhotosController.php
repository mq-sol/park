<?php
App::uses('AppController', 'Controller');
/**
 * ParkSurveyPhotos Controller
 *
 * @property ParkSurveyPhoto $ParkSurveyPhoto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ParkSurveyPhotosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ParkSurveyPhoto->recursive = 0;
		$this->set('parkSurveyPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ParkSurveyPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid park survey photo'));
		}
		$options = array('conditions' => array('ParkSurveyPhoto.' . $this->ParkSurveyPhoto->primaryKey => $id));
		$this->set('parkSurveyPhoto', $this->ParkSurveyPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ParkSurveyPhoto->create();
			if ($this->ParkSurveyPhoto->save($this->request->data)) {
				$this->Flash->success(__('The park survey photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The park survey photo could not be saved. Please, try again.'));
			}
		}
		$parkLists = $this->ParkSurveyPhoto->ParkList->find('list');
		$this->set(compact('parkLists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ParkSurveyPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid park survey photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ParkSurveyPhoto->save($this->request->data)) {
				$this->Flash->success(__('The park survey photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The park survey photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ParkSurveyPhoto.' . $this->ParkSurveyPhoto->primaryKey => $id));
			$this->request->data = $this->ParkSurveyPhoto->find('first', $options);
		}
		$parkLists = $this->ParkSurveyPhoto->ParkList->find('list');
		$this->set(compact('parkLists'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ParkSurveyPhoto->id = $id;
		if (!$this->ParkSurveyPhoto->exists()) {
			throw new NotFoundException(__('Invalid park survey photo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ParkSurveyPhoto->delete()) {
			$this->Flash->success(__('The park survey photo has been deleted.'));
		} else {
			$this->Flash->error(__('The park survey photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
