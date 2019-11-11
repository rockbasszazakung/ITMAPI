<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_history extends API_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('activities_history_model');
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->activities_history_model->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);

        //ไม่สำเร็จ
    
        // $this->response([
        //     'status' => false,
        //     'message' => []
        // ],REST_Controllers::HTTP_CONFLICT);
    }
    
    
}