<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MapController extends AppController {

    public $uses = array("Detail", "ParkList", "Category", "Photo", "Landmark");


    public function index(){
        $landmarks = $this->Landmark->find("all");
        $this->set(compact('landmarks'));
    }

    public function gps(){
        $landmarks = $this->Landmark->find("all");
        $this->set(compact('landmarks'));
        $this->set("method", "gps");
        $this->render("index");
    }

    public function latlng($lat, $lng){
        $landmarks = $this->Landmark->find("all");
        $this->set(compact('landmarks','lat','lng'));
        $this->set("method", "latlng");
        $this->render("index");
    }
   
    public function landmark($id){
        $landmarks = $this->Landmark->findById($id);
        $this->set(compact('landmarks'));
        $this->set("method", "latlng");
    }
}
