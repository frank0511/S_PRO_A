<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_usuario');
    }
    
	public function index()
	{
	    $idUsuario     = $this->session->userdata('idUsuario');
	    if($idUsuario == null){
	        $this->load->view('v_login');
	    } else{
	        redirect('index','refresh');
	    }
	}
	
	public function logear()
	{
	    $usuario = $this->input->post("user");
	    $clave   = $this->input->post("pass");
	
	    $res = $this->m_usuario->validarUsuario($usuario, $clave);
	    $tof = 0;
	    if ($res != null) {
	        $tof = 1;
	        $arraySess = array(
	            "nombreUsuario" => $res['nombreUsuario'],
	            "idUsuario"     => $res['idUsuario']
	        );
	        $this->session->set_userdata($arraySess);
	    }
	    $data['validar'] = $tof;
	    echo json_encode(array_map('utf8_encode', $data));
	}
}
