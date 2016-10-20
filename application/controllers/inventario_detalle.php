<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_detalle extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('lib_utils');
        $this->load->model('m_usuario');
        $this->load->model('m_utils');
        $this->load->model('m_movimiento');
    }
    
	public function index()
	{
	    $idUsuario     = $this->session->userdata('idUsuario');
        $idProducto    = $this->session->userdata('idProductoDetalle');
        
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
	        $nav['view'] = 'Detalles del Producto';
	    
	        $navegador = $this->load->view('navegador', $nav, true);	
	        $data['navegador'] = $navegador;	    

	        $entradas              = $this->m_movimiento->getEntradasByProducto($idProducto);
	        $data['tableEntradas'] = $this->crearTablaEntradasHTML($entradas);
	         
	        $salidas               = $this->m_movimiento->getSalidasByProducto($idProducto);
	        $data['tableSalidas']  = $this->crearTablaSalidasHTML($salidas);
	        
	        $this->load->view('inventario_detalle', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
	
	function crearTablaEntradasHTML($entradas) {
	    $tmpl = array( 'table_open'  => '<table class="mdl-data-table mdl-js-data-table" id="tbEntradas" cellspacing="0">',
	        'table_close' => '</table>');
	    $this->table->set_template($tmpl);

	    $head_0  = array('data' => 'Trabajador');
	    $head_1  = array('data' => 'Sucursal');
	    $head_2  = array('data' => 'Ingres&oacute;');
	    $head_3  = array('data' => 'Fecha ingreso');
	
	    $this->table->set_heading($head_0, $head_1, $head_2, $head_3);
	
	    foreach ($entradas as $entrada) {
	        $row_col_0  = array('data' => $entrada->nombre);
	        $row_col_1  = array('data' => $entrada->nombreSucursal);
	        $row_col_2  = array('data' => $entrada->cantidadIngreso);
	        $row_col_3  = array('data' => $entrada->fecIngreso);
	
	        $this->table->add_row($row_col_0, $row_col_1, $row_col_2, $row_col_3);
	    }
	
	    $table = $this->table->generate();
	    return $table;
	}
	
	function crearTablaSalidasHTML($salidas) {
	    $tmpl = array( 'table_open'  => '<table class="mdl-data-table mdl-js-data-table" id="tbEntradas" cellspacing="0">',
	        'table_close' => '</table>');
	    $this->table->set_template($tmpl);

	    $head_0  = array('data' => 'Trabajador');
	    $head_1  = array('data' => 'Sucursal');
	    $head_2  = array('data' => 'Salida');
	    $head_3  = array('data' => 'Fecha salida');

	    $this->table->set_heading($head_0, $head_1, $head_2, $head_3);
	
	    foreach ($salidas as $salida) {
	        $row_col_0  = array('data' => $salida->nombre);
	        $row_col_1  = array('data' => $salida->nombreSucursal);
	        $row_col_2  = array('data' => $salida->cantidadSalida);
	        $row_col_3  = array('data' => $salida->fecSalida);

	        $this->table->add_row($row_col_0, $row_col_1, $row_col_2, $row_col_3);
	    }
	
	    $table = $this->table->generate();
	    return $table;
	}
}