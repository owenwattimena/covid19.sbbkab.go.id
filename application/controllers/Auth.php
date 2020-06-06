<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if (isset($this->session->logged_in) || $this->session->logged_in == TRUE) {
            redirect('/admin/dashboard', 'location');
        }

        if ($this->input->post()) {
            $response = $this->doLogin($this->input->post());
            if ($response['status'] == 'success') {
                redirect('/admin/dashboard', 'location');
            }
            $this->session->set_flashdata('login_error', 'username dan password harus benar');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('admin/login');
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/auth/login', 'location');
    }

    protected function doLogin($POST)
    {
        $this->load->model('auth_model');
        return $this->auth_model->get_auth($POST);
    }
}