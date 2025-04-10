<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siteadmin extends CI_Controller
{
    public $session, $Admin_model, $Category_model, $Blog_model, $form_validation;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Blog_model');
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {

        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }

        $this->load->model('Blog_model');

        $data['blogs'] = $this->Blog_model->get_all_blogs();
        $data['categories'] = $this->Category_model->get_all();
        $data['main_content'] = "siteadmin/dashboard";
        $this->load->view('siteadmin/template', $data);
    }

    public function login()
    {

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

    public function logout()
    {
        $this->session->unset_userdata('admin_data');
        redirect(base_url('siteadmin/login'));
    }

    public function categories()
    {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }

        $data['categories'] = $this->Category_model->get_all();
        $data['main_content'] = "siteadmin/categories";
        $this->load->view('siteadmin/template', $data);
    }

    public function add_category()
    {
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

    public function edit_category($id)
    {
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

    public function delete_category($id)
    {
        if (!$this->session->userdata('admin_data')) {
            redirect(base_url('siteadmin/login'));
        }
        $this->Category_model->delete($id);
        $this->session->set_flashdata('success', 'Category deleted successfully.');
        redirect(base_url('siteadmin/categories'));
    }
    public function add_blog()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $category = $this->input->post('category');
            $pay = $this->input->post('pay');
            $ad_titles = $this->input->post('ad_title');
            $ad_links = $this->input->post('ad_link');

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

            $adsArray = [];
            if (!empty($ad_titles) && !empty($ad_links)) {
                foreach ($ad_titles as $key => $ad_title) {
                    $adsArray[] = [
                        'title' => $ad_title,
                        'link' => $ad_links[$key]
                    ];
                }
            }
            $adsJson = json_encode($adsArray);

            // Save to Database
            $data = [
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'image' => $image,
                'category' => $category,
                'pay' => $pay,
                'keywords' => $adsJson,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Blog_model->insert_blog($data);
            $this->session->set_flashdata('success', 'Blog added successfully');
            redirect(base_url('siteadmin'));
        }
    }

    public function edit_blog($id)
    {
        $this->load->model('Blog_model');
        $data['blog'] = $this->Blog_model->get_blog_by_id($id);
        $data['categories'] = $this->Category_model->get_all(); // Fetch categories if needed

        if (!$data['blog']) {
            show_404();
        }
        $data['main_content'] = "siteadmin/edit_blog";
        $this->load->view('siteadmin/template', $data);
    }

    public function update_blog($id)
    {
        $this->load->model('Blog_model');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $category = $this->input->post('category');
            $pay = $this->input->post('pay') ? $this->input->post('pay') : null;
            $ad_titles = $this->input->post('ad_title');
            $ad_links = $this->input->post('ad_link');

            $ads = [];
            if (!empty($ad_titles) && !empty($ad_links)) {
                foreach ($ad_titles as $key => $ad_title) {
                    $ads[] = [
                        'title' => $ad_title,
                        'link'  => $ad_links[$key]
                    ];
                }
            }
            $ads_json = json_encode($ads);

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['image']['name'];

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $image_data = $this->upload->data();
                    $image_name = $image_data['file_name'];
                } else {
                    $image_name = $this->input->post('current_image'); // Retain existing image if upload fails
                }
            } else {
                $image_name = $this->input->post('current_image');
            }

            $data = [
                'title'       => $title,
                'description' => $description,
                'category'    => $category,
                'pay'         => $pay,
                'keywords'         => $ads_json,
                'image'       => $image_name
            ];



            $this->Blog_model->update_blog($id, $data);
            $this->session->set_flashdata('success', 'Blog updated successfully');
            redirect(base_url('siteadmin'));
        }
    }

    public function updateFeaturePost()
    {
        $blog_id = $this->input->post('blog_id');
        $is_feature_post = $this->input->post('is_feature_post');

        if ($blog_id !== null) {
            $this->db->where('id', $blog_id);
            $this->db->update('tbl_blogs', ['isfeaturepost' => $is_feature_post]);

            echo json_encode(['status' => 'success', 'message' => 'Feature post updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid blog ID.']);
        }
    }

    public function updatePopularPost()
    {
        $blog_id = $this->input->post('blog_id');
        $is_popular = $this->input->post('is_popular');

        if ($blog_id !== null) {
            $this->db->where('id', $blog_id);
            $this->db->update('tbl_blogs', ['ispopular' => $is_popular]);

            echo json_encode(['status' => 'success', 'message' => 'Popular post updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid blog ID.']);
        }
    }


    private function generate_slug($title)
    {
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
