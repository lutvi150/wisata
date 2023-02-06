<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelFoto', 'foto');

    }
// get foto package vacations
    public function get_foto_paket()
    {
        $id_paket = $this->input->post('id_paket');
        $getFoto = $this->foto->get_foto_paket($id_paket);
        echo json_encode($getFoto);
    }
    public function index()
    {

    }

}

/* End of file  ApiProduk.php */
