<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    private $user;


    public function __construct()
    {
        parent::__construct();
        $this->user = $this->session->user;


        if (!isset($this->session->logged_in) || $this->session->logged_in != TRUE || $this->user->id <= 0) {
            redirect('', 'location');
        }

        // var_dump($this->user);
        // die;
    }

    /**
     *  HALAMAN DASHBOARD PADA ADMIN
     */

    public function dashboard()
    {
        $this->load->model('general_model');

        $data['otg'] = $this->general_model->get_data('otg');
        $data['odp'] = $this->general_model->get_data('odp');
        $data['pdp'] = $this->general_model->get_data('pdp');
        $data['positif'] = $this->general_model->get_data('positif_covid');


        $data['current_menu'] = 'Dashboard';
        $data['title'] = 'Dashboard';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }


    /**
     *  MENU COVID-19
     */

    public function covid19($params = null)
    {
        switch ($params) {
                /**
             *  HALAMAN OTG
             */
            case 'orang-tanpa-gejalah':

                $data['current_menu'] = 'Covid19/otg';

                $data['title'] = 'Orang Tanpa Gejala';


                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/covid19/otg');
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');

                break;

            case 'orang-dalam-pemantauan':
                $data['current_menu'] = 'Covid19/odp';

                $data['title'] = 'Orang Dalam Pemantauan';


                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/covid19/odp');
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');
                break;

            case 'pasien-dalam-pengawasan':

                $data['current_menu'] = 'Covid19/pdp';

                $data['title'] = 'Pasien Dalam Pengawasan';


                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/covid19/pdp');
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');

                break;

            case 'positif-covid19':

                $data['current_menu'] = 'Covid19/positif';

                $data['title'] = 'Positif Covid19';


                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/covid19/positif');
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');

                break;


            default:
                # code...
                redirect('/admin/dashboard');

                break;
        }
    }

    public function hotline()
    {
        $data['current_menu'] = 'Hotline';
        $data['title'] = 'Hotline';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/hotline/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }

    public function media()
    {
        $data['current_menu'] = 'Media';
        $data['title'] = 'Media';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/media/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }

    public function himbauan()
    {
        $data['current_menu'] = 'Himbauan';
        $data['title'] = 'Himbauan';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/himbauan/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }

    public function infografis()
    {
        $data['current_menu'] = 'Infografis';
        $data['title'] = 'Infografis';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/infografis/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }

    public function users()
    {
        $data['current_menu'] = 'Users';
        $data['title'] = 'Users';
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navbar');
        $this->load->view('admin/templates/aside');
        $this->load->view('admin/templates/content-header');
        $this->load->view('admin/users/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/script');
    }

    public function pengaturan($params = null)
    {
        $this->load->model('general_model');

        switch ($params) {

            case 'halaman':


                $data['current_menu'] = 'Pengaturan/halaman';
                $data['title'] = 'Halaman';
                $data['pengaturan'] = $this->general_model->get('pengaturan');
                // die;

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/pengaturan/halaman/index', $data);
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');
                break;
            case 'kontak':
                $data['current_menu'] = 'Pengaturan/kontak';
                $data['title'] = 'Kontak';
                // die;

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/navbar');
                $this->load->view('admin/templates/aside');
                $this->load->view('admin/templates/content-header');
                $this->load->view('admin/pengaturan/kontak/index', $data);
                $this->load->view('admin/templates/footer');
                $this->load->view('admin/templates/script');
                break;

            default:
                redirect('/admin/dashboard');
                break;
        }
    }

    public function ubah_halaman()
    {
        // var_dump($_POST);
        // die;
        $this->load->model('general_model');

        $table = 'pengaturan';

        if ($this->input->post()) {
            $post = $this->input->post();

            $path = './uploads/pengaturan/img/';

            if ($_FILES['logo']['error'] == 0) {
                $this->load->library('covid');
                $result = $this->covid->upload_file('logo', $path);
                if ($result['status'] == 'success') {

                    $post['logo'] = $result['upload_data']['file_name'];


                    $data = $this->general_model->get_where('pengaturan', ['id' => $post['id']]);

                    if (isset($data[0]->logo) && $data[0]->logo != null) {

                        $this->load->helper('file');
                        // delete source from directory
                        if (!delete_files($path . $data[0]->logo)) {
                            unlink($path . $data[0]->logo);
                        }
                    }
                } else {
                    $this->covid->alert_message('error', 'alert-danger', $result['message']);
                }
            }

            if ($_FILES['banner_source']['error'] == 0) {
                $this->load->library('covid');
                $result = $this->covid->upload_file('banner_source', './uploads/pengaturan/img/');
                if ($result['status'] == 'success') {
                    $post['banner_source'] = $result['upload_data']['file_name'];
                    $data = $this->general_model->get_where('pengaturan', ['id' => $post['id']]);

                    if (isset($data[0]->banner_source) && $data[0]->banner_source != null) {

                        $this->load->helper('file');
                        // delete source from directory
                        if (!delete_files($path . $data[0]->banner_source)) {
                            unlink($path . $data[0]->banner_source);
                        }
                    }
                } else {
                    $this->covid->alert_message('error', 'alert-danger', $result['message']);
                }
            }
            if ($post['id'] <= 0) {
                unset($post['id']);
                $result = $this->general_model->save_data($table, $post);
            } else {
                $result = $this->general_model->save_data($table, $post);
            }
            $this->load->library('covid');
            if ($result['status'] == 'success') {
                $this->covid->alert_message('success', 'alert-success', 'Pengaturan berhasil di simpan');
            } else {
                $this->covid->alert_message('error', 'alert-danger', 'Pengaturan gagal di simpan');
            }
            // $this->session->set_flashdata('alert', `owen`);

            redirect('/admin/pengaturan/halaman');
        }
    }
}