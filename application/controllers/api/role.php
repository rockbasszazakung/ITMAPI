<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class role extends API_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('role_models');
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->role_models->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_create_post(){
        $position_id = $this->input->post('position_id');
        $position = $this->input->post('position');
        $data = [
            'role_id' => null,
            'position_id' => $position_id,
            'position' => $position,
            'status' => 0
        ];
        $result = $this->role_models->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_select_get(){
        $result = $this->role_models->allActivities();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_update_post(){
        $role_id = $this->input->post('role_id');
        $position_id = $this->input->post('position_id');
        $position = $this->input->post('position');
        $data = [
            'role_id' => $role_id,
            'position_id' => $position_id,
            'position' => $position,
            'status' => 0
        ];
        $result = $this->role_models->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_delete_get(){
        $role_id = $this->input->get('role_id');
        $result = $this->role_models->delete($role_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

}