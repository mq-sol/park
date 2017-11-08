<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PhotosController extends AppController {

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
		$this->Photo->recursive = 0;
		$this->set('photos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Photo->create();
			if ($this->Photo->save($this->request->data)) {
				$this->Flash->success(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'lists'));
			} else {
				$this->Flash->error(__('The photo could not be saved. Please, try again.'));
			}
		}
		$parkLists = $this->Photo->ParkList->find('list');
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
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Photo->save($this->request->data)) {
				$this->Flash->success(__('The photo has been saved.'));
				return $this->redirect(array('action' => 'lists'));
			} else {
				$this->Flash->error(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$this->request->data = $this->Photo->find('first', $options);
		}
		$parkLists = $this->Photo->ParkList->find('list');
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
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Photo->delete()) {
			$this->Flash->success(__('The photo has been deleted.'));
		} else {
			$this->Flash->error(__('The photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'lists'));
	}
}
