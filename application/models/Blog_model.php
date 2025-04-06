<?php

class Blog_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database to initialize $this->db
    }

    public function get_all_blogs() {
        return $this->db->get('tbl_blogs')->result();
    }
    public function insert_blog($data) {
        return $this->db->insert('tbl_blogs', $data);
    }

    public function slug_exists($slug) {
        $this->db->where('slug', $slug);
        return $this->db->get('tbl_blogs')->num_rows() > 0;
    }
}
