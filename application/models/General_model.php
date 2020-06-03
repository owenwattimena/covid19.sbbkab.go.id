<?php
class General_model extends CI_Model
{

    public function get_data($table)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("{$table}", "users.id = {$table}.created_by");
        $this->db->order_by("{$table}.created_at", 'DESC');
        $query = $this->db->get();

        return $query->result_object();
    }

    public function get_where($table, $conditions)
    {
        $this->db->where($conditions);
        return $this->db->get($table)->result_object();
    }

    public function save_data($table, $data)
    {
        $status = '';
        $message = '';

        if (isset($data['id'])) {
            $id = $data['id'];
            unset($data['id']);

            $this->db->where('id', $id);
            if ($this->db->update($table, $data)) {
                $status = 'success';
                $message = 'Data berhasil di simpan';
            } else {
                $status = 'error';
                $message = 'Data gagal di simpan';
            }
        } else {
            if ($this->db->insert($table, $data)) {
                $status = 'success';
                $message = 'Data berhasil di simpan';
            } else {
                $status = 'error';
                $message = 'Data gagal di simpan';
            }
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return $response;
    }

    public function remove_data($table, $id)
    {
        $status = '';
        $message = '';
        // $builder = $this->db->table($table);
        if (!$this->db->delete($table, array('id' => $id))) {
            $status = 'error';
            $message = 'Data gagal di hapus';
        } else {
            $status = 'success';
            $message = 'Data berhasil di hapus';
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return $response;
    }
}