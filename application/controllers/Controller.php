<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser', 'user');
    }

    public function index()
    {

    }
    public function login(Type $var = null)
    {
        $role = $this->session->userdata('role');
        if ($role == 'admin') {
            redirect('admin');
        } elseif ($role == 'pelanggan') {
            $check_data_user = $this->model->find_data('tb_profil', 'id_user', $id_user)->row();
            if ($check_data_user == null) {
                redirect('controller/isi_data_diri');
            } else {
                redirect('pelanggan');
            }
        }
        $data = null;
        $this->load->view('auth/login', $data, false);
    }
    public function register(Type $var = null)
    {
        $data = null;
        $this->load->view('auth/register', $data, false);

    }
    public function isi_data_diri($var = null)
    {
		
    }
// use for registration
    public function register_user(Type $var = null)
    {

        $post = $this->input->post();
        $validation_config = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|alpha_dash',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                    'alpha_dash' => 'Nama Harus berupa angka',
                ],
            ], [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Format email tidak sesuai',
                    'is_unique' => 'Email sudah digunakan',
                ],
            ], [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 karakter',
                ],
            ], [
                'field' => 'upassword',
                'label' => 'Ulangi Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 karakter',
                ],
            ],

        ];
        $this->form_validation->set_rules($validation_config);
        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation failed',
                'msg' => $this->form_validation->error_array(),
            ];
        } else {
            if ($post['password'] == $post['upassword']) {
                $insert = [
                    'username' => $post['email'],
                    'password' => hash('sha256', $post['password']),
                    'role' => 'pelanggan',
                    'nama' => $post['nama'],
                    'status_data' => 0,
                    'status_account' => 1,
                    'tgl_registrasi' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert('tb_user', $insert);
                $response = [
                    'status' => 'success',
                    'msg' => 'Registrasi berhasil, silahkan login',
                ];
            } else {
                $response = [
                    'status' => 'password not match',
                    'msg' => 'Password tidak sama',
                ];
            }
        }
        echo json_encode($response);
    }
    public function login_user(Type $var = null)
    {
        $post = $this->input->post();
        $validation_config = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                ],
            ], [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ],
            ],
        ];
        $this->form_validation->set_rules($validation_config);

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation failed',
                'msg' => $this->form_validation->error_array(),
            ];
        } else {
            $check_account = $this->user->check_account($post['email'], $post['password']);
            if ($check_account) {

                $session = [
                    'id_user' => $check_account->id_user,
                    'nama' => $check_account->nama,
                    'username' => $check_account->username,
                    'role' => $check_account->role,
                ];
                $this->session->set_userdata($session);
                $response = [
                    'status' => 'success',
                    'msg' => 'login success',
                ];
            } else {
                $response = [
                    'status' => 'account not found',
                    'msg' => 'Username atau password yang anda gunakan salah',
                ];
            }
        }
        echo json_encode($response);
    }
    public function logout(Type $var = null)
    {
        $this->session->sess_destroy();
        redirect('/');
    }
    public function error_404(Type $var = null)
    {
        $data = null;
        $this->load->view('page_error/error_404', $data, false);
    }

}

/* End of file  Controller.php */
