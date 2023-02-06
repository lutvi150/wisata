<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPaketWisata', 'paket_wisata');
    }

    public function index()
    {
        $data['paket_wisata'] = $this->paket_wisata->get_semua_paket_image('biasa');
        $data['paket_wisata_spesial'] = $this->paket_wisata->get_semua_paket_image('spesial');

        $this->load->view('front/front', $data, false);

    }

}

/* End of file  Front.php */
