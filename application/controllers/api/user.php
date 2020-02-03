<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends  BD_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    function post_create_post(){
        $username = $this->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $status = $this->post('status');	
        $role = $this->post('role');
        $name = $this->post('name');
        $data = [
            'user_id' => null,
            'username' => $username,
            'password' => $password,
            'status' => 0,
            'role' => $role,
            'name' => $name
        ];
        $result = $this->User_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
}