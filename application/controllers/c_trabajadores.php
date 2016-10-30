<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Trabajadores extends CI_Controller {

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
	        $nav['view'] = 'Trabajadores';
	        
	        $navegador         		 = $this->load->view('v_navegador', $nav, true);
	        $data['navegador'] 		 = $navegador;
	        $data['optRoles']  		 = $this->buildOptRoles();  
	        $data['optSexo']   	  	 = $this->buildOptSexo();  
	        $data['optEstado']       = $this->buildOptEstado();  
	        $data['optDepartamento'] = $this->buildOptDepartamento(); 
	        
	        $this->load->view('v_trabajadores', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
	function buildOptRoles($idRol = null){
        $listaRoles = $this->m_utils->getAllRoles();
        $opt = null;
        foreach ($listaRoles as $rol) {
            $idRolCrypt = _encodeCI($rol->idRol);
            $selected = ($rol->idRol == $idRol) ? 'selected' : null;
            $opt .= '<option value="' . $idRolCrypt . '" ' . $selected . '>' . $rol->nombreRol . '</option>';
        }
        return $opt;
    }
    
    function buildOptSexo($idSexo  = null){
            $opt = null;            
            $idSexoCrypt = _encodeCI(1);
            $selected = (1 == $idSexo) ? 'selected' : null;
            $opt .= '<option value="' . $idSexoCrypt . '" ' . $selected . '>Masculino </option>';
            $idSexoCrypt = _encodeCI(2);
            $selected = (2 == $idSexo) ? 'selected' : null;
            $opt .= '<option value="' . $idSexoCrypt . '" ' . $selected . '>Femenino</option>';
        return $opt;
    }

    function buildOptEstado($Estado  = null){
            $opt = null;            
            $EstadoCrypt = _encodeCI('s');
            $selected = ('s' == $Estado) ? 'selected' : null;
            $opt .= '<option value="' . $EstadoCrypt . '" ' . $selected . '>Soltero</option>';
            $EstadoCrypt = _encodeCI('c');
            $selected = ('c' == $Estado) ? 'selected' : null;
            $opt .= '<option value="' . $EstadoCrypt . '" ' . $selected . '>Casado</option>';
        return $opt;
    }

    function buildOptDepartamento($idDepartamento  = null){
        $listaDepartamento = $this->m_utils->getAllDepartamentos();
        $opt = null;
        foreach ($listaDepartamento as $departamento) {
            $idDepartamentoCrypt = _encodeCI($departamento->flag_Departamento);
            $selected = ($departamento->flag_Departamento == $idDepartamento) ? 'selected' : null;
            $opt .= '<option value="' . $idDepartamentoCrypt . '" ' . $selected . '>' . $departamento->departamento . '</option>';
        }
        return $opt;
    }
    function buildOptProvincia(){
    	try {
	    	$idDepartamento = _decodeCI(_post('flag_Dep'));
    		if ($idDepartamento == null) {
                throw new Exception('Seleccione un Departamento');
            }
	        $listaProvincia = $this->m_utils->getAllProvincias($idDepartamento);
	        $opt = null;
	        foreach ($listaProvincia as $provincia) {
	            $idProvinciaCrypt = _encodeCI($provincia->flag_Provincia);
	            $opt .= '<option value="' . $idProvinciaCrypt . '">' . $provincia->provincia . '</option>';
	        }
         	$data['optProvincias'] = $opt;
        }catch (Exception $e) {}
        echo json_encode(array_map('utf8_encode', $data));
    }

    function buildOptDistrito(){
        
    }
    
	function accionTrabajador(){
		$accion 	  = _post('accionGlobal');
		$nombre 	  = _post('nombre');
		$ape_pate 	  = _post('ape_pate');
		$ape_mate 	  = _post('ape_mate');
		$num_doc 	  = _post('num_doc');
		$sexo    	  = _post('sexo');
		$estado 	  = _post('estado');
		$fec_nac	  = _post('fec_nac');
		$direccion    = _post('direccion');
		$departamento = _post('departamento');
		$provincia    = _post('provincia');
		$distrito 	  = _post('distrito');
		$telefono 	  = _post('telefono');
		$celular 	  = _post('celular');
		$correo 	  = _post('correo');
		$cargo 	      = _post('cargo');
		$observacion  = _post('observacion');

	}
}