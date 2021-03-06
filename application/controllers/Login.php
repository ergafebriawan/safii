<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'User');
    }

    public function index(){
        $data['judul'] = 'Login';
        $this->load->view('template/header', $data);
        $this->load->view('login/index');
    }

    public function proses_login(){
         $username = $this->input->post('username');
         $password = md5($this->input->post('password'));
         
        
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->User->getUser("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'name' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("Home"));
 
		}else{
            $this->session->set_userdata('message', $password);
            redirect(base_url("Login"));
		}
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect(base_url('Login'));
    }
}

?>