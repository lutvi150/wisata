<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Controller extends CI_Controller {

public function index()
{
                
}
public function login(Type $var = null)
{
	$data=null;;
	$this->load->view('auth/login', $data, FALSE);
}
public function register(Type $var = null)
{
	$data=null;
	$this->load->view('auth/register', $data, FALSE);
	
}
        
}
        
    /* End of file  Controller.php */
        
                            