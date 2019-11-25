<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_relations extends BD_Controller{
    function construct(){
        parent::construct();
        $this->load->model('public_relations_model');
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->public_relations_model->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);

    function create_post(){
        $topic = $this->post('topic');
        // topic คือ หัวข้อประชาสัมพันธ์
        $content = $this->post('content');
        // content คือ เนื้อหาประชาสัมพันธ์
        $announcer_id = $this->post('announcer_id');
        // Announcer_name คือ คนประกาศประชาสัมพันธ์

        $data = [
            'public_id' => null,
            'topic' => $topic,
            'content' => $content,
            'announcer_id' => $announcer_id
        ];

        $result = $this->public_relations_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function update_post(){
        $topic = $this->post('topic');
        // topic คือ หัวข้อประชาสัมพันธ์
        $content = $this->post('content');
        // content คือ เนื้อหาประชาสัมพันธ์
        $announcer_id = $this->post('announcer_id');
        // Announcer_name คือ คนประกาศประชาสัมพันธ์

        $data = [
            'public_id' => null,
            'topic' => $topic,
            'content' => $content,
            'announcer_id' => $announcer_id
        ];

        $result = $this->apublic_relations_model->update($data);
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
    }


}