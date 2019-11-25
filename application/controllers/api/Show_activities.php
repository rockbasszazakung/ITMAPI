<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Show_activities extends BD_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('show_activities_models');
    }
    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->show_activities_models->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_select_get(){
        $result = $this->show_activities_models->show_activities();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_create_post(){
        $show_activities_name = $this->post('show_activities_name');
        $show_activities_image = $this->post('show_activities_image');
        $show_activities_result = $this->post('show_activities_result');
        $data = [
            'show_activities_id' => null,
            'show_activities_name' => $show_activities_name,
            'show_activities_image' => $show_activities_image,
            'show_activities_result' => $show_activities_result
        ];
        $result = $this->show_activities_models->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_update_post(){
        $show_activities_id = $this->post('show_activities_id');
        $show_activities_name = $this->post('show_activities_name');
        $show_activities_image = $this->post('show_activities_image');
        $show_activities_result = $this->post('show_activities_result');
        $data = [
            'show_activities_id' => $show_activities_id,
            'show_activities_name' => $show_activities_name,
            'show_activities_image' => $show_activities_image,
            'show_activities_result' => $show_activities_result
        ];
        $result = $this->show_activities_models->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function get_delete_get(){
        $show_activities_id = $this->input->get('show_activities_id');
        $result = $this->show_activities_models->delete($show_activities_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
}