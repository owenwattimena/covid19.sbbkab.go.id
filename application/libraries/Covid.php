<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Covid
{



    public function generateDateTime($timestamp)
    {

        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jum\'at',
            'Saturday' => 'Sabtu',
        ];


        // $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
        // $Day = $datetime->format('l');

        $Day = date('l', strtotime($timestamp));
        $date = date('d-m-Y', strtotime($timestamp));
        $time = date('H:i-s', strtotime($timestamp));
        if (!$timestamp) {
            return 'Belum ada data yang di perbarui';
        }

        $format = $hari[$Day] . ', ' . $date . ' - ' . $time;

        return $format;
    }

    public function upload_file($field, $path = './uploads/media/gambar/')
    {

        $CI = &get_instance();

        $config['upload_path']          = $path;
        // $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['allowed_types']        = '*';
        $config['max_size']             = FILE_UPLOAD_SIZE;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['encrypt_name']           = TRUE;
        // $this->load->library('upload', $config);
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($field)) {
            $result = [
                'status' => 'error',
                'message' => $CI->upload->display_errors()
            ];
            return $result;
        } else {
            $result = [
                'status' => 'success',
                'message' => 'Berhasil Upload',
                'upload_data' => $CI->upload->data()
            ];
            return $result;
        }
    }
}