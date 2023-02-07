<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser', 'user');
        $this->load->model('ModelPaketWisata', 'paket_wisata');
        $this->load->model('ModelFoto', 'foto');
        $this->id_user = $this->session->userdata('id_user');
        if ($this->session->userdata('role') !== 'pelanggan') {
            $this->session->set_flashdata('error', 'Akses tidak di izinkan');
            redirect('controller/login');
        }
    }

    public function index()
    {
        $data['content'] = 'pelanggan/dashboard';
        $data['total_booking'] = 0;
        $data['total_transaksi'] = 0;
        $this->load->view('layout/template', $data, false);
    }
    public function keranjang()
    {
        $data['content'] = 'pelanggan/keranjang';
    }
    // store keranjang
    public function store_keranjang($id_paket)
    {

        $data['content'] = 'pelanggan/keranjang';
        $data['paket'] = $this->model->find_data('tb_paket_wisata', 'id_paket', $id_paket)->row();
        $this->load->view('layout/template', $data, false);
    }
    // store data diri
    public function update_data_diri(Type $var = null)
    {
        $this->form_validation->set_rules('nomor_kontak', 'Nomor Kontak', 'trim|required|min_length[8]|max_length[15]|numeric', [
            'required' => 'Nomor Kontak tidak boleh kosong',
            'min_length' => 'Nomor Kontak  minimal 10 angka',
            'max_length' => 'Nomor Kontak maksimal 15 angka',
            'numeric' => 'Nomor Kontak harus berupa angka',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'rquired' => 'Jenis Kelamin tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $response = [
                'status' => 'validation failed',
                'msg' => $this->form_validation->error_array(),
            ];
        } else {
            $upload = $this->upload_image('foto');
            if ($upload['status'] == 'failed') {
                $response = [
                    'status' => 'validation failed',
                    'msg' => [
                        'image' => $upload['error'],
                    ],
                ];
            } else {
                $post = $this->input->post();
                $check_data = $this->model->find_data('tb_profil', 'id_user', $this->id_user)->row();
                $update = [
                    'id_user' => $this->id_user,
                    'no_hp' => $post['nomor_kontak'],
                    'alamat' => $post['alamat'],
                    'jenis_kelamin' => $post['jenis_kelamin'],
                    'foto' => 'uploads/' . $upload['data']['file_name'],
                ];
                if ($check_data) {
                    $this->model->update_data('tb_profil', $update, 'id_user', $this->id_user);
                } else {
                    $this->model->create_data('tb_profil', $update);
                }
                $response = [
                    'status' => 'success',
                    'msg' => 'isi data berhasil',
                ];
            }
        }
        echo json_encode($response);

    }
    public function upload_image($file_name)
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {
            $response = ['status' => 'failed', 'error' => $this->upload->display_errors()];
        } else {
            $data = $this->upload->data();
            $response = ['status' => 'success', 'data' => $data];
        }
        return $response;

    }
    public function store_booking(Type $var = null)
    {
        $post = $this->input->post();
        $insert = [
            'id_paket' => $post['id_paket'],
            'id_user' => $this->id_user,
            'nomor_booking' => "ORDER-" . date('YmdHis'),
            'tanggal_booking' => $post['tanggal_booking'],
            'jumlah_peserta' => $post['total_order'],
            'status_booking' => 'Menunggu Pembayaran',
            'total_biaya' => $post['harga'] * $post['total_order'],
            'status_pembayaran' => 'Menunggu Pembayaran',
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
        ];
        if ($post['satuan'] !== 1) {
            $this->form_validation->set_rules('total_order', 'Total Order', 'trim|required|numeric', [
                'required' => 'Total Order tidak boleh kosong',
                'numeric' => 'Total Order harus berupa angka',
            ]);

            if ($this->form_validation->run() == false) {
                $response = [
                    'status' => 'validation failed',
                    'msg' => $this->form_validation->error_array(),
                ];
            } else {
                if ($post['total_order'] > 0) {
                    $this->model->insert('tb_data_booking', $insert);
                    $response = [
                        'status' => 'success',
                        'insert' => $insert,
                    ];
                } else {
                    $response = [
                        'status' => 'validation failed',
                        'msg' => [
                            'total_order' => 'Tidak boleh 0',
                        ],
                    ];
                }
            }

        }

        echo json_encode($response);
    }
    public function transaksi(Type $var = null)
    {
        $data['content'] = 'pelanggan/transaksi';
        $data['transaksi'] = $this->model->transaksi_user($this->id_user);
        $this->load->view('layout/template', $data, false);
    }
}

/* End of file  Pelanggan.php */
