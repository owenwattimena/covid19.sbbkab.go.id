<?php
class Covid_model extends CI_Model
{

    // public function get_covid($table)
    // {


    //     $this->db->select('*');
    //     $this->db->from('users');
    //     $this->db->join("{$table}", "users.id = {$table}.updated_by");
    //     $this->db->order_by("{$table}.updated_at", 'DESC');
    //     $query = $this->db->get();

    //     return $query->result_object();
    // }

    public function save_covid($table, $data)
    {
        $status = '';
        $message = '';
        if ($this->db->insert($table, $data)) {
            $this->info_update($data);
            $status = 'success';
            $message = 'Data berhasil di simpan';
        } else {
            $status = 'error';
            $message = 'Data gagal di simpan';
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return $response;
    }

    private function info_update($data)
    {
        $table = 'info_update';

        $data = [
            'updated_at' => $data['created_at'],
            'updated_by'  => $data['created_by'],
        ];
        $query = $this->db->get($table);
        if ($query->result_object()) {
            $this->db->update($table, $data);
        } else {
            $this->db->insert($table, $data);
        }
    }

    public function get_info_update()
    {
        $query = $this->db->get('info_update');
        return $query->result_object();
    }

    // public function remove_covid($table, $id)
    // {
    //     $status = '';
    //     $message = '';
    //     // $builder = $this->db->table($table);
    //     if (!$this->db->delete($table, array('id' => $id))) {
    //         $status = 'error';
    //         $message = 'Data gagal di hapus';
    //     } else {
    //         $status = 'success';
    //         $message = 'Data berhasil di hapus';
    //     }

    //     $response = [
    //         'status' => $status,
    //         'message' => $message
    //     ];

    //     return $response;
    // }
}