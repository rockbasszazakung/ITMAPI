<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once APPPATH . 'libraries/API_Controller.php';

class Activities extends BD_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('activities_model');
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->activities_model->get_all($keywoed);
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
    function get_select_get(){
        $result = $this->activities_model->allActivities();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
    function post_create_post(){
        // $post = file_get_contents('php://input');
        $activities_name = $this->post('activities_name');
        $user_id = $this->post('user_id');
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');
        $activities_detail = $this->post('activities_detail');
        $data = [
            'activities_id' => null,
            'activities_name' => $activities_name,
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 0,
            'activities_detail' => $activities_detail
        ];
        $result = $this->activities_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_update_post(){
        $activities_id = $this->input->post('activities_id');
        $activities_name = $this->input->post('activities_name');
        $user_id = $this->input->post('user_id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $activities_detail = $this->input->post('activities_detail');
        $data = [
            'activities_id' => $activities_id,
            'activities_name' => $activities_name,
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 0,
            'activities_detail' => $activities_detail
        ];
        $result = $this->activities_model->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_delete_get(){
        $activities_id = $this->input->get('activities_id');
        $result = $this->activities_model->delete($activities_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
}