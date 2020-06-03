<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
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
	public function index()
	{

		$this->load->model('general_model');
		$this->load->model('covid_model');
		$data['otg'] = $this->general_model->get_data('otg');
		$data['odp'] = $this->general_model->get_data('odp');
		$data['pdp'] = $this->general_model->get_data('pdp');
		$data['positif'] = $this->general_model->get_data('positif_covid');
		$data['hotline'] = $this->general_model->get_data('hotline');
		$data['info_update'] = $this->covid_model->get_info_update();
		// var_dump($data['info_update']);
		// die;

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('beranda/index', $data);
		$this->load->view('templates/footer');
	}
}