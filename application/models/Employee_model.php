<?php 
class Employee_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function userlogin($username, $password) {
        $this->db->select('*');
        $this->db->from('employee AS T1');
        $this->db->where('T1.email', $username);
        $this->db->where('T1.password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}