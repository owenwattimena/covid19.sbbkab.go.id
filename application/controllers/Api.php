<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->user = $this->session->user;

        if (!isset($this->session->logged_in) || $this->session->logged_in != TRUE || $this->user->id <= 0) {


            $response = [
                'status' => 'error',
                'message' => 'tidak terautentikasi'
            ];

            echo json_encode($response);
            die;
        }

        $this->load->model('covid_model');
        $this->load->model('general_model');
    }

    // Genaral method
    private function _getData($table)
    {
        $data_otg = $this->general_model->get_data($table);
        echo json_encode($data_otg);
    }

    /**
     * 
     *  REQUEST HALAMAN HOTLINE
     * 
     */


    public function getHotline()
    {
        $this->_getData('hotline');
    }

    public function postHotline()
    {
        $table = 'hotline';
        if ($this->input->post('id') <= 0) {
            $this->_createData($table, $this->input->post());
        } else {
            $this->_updateData($table, $this->input->post());
        }
    }


    /**
     * 
     *  REQUEST HALAMAN COVID-19
     * 
     */



    public function getOTG()
    {
        $this->_getData('otg');
    }

    public function getODP()
    {
        $this->_getData('odp');
    }

    public function getPDP()
    {
        $this->_getData('pdp');
    }

    public function getPositif()
    {
        $this->_getData('positif_covid');
    }

    private function _createData($table, $post)
    {
        if ($post) {

            $post['created_by'] = $this->user->id;
            $post['created_at'] = date(TIMESTAMP_FORMAT);

            switch ($table) {
                case 'hotline':
                case 'media':
                    unset($post['id']); // remove id from post type hidden
                    $response = $this->general_model->save_data($table, $post);
                    break;
                case 'himbauan':
                    unset($post['created_by']);
                    unset($post['created_at']);
                    // $post['updated_by'] = '';
                    // $post['updated_at'] = '';
                    unset($post['id']); // remove id from post type hidden
                    $response = $this->general_model->save_data($table, $post);
                    // $response = $post;

                    break;
                case 'infografis':
                    unset($post['id']); // remove id from post type hidden
                    $response = $this->general_model->save_data($table, $post);
                    break;
                case 'otg':
                case 'odp':
                case 'pdp':
                case 'positif_covid':
                    $response = $this->covid_model->save_covid($table, $post);
                    break;
                case 'users':
                    $post['roles'] = 'administrator';
                    unset($post['ulang-password']);

                    $this->load->model('auth_model');
                    $response = $this->auth_model->post_user($table, $post);
                    // $response = $post;
                    break;
            }

            echo json_encode($response);
        }
    }

    private function _updateData($table, $post)
    {
        if ($post) {
            $post['updated_by'] = $this->user->id;
            $post['updated_at'] = date(TIMESTAMP_FORMAT);
            $response = $this->general_model->save_data($table, $post);
            echo json_encode($response);
        }
    }

    public function postOTG()
    {
        $this->_createData('otg', $this->input->post());
    }

    public function postODP()
    {
        $this->_createData('odp', $this->input->post());
    }

    public function postPDP()
    {
        $this->_createData('pdp', $this->input->post());
    }

    public function postPositif()
    {
        $this->_createData('positif_covid', $this->input->post());
    }

    public function removeData()
    {

        if ($this->input->post()) {



            $POST = $this->input->post();
            $table = $POST['table'];
            $id = $POST['id'];
            switch ($table) {
                case 'media':
                    # code...
                    if ($this->general_model->get_where($table, ['id' => $id, 'type' => 'image'])) {

                        $this->_remove_file($table, $id, './uploads/media/gambar/', 'source');
                    }
                    break;
                case 'infografis':
                    # code...
                    if ($this->general_model->get_where($table, ['id' => $id])) {

                        $this->_remove_file($table, $id, './uploads/infografis/', 'source');
                    }
                    break;
            }
            $response = $this->general_model->remove_data($table, $id);

            echo json_encode($response);
        }
    }



    /**
     * 
     *  REQUEST HALAMAN MEDIA
     * 
     */

    public function getMedia()
    {
        $data_otg = $this->general_model->get_data('media');
        foreach ($data_otg as $key => $value) {
            # code...

            if ($data_otg[$key]->type == 'image') {
                $data_otg[$key]->source_detail = base_url('/uploads/media/gambar/') . $value->source;
            } else {
                $data_otg[$key]->source_detail = 'https://www.youtube.com/watch?v=' . $value->source;
            }
        }
        echo json_encode($data_otg);
    }


    public function postMedia()
    {



        $table = 'media';
        if ($this->input->post('type') == 'image') {

            if (empty($_FILES['source']['name'])) {
                /**
                 * jika upload kosong maka itu berarti datanya di update
                 */
                $this->_updateData($table, $this->input->post());
            } else {
                $this->load->library('covid');
                $result = $this->covid->upload_file('source');
                if ($result['status'] == 'success') {
                    // echo json_encode($result);
                    $_POST['source'] = $result['upload_data']['file_name'];

                    if ($this->input->post('id') <= 0) {
                        $this->_createData($table, $this->input->post());
                    } else {
                        // get source data by id
                        $data = $this->general_model->get_where('media', ['id' => $this->input->post('id')]);
                        $this->load->helper('file');
                        // delete source from directory
                        if (!delete_files('./uploads/media/gambar/' . $data[0]->source)) {
                            unlink('./uploads/media/gambar/' . $data[0]->source);
                        }

                        $this->_updateData($table, $this->input->post());
                    }
                } else {
                    echo json_encode($result);
                }
                // die;
            }
        } else {

            if ($this->input->post('id') <= 0) {
                $this->_createData($table, $this->input->post());
            } else {
                $this->_updateData($table, $this->input->post());
            }
        }
    }

    public function getHimbauan()
    {
        $data = $this->general_model->get('himbauan');
        echo json_encode($data);
    }

    public function postHimbauan()
    {


        $table = 'himbauan';

        // $_POST['text'] = $this->db->escape_str($_POST['text']);

        if ($this->input->post('id') <= 0) {
            $this->_createData($table, $this->input->post());
        } else {
            // echo json_encode($_POST);
            // die;
            $this->_updateData($table, $this->input->post());
        }
    }


    /**
     * 
     *  INFOGRAFIS
     * 
     */

    public function getInfografis()
    {
        $data = $this->general_model->get_data('infografis');
        foreach ($data as $key => $value) {
            # code...
            $data[$key]->source_detail = base_url('/uploads/infografis/') . $value->source;
        }
        echo json_encode($data);
    }

    public function postInfografis()
    {

        // echo json_encode($_POST);
        // die;
        $table = 'infografis';
        $path = './uploads/infografis/';

        if (empty($_FILES['source']['name'])) {
            $this->_updateData($table, $this->input->post());
        } else {
            $this->load->library('covid');
            $result = $this->covid->upload_file('source', $path);
            if ($result['status'] == 'success') {
                // echo json_encode($result);
                $_POST['source'] = $result['upload_data']['file_name'];

                if ($this->input->post('id') <= 0) {
                    $this->_createData($table, $this->input->post());
                } else {
                    // get source data by id
                    $data = $this->general_model->get_where($table, ['id' => $this->input->post('id')]);
                    $this->load->helper('file');
                    // delete source from directory
                    if (!delete_files($path . $data[0]->source)) {
                        unlink($path . $data[0]->source);
                    }

                    $this->_updateData($table, $this->input->post());
                }
            } else {
                echo json_encode($result);
            }
        }
    }


    /**
     * 
     *  USERS
     * 
     */

    public function getUsers()
    {
        $data = $this->general_model->get_where('users', ['roles' => 'administrator', 'deleted' => 0]);
        echo json_encode($data);
    }

    public function postUsers()
    {
        // echo json_encode($_POST);
        // die;
        $table = 'users';
        if ($this->input->post()) {
            $post = $this->input->post();
            if ($post['id'] <= 0) {
                //create
                $this->_createData($table, $post); // return json
            } else {
                // update
                $this->load->model('auth_model');
                $result = $this->auth_model->post_user($table, $post);
                echo json_encode($result);
            }

            // $this->load->model('auth_model');
            // $data = $this->auth_model->post_user($this->input->post());

            // echo json_encode($data);
        }
    }

    public function ubahPassword()
    {

        if ($this->input->post()) {

            $this->load->model('auth_model');

            $response = $this->auth_model->ubah_password($this->input->post());
            echo json_encode($response);
        }
    }

    public function removeUser()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $this->load->model('auth_model');
            $result = $this->auth_model->delete_user($id);
            echo json_encode($result);
        }
    }


    public function getKontak()
    {
        $data = $this->general_model->get('kontak');
        echo json_encode($data);
    }

    public function postKontak()
    {
        // echo json_encode($_POST);
        // die;
        $table = 'kontak';
        if ($this->input->post()) {
            $post = $this->input->post();
            if ($post['id'] <= 0) {
                // create data
                unset($post['id']);
                $response = $this->general_model->save_data($table, $post);
            } else {
                $response = $this->general_model->save_data($table, $post);
                // update data
            }
            echo json_encode($response);
        }
    }


    private function _remove_file($table, $id, $path = './uploads/media/gambar/', $field = 'source')
    {
        $data = $this->general_model->get_where($table, ['id' => $id]);
        $this->load->helper('file');
        // delete source from directory
        if (!delete_files($path . $data[0]->$field)) {
            unlink($path . $data[0]->$field);
        }
    }
}