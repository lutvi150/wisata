<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Front extends CI_Controller {

public function index()
{
	$data=null;
	$this->load->view('front/front', $data, FALSE);
	
}
        
}
        
    /* End of file  Front.php */
        
                            