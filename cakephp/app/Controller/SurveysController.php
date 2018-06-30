<?php
App::uses('AppController', 'Controller');
/**
 * Surveys Controller
 *
 * @property Survey $Survey
 * @property PaginatorComponent $Paginator
 */
class SurveysController extends AppController {

    public $uses = array('Member','Survey','SurveyPhoto','Session');

    public function jsonp(){
        $this->autoRender=false;
        $post = $this->request->data;
        $this->log(compact('post'),LOG_DEBUG);
        $this->response->header('Access-Control-Allow-Origin: *');
        $this->response->header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $this->response->header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->response->header('Content-Type: application/json');
        $this->log(compact('data','callback','post'),LOG_DEBUG);
        $file_dir = TMP . DS . "photos"  . DS;
        $file_base = date('Ymd_His'). ".jpg";
        $file_name = $file_dir . $file_base;
        $pict = base64_decode($post["pict"]);
        $kind = $post["kind"];
        file_put_contents($file_name, $pict);
        //写真情報を
        $member = $this->Member->find('first', array(
            'conditions' => array(
                'txt1' => $post['uuid']
            )
        ));
        if (!empty($member)){
            //データの保存
            $s = array(
                "Survey" => array(
                    "member_id" => $member["Member"]["id"],
                    "survey_date" => date('Y-m-d H:i:s')
                ),
            );
            $this->log($s, LOG_DEBUG);
            $this->Survey->save($s);
            $sp = array(
                "SurveyPhoto" => array(
                    "survey_id" => $this->Survey->id,
                    "kind" => $kind,
                    "photo_path" => $file_base
                )
            );
            $this->SurveyPhoto->save($sp);
        }else{
            $this->response->statusCode('400');
            echo json_encode(array("success" => false,'msg' => '学籍番号間違っています'));
            return;
        }

        echo json_encode(array("success" => true));
    }

    public function login(){
        $this->autoRender=false;
        $post = $this->request->data;
        $this->response->header('Access-Control-Allow-Origin: *');
        $this->response->header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $this->response->header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->response->header('Content-Type: application/json');
        $post = $this->request->data;
        $this->log(compact('post'),LOG_DEBUG);
        $user_id = $post['user_id'];
        $uuid = $post['uuid'];

        //ユーザーIDの正規表現 [0-9]{3}j[0-9]{5}
        if (!preg_match("/\d{3}j\d{5}/",$user_id)){
            $this->response->statusCode('400');
            echo json_encode(array("success" => false,'msg' => '学籍番号間違っています'));
            return;
        }
        //Memberからuser_idを検索
        $rs = $this->Member->find('first',array(
            'conditions' => array(
                'user_id' => $user_id
            )
        ));
        if (empty($rs)){
            //エラー
            $this->response->statusCode('400');
            echo json_encode(array("success" => false,'msg' => '学籍番号間違っています'));
            return;
        }else{
            $member_id = $rs["Member"]["id"];
        }
        $sessions = array('Session' => compact('user_id','uuid'));
        $this->Session->create();
        $this->Session->save($sessions);
        $this->Member->id = $member_id;
        $this->Member->saveField('txt1',$uuid);
        echo json_encode(array("success" => true));
    }
}
