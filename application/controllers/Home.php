<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public $session, $Admin_model, $pagination, $Category_model, $Blog_model, $form_validation;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Category_model');
        $this->load->model('Blog_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index($page = 0)
    {
        $this->load->library('pagination');
        $page = is_numeric($page) ? (int) $page : 0;

        $config['base_url'] = base_url('home/index'); // URL for pagination links
        $config['total_rows'] = $this->Blog_model->count_all_blogs(); // Total number of blogs
        $config['per_page'] = 1; // Number of blogs per page
        $config['uri_segment'] = 3; // URL segment for pagination
        $config['use_page_numbers'] = TRUE; // Use page numbers instead of offset
        $config['reuse_query_string'] = TRUE;

        // Pagination styling (Bootstrap)
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $data['main_content'] = 'home';
        $data['datas'] = $this->Blog_model->get_all_blogs_paginated($config['per_page'], $page);
        $data['pagination_links'] = $this->pagination->create_links(); // Generate pagination links

        $this->load->view('template', $data);
    }
}
