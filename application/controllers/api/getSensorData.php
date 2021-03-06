<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class getSensorData extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Device_model', 'Device');
    }

    public function index_get(){
        $id = $this->get('id_device');
        $data = [
            'sensor_1' => $this->put('sensor_1'),
            'sensor_2' => $this->put('sensor_2'),
            'sensor_3' => $this->put('sensor_3'),
            'sensor_4' => $this->put('sensor_4'),
            'sensor_5' => $this->put('sensor_5'),
            'output_1' => $this->put('output_1'),
            'output_2' => $this->put('output_2'),
            'output_3' => $this->put('output_3'),
            'output_4' => $this->put('output_4')
        ];
        
        if($this->Device->updateDevice($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'Device updated'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update device'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>