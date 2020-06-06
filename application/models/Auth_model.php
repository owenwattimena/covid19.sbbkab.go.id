<?php
class Auth_model extends CI_Model
{

    public function get_auth($data)
    {


        $status = 'error';
        $message = 'Akun tidak terautentikasi';

        $username = $data['username'];
        $password = $data['password'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('deleted', '0');
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

    public function post_user($table, $post)
    {

        $status = 'error';
        $message = 'Username telah terdaftar!';
        if (isset($post['username']) && $this->get_user($post['username'])) {
            $response = [
                'status' => $status,
                'message' => $message,
            ];
        } else {
            if ($post['id'] <= 0) {

                $password_hash = password_hash($post['password'], PASSWORD_DEFAULT);
                $post['password'] = $password_hash;

                if ($this->db->insert($table, $post)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'User berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'User gagal ditambahkan',
                    ];
                }
            } else {
                $id = $post['id'];
                unset($post['id']);

                if (isset($post['password'])) {
                    $password_hash = password_hash($post['password'], PASSWORD_DEFAULT);
                    $post['password'] = $password_hash;
                }

                $this->db->where('id', $id);
                if ($this->db->update($table, $post)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'User berhasil diubah',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'User gagal diubah',
                    ];
                }
            }
        }

        return $response;
    }

    public function get_user($username)
    {
        return $this->db->get_where('users', ['username' => $username, 'deleted' => 0])->result_object();
    }

    public function delete_user($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id', $id);
        if ($this->db->update('users')) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil di hapus!',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data gagal di hapus!',
            ];
        }
        return $response;
    }

    public function ubah_password($post)
    {

        $id = $post['id'];
        $user_id = $this->session->user->id;
        $password = $post['password'];
        $password_baru = $post['password-baru'];
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->result_object();
        // echo json_encode($user);
        // die;
        if ($user) {
            if (password_verify($password, $user[0]->password)) {
                # code...
                $this->db->set('password', $password_hash);
                $this->db->where('id', $id);
                if ($this->db->update('users')) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Password berhasil di ubah!',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Password gagal di ubah!',
                    ];
                }
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Password salah!',
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'User tidak terdaftar!',
            ];
        }
        return $response;
    }
}