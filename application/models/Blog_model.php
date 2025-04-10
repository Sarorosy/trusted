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
    public function get_featured_blogs()
    {
        $this->db->select('tbl_blogs.*, tbl_categories.name as category_name');
        $this->db->from('tbl_blogs');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_blogs.category', 'left');
        $this->db->where('isfeaturepost', 1);
        return $this->db->get()->result();
    }

    public function get_all_blogs_paginated($limit, $offset)
    {
        $this->db->select('tbl_blogs.*, tbl_categories.name as category_name');
        $this->db->from('tbl_blogs');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_blogs.category', 'left'); // Left join to include all blogs even if category is missing
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    public function get_blog_by_slug($slug)
    {
        $this->db->select('tbl_blogs.*, tbl_categories.name as category_name');
        $this->db->from('tbl_blogs');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_blogs.category', 'left'); // Left join to include blogs even if category is missing
        $this->db->where('tbl_blogs.slug', $slug);

        return $this->db->get()->row();
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
    public function get_blog_by_id($id)
    {
        return $this->db->where('id', $id)->get('tbl_blogs')->row();
    }

    public function update_blog($id, $data)
    {
        return $this->db->where('id', $id)->update('tbl_blogs', $data);
    }
}
