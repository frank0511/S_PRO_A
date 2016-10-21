<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_usuario');
        $this->load->model('m_utils');
    }
    
	public function index()
	{
	    $idUsuario     = $this->session->userdata('idUsuario');
	    if($idUsuario != null){
	        $nombreUsuario = $this->session->userdata('nombreUsuario');
	    
	        $permisos      = $this->m_utils->getPermisosByUsuario($idUsuario);
	        $perm          = $this->lib_utils->buildArbolPermisos($permisos);
	    
	        $usuario       = $this->m_usuario->getDatosUsuario($idUsuario);
	        $dataUser      = array("idUsuario"        => $idUsuario,
	            "nick"            => $usuario['nombreUsuario'],
	            "nombre"          => $usuario['nombres']);
	        $this->session->set_userdata($dataUser);
	        
	        $nav['modulos'] = $perm;
	        $nav['view']    = 'Bienvenido';
	         
	        $navegador = $this->load->view('v_navegador', $nav, true);
	        $data['navegador'] = $navegador; 
	        
	        $this->load->view('v_index', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
}
