<?php
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database to initialize $this->db
    }
    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Ensure passwords are hashed in DB
        $query = $this->db->get('tbl_admin');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } 
        return false;
    }
}
