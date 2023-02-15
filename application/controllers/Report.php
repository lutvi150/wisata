<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPaketWisata', 'paket_wisata');

    }

    public function paket_wisata()
    {
        $data['judul'] = 'LAPORAN DATA PAKET WISATA';
        $data['paket_wisata'] = $this->paket_wisata->get_semua_paket();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->SetTitle('Laporan Paket Wisata');
        $mpdf->SetAuthor('Laporan Paket Wisata');
        $mpdf->SetCreator('Laporan Paket Wisata');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetWatermarkText('DESA WISATA KUBU GADANG');
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->load->view('report/printDataPaketWisata', $data, true));
        $mpdf->Output('Laporan Paket Wisata.pdf', 'I');
        // echo json_encode($data['kartu']);
    }

}

/* End of file  Report.php */
