<?php

class Blog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database to initialize $this->db
    }

    public function get_all_blogs()
    {
        return $this->db->get('tbl_blogs')->result();
    }
    public function get_all_blogs_paginated($limit, $offset)
    {
        return $this->db->limit($limit, $offset)->get('tbl_blogs')->result();
    }

    public function count_all_blogs()
    {
        return $this->db->count_all('tbl_blogs'); // Get total number of blogs
    }
    public function insert_blog($data)
    {
        return $this->db->insert('tbl_blogs', $data);
    }

    public function slug_exists($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get('tbl_blogs')->num_rows() > 0;
    }
}
