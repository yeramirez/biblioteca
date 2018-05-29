<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales extends CI_Controller {

    public function __construct() {
    parent::__construct();
    $this->load->model('Ingreso_material_model');
  }

        public function index() {

            if ($this->session->userdata('logged_in')) {
                // obtenemos el titulo para las paginas
               $data['title'] = 'Materiales';
                // obtenemos el array de los perfiles y lo preparamos para enviar
                $result['datos'] = $this->Ingreso_material_model->obtener_autores();
                $result['editorial'] = $this->Ingreso_material_model->obtener_editoriales();
                $result['tipo_material'] = $this->Ingreso_material_model->obtener_tipo_material();
                $result['tema_libro'] = $this->Ingreso_material_model->obtener_tema_libro();
                
                 
                // obtenemos los usuarios
                //$result['data'] = $this->Ingreso_usuarios_model->consultar_usuarios();

                //Se realiza la carga de las interfaces
                $this->load->view('header', $data);
                $this->load->view('navbar_view');
                $this->load->view('Materiales_view', $result);
                //$this->load->view('Materiales_view');
                $this->load->view('footer');
            } else {
              redirect(base_url());
              }
        }

        
        public function ingreso_materiales() {
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombre');
            $ejemplar= $this->input->post('ejemplar');
            $cantidad = $this->input->post('cantidad');
            $precio = $this->input->post('precio');
            $fecha_publicacion = $this->input->post('fecha_publicacion');
            $fecha_ingreso = $this->input->post('fecha_ingreso'); 
            $autor_id=$this->input->post('autor'); 
            $editorial_id=$this->input->post('editorial'); 
            $tipo_materiales_id=$this->input->post('tipo_material'); 
            $tema_libro_id=$this->input->post('tema_libro'); 


           $data = array(
                        'codigo' => $codigo,
                        'nombre' => $nombre,
                        'ejemplar' => $ejemplar,
                        'cantidad' => $ejemplar,
                        'precio' => $precio,
                        'fecha_publicacion' => $fecha_publicacion,
                        'fecha_ingreso' => $fecha_ingreso,
                        'autor_id'=>$autor_id,
                        'editorial_id'=>$editorial_id,
                        'tipo_materiales_id'=>$tipo_materiales_id,
                        'tema_libro_id'=>$tema_libro_id
                    ); 
           $this->Ingreso_material_model->ingreso_material($data); 

      }

}