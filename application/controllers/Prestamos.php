
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamos extends CI_Controller {

    public function __construct() {
    parent::__construct();
    $this->load->model('Ingreso_prestamos_model');
  }

        public function index() {

            if ($this->session->userdata('logged_in')) {
                // obtenemos el titulo para las paginas
               $data['title'] = 'Prestamo';
                // obtenemos el array de los perfiles y lo preparamos para enviar
                $result['datos'] = $this->Ingreso_prestamos_model->obtener_materiales();

                                 
                // obtenemos los usuarios
               // $result['data'] = $this->Ingreso_usuarios_model->consultar_usuarios();
               
                //Se realiza la carga de las interfaces
                $this->load->view('header', $data);
                $this->load->view('navbar_view');
                $this->load->view('prestamos_view', $result);
                $this->load->view('footer');



            } else {
              redirect(base_url());
              }
              
            

          
          }

         



     public function ingreso_prestamos() {
        

            $producto = $this->input->post('producto');
            $fecha_entrega= $this->input->post('fecha_entrega');
            $fecha_devolucion= $this->input->post('fecha_devolucion');
            $usuario = $this->input->post('usuario');
            $reservas = $this->input->post('id_reservas');
            $estado = '1';

            
          $data = array(
                        
                        'fecha_entrega' => $fecha_entrega,
                        'fecha_devolucion' => $fecha_devolucion,
                        'estado_p' => $estado,
                        'Material_id' => $producto,
                        'Usuario_id' => $usuario,
                        'id_reserva' => $reservas
                                              
                    ); 
          
              

           $this->Ingreso_prestamos_model->ingreso_prestamos($data);
           
           redirect(base_url());
           

      }

}