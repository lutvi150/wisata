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
        $data['paket'] = $this->model->find_data('tb_paket', 'id_paket', $id_paket)->row();
        $this->load->view('layout/template', $data, false);
    }

}

/* End of file  Pelanggan.php */
