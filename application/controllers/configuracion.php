<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_usuario');
        $this->load->model('m_configuracion');
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
	        $nav['view']    = 'Configuraci&oacute;n';
	         
	        $navegador = $this->load->view('v_navegador', $nav, true);
	        $data['navegador'] = $navegador; 
	        
	        $data['optRoles'] = $this->getAllRolesForSelect();
	        
	        $this->load->view('v_configuracion', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
	
	// TRAER TODOS LOS ROLES PARA LLENAR EL SELECT
	function getAllRolesForSelect(){
	    $opcion = null;
	    $combo  = $this->m_configuracion->getAllRoles();
	    foreach ($combo as $row){
	        $opcion  .= '<option value="'._simple_encrypt($row->idRol).'">'.$row->nombreRol.'</option>';
	    }
	    return $opcion;
	}
	
	//TRAER PERMISOS SEGUN EL ROL ELEGIDO
	function getPermisosByRol() {
	    $data['error'] = EXIT_ERROR;
	    $data['msj']   = null;
	    try {
	        $idRol = $this->encrypt->decode(_post('idRol'));
	        if($idRol == null) {
	            throw new Exception(ANP);
	            $data['tabPermisos'] = $this->buildTablePermisosByRolHTML(null);
	        }
	        $data['tabPermisos'] = $this->buildTablePermisosByRolHTML($idRol);
	        $data['error'] = EXIT_SUCCESS;
	    } catch (Exception $e) {
	        $data['msj'] = $e->getMessage();
	    }
	    echo json_encode(array_map('utf8_encode', $data));
	}
	
	//CREAR LA TABLA PERMISOS
	function buildTablePermisosByRolHTML($idRol) {
	    $permisos = ($idRol != null ) ? $this->m_configuracion->getPermisosByRol($idRol) : array();
	    $tmpl = array( 'table_open'  => '<table class="mdl-data-table mdl-js-data-table" id="tbPermisos" cellspacing="0">',
	        'table_close' => '</table>');
	    $this->table->set_template($tmpl);
	
	    $val = 0;
	    $label = null;
	     
	    $head_0  = array('data' => '#');
	    $head_1  = array('data' => 'Nombre');
	    $head_2  = array('data' => 'Opciones');
	
	    $this->table->set_heading($head_0, $head_1, $head_2);
	
	    foreach ($permisos as $row) {	
	        $row_col_0  = array('data' => $row->num);
	        $row_col_1  = array('data' => $row->idModulo);
	        $row_col_2  = array('data' => $row->nombreModulo);
	
	        $this->table->add_row($row_col_0, $row_col_1, $row_col_2);
	    }
	
	    $table = $this->table->generate();
	    return $table;
	}
}