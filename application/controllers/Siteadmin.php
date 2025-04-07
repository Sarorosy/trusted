<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteadmin extends CI_Controller {
    public $session, $Admin_model,$Category_model, $Blog_model, $form_validation ;

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model'); 
        $this->load->model('Blog_model'); 
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {

        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }

        $this->load->model('Blog_model');

        $data['blogs'] = $this->Blog_model->get_all_blogs();
        $data['categories'] = $this->Category_model->get_all();
        $data['main_content'] = "siteadmin/dashboard";
        $this->load->view('siteadmin/template', $data); 
    }

    public function login() {

        if ($this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin'));
        }

        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $admin = $this->Admin_model->check_login($username, $password);

            if ($admin) {
                $this->session->set_userdata('admin_data', $admin);
                redirect(base_url('siteadmin'));
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect(base_url('siteadmin/login'));
            }
        }

        $this->load->view('siteadmin/login');
    }

    public function logout() {
        $this->session->unset_userdata('admin_data');
        redirect(base_url('siteadmin/login'));
    }

    public function categories() {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }

        $data['categories'] = $this->Category_model->get_all();
        $data['main_content'] = "siteadmin/categories";
        $this->load->view('siteadmin/template', $data);
    }

    public function add_category() {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }
        $this->form_validation->set_rules('name', 'Category Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Please fill all fields.');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'isfeatured' => $this->input->post('isfeatured') ? 1 : 0
            ];
            $this->Category_model->insert($data);
            $this->session->set_flashdata('success', 'Category added successfully.');
        }
        redirect(base_url('siteadmin/categories'));
    }

    public function edit_category($id) {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }
        $data = [
            'name' => $this->input->post('name'),
            'isfeatured' => $this->input->post('isfeatured') ? 1 : 0
        ];
        $this->Category_model->update($id, $data);
        $this->session->set_flashdata('success', 'Category updated successfully.');
        redirect(base_url('siteadmin/categories'));;
    }

    public function delete_category($id) {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }
        $this->Category_model->delete($id);
        $this->session->set_flashdata('success', 'Category deleted successfully.');
        redirect(base_url('siteadmin/categories'));
    }
    public function add_blog() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $category = $this->input->post('category');
            $pay = $this->input->post('pay');
            
            // Generate slug
            $slug = $this->generate_slug($title);

            // Handle Image Upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
            $config['max_size'] = 2048; // 2MB limit

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url('siteadmin'));
            } else {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name']; // Store image filename
            }

            // Save to Database
            $data = [
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'image' => $image,
                'category' => $category,
                'pay' => $pay,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Blog_model->insert_blog($data);
            $this->session->set_flashdata('success', 'Blog added successfully');
            redirect(base_url('siteadmin'));
        }
    }

    private function generate_slug($title) {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim($title, '-')));
        
        $this->load->model('Blog_model');
        $original_slug = $slug;
        $count = 1;

        while ($this->Blog_model->slug_exists($slug)) {
            $slug = $original_slug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
