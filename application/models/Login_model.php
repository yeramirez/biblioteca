<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($email, $password) {
    	$query = $this->db->get_where('usuarios', array('email' => $email, 'password' => $password));
    	if ($query->num_rows() == 1) {
    		return $query->row_array();
        } else {
        	return false;
        }
    }
}
