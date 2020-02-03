<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_history extends BD_Controller{
    function __construct(){

        parent::__construct();

        $this->load->model('Activities_history_model');
    }
    function get_select_get(){
        $result = $this->Activities_history_model->allActivities();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function get_all_get(){
        $keywoed = $this->get('keyword');
        $result = $this->Activities_history_model->get_all($keywoed);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
    function post_create_post(){
        $activities_id = $this->post('activities_id');
        $name_structure = $this->post('name_structure');
        $activities_name = $this->post('activities_name');
        $major = $this->post('major');
        $student_id = $this->post('student_id');
        $data = [
            'activities_history_id' => null,
            'activities_id' => $activities_id,
            'name_structure' => $name_structure,
            'activities_name' => $activities_name,
            'major' => $major,
            'student_id' => $student_id
        ];
        $result = $this->Activities_history_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_update_post(){
        $activities_history_id = $this->post('activities_history_id');
        $status = $this->post('status');
        $name_structure = $this->post('name_structure');
        $activities_name = $this->post('activities_name');
        $major = $this->post('major');
        $student_id = $this->post('student_id');
        $data = [
            'activities_history_id' => $activities_history_id,
            //'activities_id' => $activities_id,
            'name_structure' => $name_structure,
            'activities_name' => $activities_name,
            'major' => $major,
            'student_id' => $student_id,
            'status' => $status
        ];
        $result = $this->Activities_history_model->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function getActivityHistory_get(){
        $activities_history_id = $this->get('activities_history_id');
        $result = $this->Activities_history_model->getActivities($activities_history_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_delete_get(){
        $activities_history_id = $this->get('activities_history_id');
        $result = $this->Activities_history_model->delete($activities_history_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
}