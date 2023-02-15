<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_user';
        $this->username = 'username';
        $this->password = 'password';
    }

    public function check_account($username, $password)
    {
        $this->db->from($this->table);
        $this->db->where($this->username, $username);
        $this->db->where($this->password, hash('sha256', $password));
        return $this->db->get()->row();
    }
    public function get_all_user(Type $var = null)
    {
        $this->db->from($this->table . " as a");
        $this->db->join('tb_profil as b', 'a.id_user=b.id_user');
        return $this->db->get()->result();

    }
}

/* End of file ModelUser.php */
