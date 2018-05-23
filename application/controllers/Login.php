<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index(){
		//restrict users to go back to login if session has been set
		if ($this->session->userdata('logged_in')){
			redirect('Home');
		} else {
			$data['title'] = 'Login';

			$this->load->view('header', $data);
			$this->load->view('login_view');
		}
	}

	public function login() {

		$output = array('error' => false);
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = $this->login_model->login($_POST['email'],sha1($_POST['password']));

		if($data){
			$this->session->set_userdata('logged_in', $data);
		}	else {
			$output['error'] = true;
			$output['message'] = 'Usuario o contraseña incorrectos.';
		}
		echo json_encode($output);
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		redirect(base_url());
	}

}
