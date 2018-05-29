<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingreso_material_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function ingreso_material($data) {
       
        $this->db->insert('materiales',$data);

    }
     
    public function obtener_autores() {

        $query = $this->db->query('SELECT * FROM autores');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    }
     public function obtener_editoriales() {

        $query = $this->db->query('SELECT * FROM editorial');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    }

     public function obtener_tipo_material() {

        $query = $this->db->query('SELECT * FROM tipo_materiales');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
      }

      public function obtener_tema_libro() {

      $query = $this->db->query('SELECT * FROM tema_libro');
      if ($query->num_rows() > 0) {
          return $query->result_array();
      } else {
          return FALSE;
      }

    }
}