<?php
App::uses('AppController', 'Controller');
/**
 * ParkLists Controller
 *
 * @property ParkList $ParkList
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ParkListsController extends AppController {

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
		$this->ParkList->recursive = 0;
		$this->set('parkLists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ParkList->exists($id)) {
			throw new NotFoundException(__('Invalid park list'));
		}
		$options = array('conditions' => array('ParkList.' . $this->ParkList->primaryKey => $id));
		$this->set('parkList', $this->ParkList->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ParkList->create();
			if ($this->ParkList->save($this->request->data)) {
				$this->Flash->success(__('The park list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The park list could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ParkList->exists($id)) {
			throw new NotFoundException(__('Invalid park list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ParkList->save($this->request->data)) {
				$this->Flash->success(__('The park list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The park list could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ParkList.' . $this->ParkList->primaryKey => $id));
			$this->request->data = $this->ParkList->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ParkList->id = $id;
		if (!$this->ParkList->exists()) {
			throw new NotFoundException(__('Invalid park list'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ParkList->delete()) {
			$this->Flash->success(__('The park list has been deleted.'));
		} else {
			$this->Flash->error(__('The park list could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function geojson(){
        $this->autoRender=false;
        $geojson = $this->ParkList->geojson();
        print json_encode($geojson);
    }

}
