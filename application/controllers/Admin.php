<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser', 'user');
        $this->load->model('ModelPaketWisata', 'paket_wisata');
        $this->load->model('ModelFoto', 'foto');
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses tidak di izinkan');
            redirect('controller/login');
        }
    }

    public function index()
    {
        $data['content'] = 'admin/dashboard';
        $data['total_pengunjung'] = 0;
        $data['total_paket_wisata'] = 0;
        $data['total_transaksi'] = 0;
        $this->load->view('layout/template', $data, false);

    }
    // get data chart
    public function get_chart(Type $var = null)
    {
        $year = date('Y');
        $month = [
            [
                'month' => 'Jan',
                'number' => '01',
            ], [
                'month' => 'Feb',
                'number' => '02',
            ], [
                'month' => 'Mar',
                'number' => '03',
            ], [
                'month' => 'Apr',
                'number' => '04',
            ], [
                'month' => 'May',
                'number' => '05',
            ], [
                'month' => 'Jun',
                'number' => '06',
            ], [
                'month' => 'Jul',
                'number' => '07',
            ], [
                'month' => 'Aug',
                'number' => '08',
            ], [
                'month' => 'Sep',
                'number' => '09',
            ], [
                'month' => 'Oct',
                'number' => '10',
            ], [
                'month' => 'Nov',
                'number' => '11',
            ], [
                'month' => 'Dec',
                'number' => '12',
            ],
        ];
        foreach ($month as $key => $value) {
            $month_name[] = $value['month'];
            $month_data[] = $key;
        }
        $response = [
            'status' => 'success',
            'year' => $year,
            'month_name' => $month_name,
            'month_data' => $month_data,
        ];
        echo json_encode($response);
    }
    // use for get data user
    public function user(Type $var = null)
    {
        $data['content'] = 'admin/user';
        $data['user'] = null;
        $this->load->view('layout/template', $data, false);

    }
    // use for get vacation package
    public function paket_wisata(Type $var = null)
    {
        $data['content'] = 'admin/paket_wisata';
        $data['paket_wisata'] = $this->paket_wisata->get_semua_paket();
        $this->load->view('layout/template', $data, false);
    }
    // add vacation package
    public function add_paket_wisata(Type $var = null)
    {
        $data['content'] = 'admin/add_paket_wisata';
        $check_paket_wisata = $this->paket_wisata->check_paket_wisata();
        if ($check_paket_wisata) {
            $data['id_paket'] = $check_paket_wisata->id_paket;
        } else {
            $data['id_paket'] = $this->paket_wisata->insert_dummy_paket();
        }
        $this->load->view('layout/template', $data, false);
    }
    // store paket wisata
    public function update_paket_wisata($status)
    {
        $validation_config = [
            [
                'field' => 'nama_paket',
                'label' => 'Nama Paket',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nama Paket tidak boleh kosong',
                ],
            ], [
                'field' => 'harga',
                'label' => 'Harga Paket',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Harga Paket tidak boleh kosong',
                    'numeric' => 'Format harus berupa angka',
                ],
            ], [
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Satuan tidak boleh kosong',
                ],
            ], [
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ],
            ], [
                'field' => 'lat',
                'label' => 'Lat',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Lat tidak boleh kosong',
                ],
            ], [
                'field' => 'long',
                'label' => 'Long',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Long tidak boleh kosong',
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
            $this->paket_wisata->update_paket();
            if ($status == 'store') {
                $msg = 'Paket berhasil di tambahkan';
            } else {
                $msg = 'Paket berhasil di update';
            }
            $response = [
                'status' => 'success',
                'msg' => $msg,
            ];
        }
        echo json_encode($response);
    }
    // upload photo package
    public function upload_foto_paket(Type $var = null)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $response = ['status' => 'failed', 'error' => $this->upload->display_errors()];
        } else {
            $data = $this->upload->data();
            $id_paket = $this->input->post('id_paket');
            $this->foto->store_foto_paket($id_paket, $data);
            $response = ['status' => 'success'];
        }
        echo json_encode($response);
    }
    // remove foto produk
    public function remove_foto_paket(Type $var = null)
    {
        $id_foto = $this->input->post('id_foto');
        $this->foto->remove_foto($id_foto);
        $response = [
            'status' => 'success',
        ];
        echo json_encode($response);
    }
    // make the foto featured
    public function jadikan_foto_unggulan(Type $var = null)
    {
        $id_paket = $this->input->post('id_paket');
        $id_foto = $this->input->post('id_foto');
        $this->foto->create_feature_photo($id_foto, $id_paket);
        echo json_encode(['status' => 'success']);
    }
    // use for get trasaction data
    public function transaksi(Type $var = null)
    {
        $data['content'] = 'admin/transaksi';
        $data['transaksi'] = null;
        $this->load->view('layout/template', $data, false);
    }

}

/* End of file  Admin.php */
