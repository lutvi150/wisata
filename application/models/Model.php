<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    public function insert($table, $columns)
    {
        $this->db->insert($table, $columns);
        return $this->db->insert_id();

    }
    // perintah untuk membuat nomor otomatis
    public function nomor_otomatis()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $a = $this->db->query("SELECT MAX(RIGHT(nomor_transaksi,4)) AS no_max FROM tb_transaksi WHERE tgl_transaksi='$tanggal'");
        $no = "";
        if ($a->num_rows() > 0) {
            foreach ($a->result() as $n) {
                $tmp = ((int) $n->no_max) + 1;
                $no = sprintf("%04s", $tmp);
            }
        } else {
            $no = "0001";
        }
        return date('dmY') . $no;
    }
    public function nomor_bukti_bayar_otomatis()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $a = $this->db->query("SELECT MAX(RIGHT(id_bukti_bayar,4)) AS no_max FROM tb_bukti_bayar WHERE tgl_upload='$tanggal'");
        $no = "";
        if ($a->num_rows() > 0) {
            foreach ($a->result() as $n) {
                $tmp = ((int) $n->no_max) + 1;
                $no = sprintf("%04s", $tmp);
            }
        } else {
            $no = "0001";
        }
        return 'BB' . date('dmY') . $no;
    }
    // mengambil data
    public function get_data($tabel, $order_reference, $order)
    {
        $this->db->order_by($order_reference, $order);
        return $this->db->get($tabel);
    }
    // get data with limit
    public function get_data_limit($table, $limit, $order_reference, $order)
    {
        $this->db->order_by($order_reference, $order);
        return $this->db->get($table, $limit);
    }
    // untuk update data di database
    public function update_data($table, $id_reference, $referensi, $object)
    {
        $this->db->where($id_reference, $referensi);
        $this->db->update($table, $object);
    }
    // perintah simpan data
    public function create_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    // perintah mencari data
    public function find_data($tabel, $id_tabel, $id)
    {
        $this->db->where($id_tabel, $id);
        return $this->db->get($tabel);
    }
    public function hitung_database($tabel)
    {
        return $this->db->get($tabel);
    }
// costume query
    public function transaksi_user($id_user)
    {
        $this->db->from('tb_data_booking as a');
        $this->db->join('tb_paket_wisata as b', 'a.id_paket = b.id_paket');
        $this->db->where('a.id_user', $id_user);
        return $this->db->get()->result();
    }
    public function transaksi_invoice($id_booking)
    {
        $this->db->from('tb_data_booking as a');
        $this->db->where('a.id_booking', $id_booking);
        $this->db->join('tb_user as b', 'a.id_user = b.id_user');
        $this->db->join('tb_profil as c', 'b.id_user = c.id_user');
        $this->db->join('tb_paket_wisata as d', 'a.id_paket = d.id_paket');
        return $this->db->get()->row();
    }
    public function transaksi(Type $var = null)
    {
        $this->db->from('tb_data_booking as a');
        $this->db->join('tb_user as b', 'a.id_user = b.id_user');
        $this->db->join('tb_profil as c', 'b.id_user = c.id_user');
        $this->db->join('tb_paket_wisata as d', 'a.id_paket = d.id_paket');
        return $this->db->get()->result();
    }
}

/* End of file Model.php */
