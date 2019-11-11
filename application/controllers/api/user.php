<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends  API_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('user_models');
    }
    function post_create_post(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status');	
        $role = $this->input->post('role');
        $data = [
            'user_id' => null,
            'username' => $username,
            'password' => $password,
            'status' => 0,
            'role' => $role
        ];
        $result = $this->user_models->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
}