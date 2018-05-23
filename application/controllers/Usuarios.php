<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->model('Ingreso_usuarios_model');
	}

        public function index() {

            if ($this->session->userdata('logged_in')) {
                // obtenemos el titulo para las paginas
                $data['title'] = 'Usuarios';
                // obtenemos el array de los perfiles y lo preparamos para enviar
                $result['dropdown_perfiles'] = $this->Ingreso_usuarios_model->obtener_perfiles();
                // obtenemos los usuarios
                $result['data'] = $this->Ingreso_usuarios_model->consultar_usuarios();

                //Se realiza la carga de las interfaces
                $this->load->view('header', $data);
                $this->load->view('navbar_view');
                $this->load->view('usuarios_view', $result);
                $this->load->view('footer');
            } else {
              redirect(base_url());
              }
        }
        public function ingreso_usuario() {

        	$nombres = $this->input->post('nombres');
        	$apellidos = $this->input->post('apellidos');
        	$email = $this->input->post('email');
        	$password1 = sha1($this->input->post('password1'));
        	$nota = $this->input->post('nota');
        	$perfilusuario = $this->input->post('perfilusuario');
        	$tipousuario = $this->input->post('tipousuario');

            $data = array(
            		'nombre' => $nombres,
            		'apellido' => $apellidos,
            		'email' => $email,
            		'password' => $password1,
            		'informacion' => $nota,
            		'perfil_id' => $perfilusuario,
            		'estado_usuario_id' => $tipousuario
            );

          $this->Ingreso_usuarios_model->registro_usuario($email, $data);
      }

}
