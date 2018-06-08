<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

    public function __construct() {
		parent::__construct();
    $this->load->model('Ingreso_prestamos_model');
        //$this->load->model('Ingreso_autores_model');
		
	}

        public function index() {

                   }

            public function buscar_reserva(){
                  

                  $query = $this->input->get('query', TRUE);
                  echo $query;
                  if ($query){
                   $reserva = $this->Ingreso_prestamos_model->obtener_reserva($query);
                      
                      if($reserva != FALSE){

                         $reservas = array('resultado' => $reserva );
                      }else{

                        $data = array('resultado' =>  '');
                      }
                  }
              $this->load->view('header');
              $this->load->view('prestamos_view',$reservas);
              //$this->Ingreso_autores_model->registro_autores($data);
              //redirect(base_url('Prestamos',$reservas));
      }     
         




       
}
