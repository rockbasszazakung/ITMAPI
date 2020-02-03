<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once APPPATH . 'libraries/API_Controller.php';

class Activities extends BD_Controller{
    function __construct(){
        
        parent::__construct();
        
        $this->load->model('Activities_model');
    }


    function search_get(){
        $keyword = $this->get('keyword');
        $result = $this->Activities_model->search($keyword);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_select_get(){
        $result = $this->Activities_model->allActivities();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
    function post_create_post(){
        // $post = file_get_contents('php://input');
      
        $activities_name = $this->post('activities_name');
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');
        $activities_detail = $this->post('activities_detail');
        $user = $this->post('user');
        
        $data = [
            'activities_id' => null,
            'activities_name' => $activities_name,
            'user_id' => 1,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 0,
            'activities_detail' => $activities_detail,
            'user' => $user
        ];
        $result = $this->Activities_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function post_update_post(){
        $activities_id = $this->post('activities_id');
        $activities_name = $this->post('activities_name');
        $user_id = $this->post('user_id');
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');
        $activities_detail = $this->post('activities_detail');
        $user = $this->post('user');
        $data = [
            'activities_id' => $activities_id,
            'activities_name' => $activities_name,
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 0,
            'activities_detail' => $activities_detail,
            'user' => $user
        ];
        $result = $this->Activities_model->update($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function getActivity_get(){
        $activities_id = $this->get('activities_id');
        $result = $this->Activities_model->getActivities($activities_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function get_delete_get(){
        $activities_id = $this->get('activities_id');
        $result = $this->Activities_model->delete($activities_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    
    public function do_upload()
        {
                $config['upload_path']          = '../../../public/image/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}