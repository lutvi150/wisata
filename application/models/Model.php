<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    public function insert($table, $columns)
    {
        $this->db->insert($table, $columns);
        return $this->db->insert_id();

    }

}

/* End of file Model.php */
