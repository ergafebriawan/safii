<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Device extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Device_model', 'Device');
    }

    public function index_get(){
        $id = $this->get('id_device');
        if($id === null){
            $device = $this->Device->getDevice();
        }else{
            $device = $this->Device->getDevice($id);
        }
        
        if($device){
            $this->response($device, REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // public function index_delete(){
    //     $id = $this->delete('id_device');

    //     if($id === null){
    //         $this->response([
    //             'status' => false,
    //             'message' => 'provide an id'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }else{
    //         if($this->Device->deleteDevice($id) > 0){
    //             //ok
    //             $this->response([
    //                 'status' => true,
    //                 'id' => $id,
    //                 'message' => 'deleted'
    //             ], REST_Controller::HTTP_NO_CONTENT);
    //         }else{
    //             //not found
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'id not found'
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }

    // public function index_post(){
    //     $data = [
    //         'id_device' => $this->post('id_device'),
    //         'nama_device' => $this->post('nama_device'),
    //         'detak_jantung' => $this->post('detak_jantung'),
    //         'suhu' => $this->post('suhu'),
    //         'kipas' => $this->post('kipas')
    //     ];

    //     if($this->Device->createDevice($data) > 0){
    //         $this->response([
    //             'status' => true,
    //             'message' => 'Device created'
    //         ], REST_Controller::HTTP_CREATED);
    //     }else{
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to created new Device'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

    public function index_put(){
        $id = $this->put('id_device');
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