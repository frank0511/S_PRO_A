<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

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
	        $nav['view'] = 'Reportes';
	        $nav['tabs'] = '  <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                                  <a href="#tab-1" class="mdl-layout__tab is-active">Inventario</a>
                                  <a href="#ab-2" class="mdl-layout__tab">Ventas</a>
                                  <a href="#tab-3" class="mdl-layout__tab">Compras</a>
                                  <a href="#tab-4" class="mdl-layout__tab">Cotizaciones</a>
                                </div>';
	         
	        $navegador = $this->load->view('v_navegador', $nav, true);
	        $data['navegador'] = $navegador;	    
	        
	        $this->load->view('v_index', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
}