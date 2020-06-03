<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!isset($this->session->logged_in) || $this->session->logged_in != TRUE) {
            redirect('', 'location');
        }
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

    public function covid19($params)
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
}