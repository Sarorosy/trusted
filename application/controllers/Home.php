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
        $config['per_page'] = 4; // Number of blogs per page
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

        $blogs = $this->Blog_model->get_all_blogs_paginated($config['per_page'], $page);
        $featured_blogs = $this->Blog_model->get_featured_blogs(); // Get featured blogs
        $data['featuredposts'] = $featured_blogs; // Get the first featured blog if available

        if ($page > 1) {
            // If page > 1, return JSON array instead of loading a full page
            echo json_encode(['blogs' => $blogs]);
            exit;
        }

        $data['main_content'] = 'home';
        $data['datas'] = $blogs;
        $data['pagination_links'] = $this->pagination->create_links(); // Generate pagination links

        $this->load->view('template', $data);
    }

    public function detail($slug)
    {
        $blog = $this->Blog_model->get_blog_by_slug($slug);

        if (!$blog) {
            show_404(); // Show 404 page if blog not found
        }

        $data['blog'] = $blog;
        $data['main_content'] = 'blog_detail'; // Load blog detail view

        $this->load->view('template', $data);
    }
}
