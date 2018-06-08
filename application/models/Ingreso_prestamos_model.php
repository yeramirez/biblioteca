<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingreso_prestamos_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function ingreso_prestamos($data) {
              
        $this->db->insert('prestamos',$data);
        

    }

    public function actualizar_cantidad($idmateriales){
        $this->db->where('id_materiales',$idmateriales);
        $this->db->update('materiales',$resta);

    }
     
    public function obtener_materiales() {

        //$query = $this->db->query('select materiales.id_materiales, materiales.nombre,autores.nombre_au,autores.apellido, materiales.precio,tipo_material from  materiales inner join tipo_materiales on (tipo_materiales.id_tipo_materiales=materiales.tipo_materiales_id) join autores on (autores.id_autores=materiales.autor_id );');
       
         $this->db->select("id_materiales,id_reservas,fecha,nombre,nombres,apellidos,estado");
         $this->db->from("reservas");
         $this->db->join("materiales", "id_materiales=materiales_id");
         $this->db->join("usuarios","usuarios_id=id_usuarios");
         
         $this->db->where("estado",1);

         $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }

    }

    public function obtener_reserva($id){
         $this->db->select("id_materiales,id_reservas,fecha,nombre,nombres,apellidos");
         $this->db->from("reservas");
         $this->db->join("materiales", "id_materiales=materiales_id");
         $this->db->join("usuarios","usuarios_id=id_usuarios");
         
         
                
         $this->db->where("id_reservas",$id);
         $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }

   }



    



}