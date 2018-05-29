<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingreso_autores_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function registro_autores($data) {
        $data = array('nombre_au' => $data['nombre'] ,
                    'apellido'=>  $data['apellido']
         );

        $this->db->insert('autores',$data);

     
    }

    public function consultar_usuarios() {

        $query = $this->db->query('SELECT * FROM usuarios');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    }

    public function obtener_perfiles() {

        $query = $this->db->query('SELECT * FROM tipo_usuario');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    }
}

