<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

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
	    if($idUsuario != null){
	        $idRol         = $this->m_utils->getRolByUser($idUsuario);
	      
	        $permisos      = $this->m_utils->getPermisosByUsuario($idUsuario);
	        $perm          = $this->lib_utils->buildArbolPermisos($permisos);
	    
	        $usuario       = $this->m_usuario->getDatosUsuario($idUsuario);
	        $dataUser      = array("idUsuario"        => $idUsuario,
                    	            "nombre"          => $usuario['nombres']);
	        
	        $this->session->set_userdata($dataUser);
	    
	        $nav['modulos'] = $perm;
	        $nav['view'] = 'Inventario';        
	        
	        $navegador = $this->load->view('v_navegador', $nav, true);	
	        $data['navegador'] = $navegador;	    

	        $productos                 = $this->m_movimiento->getInventario();
	        $data['tableInventario']   = $this->crearTablaInventarioHTML($productos);
	        
	        $this->load->view('v_inventario', $data);
	    } else{
	        redirect('','refresh');
	    }
	}
	
	function crearTablaInventarioHTML($productos) {
	    $tmpl = array( 'table_open'  => '<table class="mdl-data-table mdl-js-data-table" id="tbInventario" cellspacing="0">',
	        'table_close' => '</table>');
	    $this->table->set_template($tmpl);
	
	    $val = 0;
	    $label = null;
	    
	    $head_0  = array('data' => '#');
	    $head_1  = array('data' => 'Producto');
	    $head_2  = array('data' => 'Stock');
	    $head_3  = array('data' => '&Uacute;ltimo ingreso');
	    $head_4  = array('data' => '&Uacute;ltima salida');
	    $head_5  = array('data' => 'Opciones');
	
	    $this->table->set_heading($head_0, $head_1, $head_2, $head_3, $head_4, $head_5);
	
	    foreach ($productos as $producto) {
	        $val++;
	        $idProductoCrypt = $this->encrypt->encode($producto->idProducto);
	        $opciones = '  <button class="mdl-button mdl-js-button mdl-button--icon" onclick="redirectProductoDetalle(\'' . $idProductoCrypt . '\');">
	                           <i class="mdi mdi-show_chart"></i>
                           </button>
	                       <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="modal" data-target="#editProducto">
	                           <i class="mdi mdi-info"></i>
                           </button>
	                       <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="modal" data-target="#editProducto">
	                           <i class="mdi mdi-edit"></i>
                           </button>';
	        
	        if ( $producto->stock < 30 ) {
	            $label = 'label-danger';
	        } else if ( $producto->stock > 29 && $producto->stock < 100) {
	            $label = 'label-warning';
	        } else {
	            $label = 'label-default';
	        }
	         
	        $row_col_0  = array('data' => $val);
	        $row_col_1  = array('data' => $producto->name);
	        $row_col_2  = array('data' => '<span class="label '.$label.'">'.$producto->stock.'</span>');
	        $row_col_3  = array('data' => $producto->fecIngreso);
	        $row_col_4  = array('data' => $producto->fecSalida);
	        $row_col_5  = array('data' => $opciones);
	
	        $this->table->add_row($row_col_0, $row_col_1, $row_col_2, $row_col_3, $row_col_4, $row_col_5);
	    }
	
	    $table = $this->table->generate();
	    return $table;
	}
	
	function redirectProductoDetalle()
	{
	    $data['error'] = EXIT_ERROR;
	    $data['msj'] = null;
	    try {
	        $idProducto = $this->encrypt->decode($this->input->post('id'));
	        if ($idProducto == null) {
	            throw new Exception(ANP);
	        }
	        $this->session->set_userdata(array(
	            'idProductoDetalle' => $idProducto
	        ));
	        $data['url'] = base_url() . 'inventario_detalle';
	    } catch (Exception $e) {
	        $data['msj'] = $e->getMessage();
	    }
	    echo json_encode(array_map('utf8_encode', $data));
	}
}