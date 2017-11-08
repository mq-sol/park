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
class UploadController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array("Detail", "ParkList", "Category");

    public function index () {
        if($this->request->is('post')){
            $tmp = $this->request->data['Upload']['file']['tmp_name'];
            if(is_uploaded_file($tmp)) {
                $dst_file = date('YmdHis').".csv";
                $dst_dir = "/var/tmp/";
                $dst_filename = $dst_dir . $dst_file;
                if (move_uploaded_file($tmp, $dst_filename)) {
                    $this->set(compact('dst_filename'));
                    $this->parse($dst_filename);
                }
            }
        }
    }

    private function parse ($filename){
        $csv = file_get_contents($filename);
        $data =  mb_convert_encoding($csv, "UTF-8", "UTF-8, sjis-win, ASCII");
        $rows = explode("\r\n",$data);
        //$this->set("data", $rows);
        $header = array_shift($rows);
        $headers = explode(",",$header);
        //カテゴリーは[]でくくってあるものを対象とする
        $categories = array();
        //格納列チェック
        foreach($headers as $key => $field){
            if ($field == "id"){
                $ids = $key;
            }else if (preg_match("/\[(.*)\]/",$field,$match)){
                $categories[] = array("key" => $key, "value" => $match[1]);
            }else if ($field == "緯度" || preg_match("/^lat/",$field)){
                $lats = $key;
            }else if ($field == "経度" || preg_match("/^(lon|lng)/",$field)){
                $lons = $key;
           }
        }
        //カテゴリーをDBに登録
        $this->Category->query("truncate table categories");
        foreach ($categories as $value){
            $category = array(
                "Category" => array(
                    "name" => $value["value"]
                )
            );
            $this->Category->create();
            $this->Category->save($category);
        }

        //詳細登録
        $this->Detail->query("truncate table details");
        foreach ($rows as $k => $row){
            $cols = explode(",", $row);
            if (count($cols) <= 1) continue;
            $park_list_id = $cols[$ids];
            foreach ($categories as $ck => $cv){
                $name = $cv["value"];
                $value = (empty($cols[$cv["key"]])) ? null : $cols[$cv["key"]];
                if (empty($value)) continue;
                if (mb_ereg_match("[0oO]",$value) || $value == "○"){
                    $permit_flag = 1;
                }else if (mb_ereg_match("[xX]", $value) || $value == "×" ){
                    $permit_flag = 2;
                }else{
                    $permit_flag = 0;
                }
                $detail = array(
                    "Detail" => compact('park_list_id','name', 'value','permit_flag')
                );
                $this->Detail->create();
                $this->Detail->save($detail);
            }
        } 
    }

}
