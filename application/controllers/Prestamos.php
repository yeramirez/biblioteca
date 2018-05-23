<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Prestamos extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // code...
  }

  public function index() {
    if ($this->session->userdata('logged_in')) {
      // Obtenemos el titulo para las paginas
  		$data['title'] = 'Prestamos';
      //Se realiza la carga de las vistas
      $this->load->view('header', $data);
  		$this->load->view('navbar_view');
  		$this->load->view('prestamos_view');
  		$this->load->view('footer');
    } else {
      redirect(base_url());
    }
  }
}
