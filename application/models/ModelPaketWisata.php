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
            'total_kunjungan' => 0,
            'lat' => 0,
            'long' => 0,
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

}

/* End of file ModelPaketWisata.php */
