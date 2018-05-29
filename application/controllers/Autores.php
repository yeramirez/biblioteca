<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autores extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->model('Ingreso_autores_model');
		
	}

        public function index() {

            if ($this->session->userdata('logged_in')) {
                // obtenemos el titulo para las paginas
                $data['title'] = 'Autores';
                // obtenemos el array de los perfiles y lo preparamos para enviar
                               
                $this->load->view('header', $data);
                $this->load->view('navbar_view');
                $this->load->view('autores_view');
                $this->load->view('footer');
            } else {
              redirect(base_url());
              }
        }

    public function guardar(){
       
            $nombres = $this->input->post('nombres');
            $apellidos = $this->input->post('apellidos');

              $data = array(
                        'nombre' => $nombres,
                        'apellido' => $apellidos
                    );

              $this->Ingreso_autores_model->registro_autores($data);
              redirect(base_url());
            }

        
}
