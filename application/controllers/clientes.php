<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_usuario');
        $this->load->model('m_utils');
        $this->load->model('m_clientes');
        $this->load->helper('Utils');
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
	        $nav['view']    = 'Clientes';     
	        
	        $navegador = $this->load->view('v_navegador', $nav, true);	
	        $data['navegador'] = $navegador;	  
	        $data['optDocumento'] = $this->comboTipoDoc();
	        $this->load->view('v_clientes', $data);
	    } else{
	        redirect('','refresh');
	    }
	}

	function comboTipoDoc($valueSelect = null){
	    $opcion = '';
	    $combo  = $this->m_utils->getTipoDocumento();
	    foreach ($combo as $row){
	        $selected = null;
	        if($valueSelect == $row->idTipoDocumento){
	            $selected = 'selected';
	        }
	        $opcion  .= '<option '.$selected.' value="'._simple_encrypt($row->idTipoDocumento).'">'.$row->descripcion.'</option>';
	    }
	    return $opcion;
	}

}