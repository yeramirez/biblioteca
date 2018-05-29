<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingreso_usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function registro_usuario($email, $data) {
      $output = array('error' => false);

      if ($data['email'] !='') {
        $query = $this->db->get_where('tbl_usuarios', array('email' => $email));

        if ($query->num_rows() == 0) {
          $this->db->insert("tbl_usuarios", $data);
          if ($this->db->affected_rows() > 0) {
            $output['message'] = 'Usuario registrado correctamente';
          } else {
            $output['error'] = true;
            $output['message'] = 'No se pudo guardar la informacion';
          }
        } else {
          $output['error'] = true;
          $output['message'] = 'El email ya existe, ingrese otro email';
        }
      } else {
        $output['error'] = true;
        $output['message'] = 'Ingrese el email';
      }
      echo json_encode($output);
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
