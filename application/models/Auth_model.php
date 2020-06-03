<?php
class Auth_model extends CI_Model
{

    public function get_auth($data)
    {


        $status = 'error';
        $message = 'Akun tidak terautentikasi';

        $email = $data['email'];
        $password = $data['password'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->row();
        // var_dump($result->id);
        if ($result) {
            if (password_verify($password, $result->password)) {
                $user = $result;
                $session = [
                    'user' => $user,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session);
                $status = 'success';
                $message = 'Login berhasil';
            } else {
                $status = 'error';
            }
        }

        $response = [
            'status' => $status,
            'message' => $message,
        ];
        return $response;
    }
}