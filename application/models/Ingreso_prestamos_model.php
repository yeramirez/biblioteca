<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingreso_prestamos_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function ingreso_prestamos($data) {

              
        $this->db->insert('prestamos',$data);

    }
     
    public function obtener_materiales() {

        $query = $this->db->query('select materiales.id_materiales, materiales.nombre,autores.nombre_au,autores.apellido, materiales.precio,tipo_material from  materiales inner join tipo_materiales on (tipo_materiales.id_tipo_materiales=materiales.tipo_materiales_id) join autores on (autores.id_autores=materiales.autor_id );');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    } 
}