<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activies_register extends BD_Controller{
    function __construct(){
        
        parent::__construct();
        
        $this->load->model('Activities_register_models');
    }
    function getActivities_register_get(){
        $id = $this->get('id');
        $result = $this->Activities_register_models->getActivities_register($id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
}