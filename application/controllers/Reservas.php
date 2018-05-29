
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {

    public function __construct() {
    parent::__construct();
    $this->load->model('Ingreso_reservas_model');
  }

        public function index() {

            if ($this->session->userdata('logged_in')) {
                // obtenemos el titulo para las paginas
               $data['title'] = 'Reservas';
                // obtenemos el array de los perfiles y lo preparamos para enviar
                $result['datos'] = $this->Ingreso_reservas_model->obtener_materiales();
                                 
                // obtenemos los usuarios
                //$result['data'] = $this->Ingreso_usuarios_model->consultar_usuarios();

                //Se realiza la carga de las interfaces
                $this->load->view('header', $data);
                $this->load->view('navbar_view');
                //$this->load->view('Materiales_view', $result);
                $this->load->view('reservas_view', $result);
                $this->load->view('footer');
            } else {
              redirect(base_url());
              }
        }

        
      public function ingreso_reservas() {
        

            $producto = $this->input->post('producto');
            $fecha_reserva= $this->input->post('fecha_reserva');
            $usuario = $this->input->post('usuario');
            $estado = '1';

                      


           $data = array(
                        
                        'fecha' => $fecha_reserva,
                        'estado' => $estado,
                        'Usuarios_id' => $usuario,
                        'Materiales_id' => $producto                      
                    ); 

           $this->Ingreso_reservas_model->ingreso_reserva($data);
           redirect(base_url());
           

      }

}