<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_relations extends BD_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Public_relations_model');
    }
    function get_select_get(){
        $result = $this->Public_relations_model->allPublic_relations();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->Public_relations_model->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function post_create_post(){
        $topic = $this->post('topic');
        $content = $this->post('content');
        $announcer_id = $this->post('announcer_id');
        $data = [
            'public_id' => null,
            'topic' => $topic,
            'content' => $content,
            'announcer_id' => 1
        ];
        $result = $this->Public_relations_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function post_update_post(){
        $public_id = $this->post('public_id');
        $topic = $this->post('topic');
        // topic คือ หัวข้อประชาสัมพันธ์
        $content = $this->post('content');
        // content คือ เนื้อหาประชาสัมพันธ์
        $announcer_id = $this->post('announcer_id');
        // Announcer_name คือ คนประกาศประชาสัมพันธ์
        $data = [
            'public_id' => $public_id,
            'topic' => $topic,
            'content' => $content,
            'announcer_id' => $announcer_id
        ];
        $result = $this->Public_relations_model->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

        //ไม่สำเร็จ

        // $this->response([
        //     'status' => false,
        //     'message' => []
        // ],REST_Controllers::HTTP_CONFLICT);
    function get_delete_get(){
        $public_id = $this->get('public_id');
        $result = $this->Public_relations_model->delete($public_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function getPublic_relations_get(){
        $public_id = $this->get('public_id');
        $result = $this->Public_relations_model->getPublic_relations($public_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }


}