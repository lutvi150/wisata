<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelFoto extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_foto';
        $this->id_paket = 'id_paket';
        $this->foto = 'foto';
        $this->foto_unggulan = 'foto_unggulan';
        $this->id_foto = 'id_foto';
    }

    public function get_foto_paket($id_paket)
    {
        $this->db->from($this->table);
        $this->db->where($this->id_paket, $id_paket);
        return $this->db->get()->result();
    }
    public function store_foto_paket($id_paket, $foto)
    {
        $this->db->where($this->id_paket, $id_paket)->update($this->table, [$this->foto_unggulan => 0]);
        $insert = [
            $this->id_paket => $id_paket,
            $this->foto => 'uploads/' . $foto['file_name'],
            $this->foto_unggulan => 1,
        ];
        $this->db->insert($this->table, $insert);
    }
// use for remove image
    public function remove_foto($id_foto)
    {
        $get_foto = $this->get_image_row($id_foto);
        if (file_exists(base_url() . $get_foto->foto)) {
            unlink(base_url() . $get_foto->foto);
        }
        $this->db->where($this->id_foto, $id_foto)->delete($this->table);
    }
// use for get row image
    public function get_image_row($id_foto)
    {
        $this->db->from($this->table);
        $this->db->where($this->id_foto, $id_foto);
        return $this->db->get()->row();
    }
    // make become feature photos
    public function create_feature_photo($id_foto, $id_paket)
    {
        $this->db->where($this->id_paket, $id_paket)->update($this->table, [$this->foto_unggulan => 0]);
        $this->db->where($this->id_foto, $id_foto)->update($this->table, [$this->foto_unggulan => 1]);
    }
}

/* End of file ModelFoto.php */
