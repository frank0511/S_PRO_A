<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_utils');  
    }

	function logOut()
	{
	    $logedUser = $this->session->userdata('usuario');
	    $this->session->sess_destroy();
	    redirect('', 'refresh');
	}
}
