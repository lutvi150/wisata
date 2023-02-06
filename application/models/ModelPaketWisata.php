<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelPaketWisata extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_paket_wisata';
        $this->nama_paket = 'nama_paket';
        $this->id_paket = 'id_paket';
        $this->status = 'status';
    }
    public function check_paket_wisata(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->where($this->nama_paket, '-');
        return $this->db->get()->row();
    }
    public function insert_dummy_paket(Type $var = null)
    {
        $object = [
            'nama_paket' => '-',
            'harga_paket' => 0,
            'satuan' => '-',
            'keterangan' => '-',
            'total_kunjungan' => 0,
            'lat' => 0,
            'long' => 0,
            'status' => 0,
        ];
        $this->db->insert($this->table, $object);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function update_paket()
    {
        $post = $this->input->post();
        $object = [
            'nama_paket' => $post['nama_paket'],
            'harga_paket' => $post['harga'],
            'satuan' => $post['satuan'],
            'keterangan' => $post['keterangan'],
            'lat' => $post['lat'],
            'long' => $post['long'],
        ];
        $this->db->where($this->id_paket, $post['id_paket'])->update($this->table, $object);
    }
    // use for get all packages vacation
    public function get_semua_paket(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->where($this->nama_paket . " !=", '-');
        return $this->db->get()->result();
    }
    // use for get spesial paket
    public function get_semua_spesial_paket(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->where($this->status, 1);
        $this->db->where($this->nama_paket . " !=", '-');
        return $this->db->get()->result();
    }
    // use for get all packager with image
    public function get_semua_paket_image($status)
    {
        if ($status == 'biasa') {
            $paket = $this->get_semua_paket();
        } else {
            $paket = $this->get_semua_spesial_paket();
        }
        $result_paket = null;
        if ($paket) {
            foreach ($paket as $key => $value) {
                $result_paket[] = (object) [
                    'nama_paket' => $value->nama_paket,
                    'harga_paket' => $value->harga_paket,
                    'satuan' => $value->satuan,
                    'keterangan' => $value->keterangan,
                    'id_paket' => $value->id_paket,
                    'foto' => $this->get_foto_paket($value->id_paket),
                ];
            }

        }
        return $result_paket;
    }
    public function get_foto_paket($id_paket)
    {
        $this->db->from('tb_foto');
        $this->db->where('id_paket', $id_paket);
        $this->db->order_by('foto_unggulan', 'desc');
        return $this->db->get()->result();
    }

}

/* End of file ModelPaketWisata.php */
