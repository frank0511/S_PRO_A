<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_usuario');
        $this->load->model('m_utils');
        $this->load->model('m_ventas');
    }
    
	public function index()
	{
	    $idUsuario     = $this->session->userdata('idUsuario');
	    
	    if($idUsuario != null){
	        $idRol         = $this->m_utils->getRolByUser($idUsuario);
	      
	        $permisos      = $this->m_utils->getPermisosByUsuario($idUsuario);
	        $perm          = $this->lib_utils->buildArbolPermisos($permisos);
	    
	        $usuario       = $this->m_usuario->getDatosUsuario($idUsuario);
	        $dataUser      = array("idUsuario"        => $idUsuario,
                    	            "nombre"          => $usuario['nombres']);
	        
	        $this->session->set_userdata($dataUser);
	    
	        if ( $idRol == ROL_ADMINISTRADOR) {
	            $ventas                = $this->m_ventas->getAllVentas();
	        } else {
	            $ventas                = $this->m_ventas->getAllVentasByUser($idUsuario);
	        }	        
	        $data['tableVentas']   = $this->crearTablaVentasHTML($ventas);
	        if ( $idRol == ROL_VENDEDOR ){
	            $data['caja']          = '<button class="mdl-button mdl-js-button"> Caja: '.number_format($this->m_ventas->getBoxDay(), 2, '.', ',').'</button>';
	        } else {
	            $data['caja']          = null;
	        }

	        $nav['modulos'] = $perm;
	        $nav['view']    = 'Ventas';
	         
	        $navegador = $this->load->view('navegador', $nav, true);
	        $data['navegador'] = $navegador;
	        
	        $this->load->view('ventas', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
	
	function crearTablaVentasHTML($ventas) {
	    $tmpl = array( 'table_open'  => '<table class="mdl-data-table mdl-js-data-table" id="tbVentas" cellspacing="0">',
	                   'table_close' => '</table>');
	    $this->table->set_template($tmpl);
	
	    $val = 0;
	
	    $head_0  = array('data' => '#');
	    $head_1  = array('data' => 'C&oacute;digo');
	    $head_2  = array('data' => 'Cliente');
	    $head_3  = array('data' => 'Total');
	    $head_4  = array('data' => 'Fecha registro');
	    $head_5  = array('data' => 'Opciones');
	
	    $this->table->set_heading($head_0, $head_1, $head_2, $head_3, $head_4, $head_5);
	
	    foreach ($ventas as $venta) {
	        $val++;
	        $opciones = '  <button class="mdl-button mdl-js-button mdl-button--icon">
	                           <i class="mdi mdi-remove_red_eye"></i>
                           </button>
	                       <button class="mdl-button mdl-js-button mdl-button--icon">
	                           <i class="mdi mdi-print"></i>
                           </button>';
	        
	        $row_col_0  = array('data' => $val);
	        $row_col_1  = array('data' => $venta->codigo);
	        $row_col_2  = array('data' => $venta->nombres);
	        $row_col_3  = array('data' => $venta->total);
	        $row_col_4  = array('data' => $venta->fechaRegistro);
	        $row_col_5  = array('data' => $opciones);
	
	        $this->table->add_row($row_col_0, $row_col_1, $row_col_2, $row_col_3, $row_col_4, $row_col_5);
	    }
	
	    $table = $this->table->generate();
	    return $table;
	}
}