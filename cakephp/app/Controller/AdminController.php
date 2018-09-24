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

    public function photo_survey($id = null){
        if (!empty($id)){
            $lists = $this->Paginator->paginate(
                'ParkSurveyPhoto',
                array('park_list_id' => $id)
            );
            $park_list = $this->ParkList->findById($id);
            $this->set(compact('id','lists','park_list'));
        }else{
            //写真登録済みの公園一覧
            $lists = $this->ParkSurveyPhoto->parkList();
            $this->set(compact('lists'));
            $this->render("park_list");
        }
    }

    public function photo_dl($id){
        $park_list = $this->ParkList->findById($id);
        $this->autoRender=false;
        $lists = $this->request->data["lists"];
        $url = $this->referer();
        $zip = new ZipArchive();
        $zip_file = sprintf("/tmp/(%s)%s_%s.zip", $id, $park_list["ParkList"]["park_name"], date('Ymdhis'));
        $rs = $zip->open($zip_file,  ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);

        foreach ($lists as $list){
            $photo = $this->ParkSurveyPhoto->findById($list);
            $file = TMP . "photos/" . $photo["ParkSurveyPhoto"]["file_path"];
            $base_file = basename($file);
            $zip->addFile($file, $base_file);
        }
        $zip->close();
        echo basename($zip_file);
    }

    public function zip_dl($filename){
        $this->autoRender=false;
        $zip_file = "/tmp/" . $filename;
        if (is_file($zip_file)){
            $this->response->download($zip_file);
            $this->response->file(
                $zip_file,
                array('download' => true, 'name' => $filename)
            );
        }
    }

}
