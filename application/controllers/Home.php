<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
  		parent::__construct();

	}

	public function index() {

        if ($this->session->userdata('logged_in')) {
          $data['title'] = 'Home';

            $this->load->view('header', $data);
            $this->load->view('navbar_view');
            $this->load->view('home_view');
            $this->load->view('footer');
        } else {
          redirect(base_url());
        }
	}
}
