<?php
class Auth_model extends CI_Model
{

    public function get_hotline($table)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join("{$table}", "users.id = {$table}.updated_by");
        $this->db->order_by("{$table}.updated_at", 'DESC');
        $query = $this->db->get();

        return $query->result_object();
    }
}