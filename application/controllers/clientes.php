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
	        
	        $navegador = $this->load->view('navegador', $nav, true);	
	        $data['navegador'] = $navegador;	  
	        $data['optDocumento'] = $this->comboTipoDoc();
	        $this->load->view('clientes', $data);
	    } else{
	        redirect('','refresh');
	    }
	}

	function comboTipoDoc($valueSelect = null){
	    $opcion = '';
	    $combo  = $this->m_clientes->getComboTipoDocumento();
	    foreach ($combo as $row){
	        $selected = null;
	        if($valueSelect == $row->idTipoDocumento){
	            $selected = 'selected';
	        }
	        $opcion  .= '<option '.$selected.' value="'._simple_encrypt($row->idTipoDocumento).'">'.$row->descripcion.'</option>';
	    }
	    return $opcion;
	}
	function cargarFormulario(){
	    $accion    = $this->input->post('accion');
	    $tipoDocumento    = _simple_decrypt($this->input->post('tipoDocumento'));
	    if(empty($tipoDocumento)){
	        throw new Exception('Seleccione Tipo de Documento');
	    }
	    if($accion == 1){//REGISTRAR
	        if($tipoDocumento != 6){//CLIENTE NATURAL
	            $data['numDoc'] ='<div class="col-sm-6 mdl-group__icon" id="inputNumDoc">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                       <input class="mdl-textfield__input" maxlength="8" type="text" id="numDoc">
                                       <label class="mdl-textfield__label" for="numDoc">Nro. Documento</label>
            			           </div>
					           </div>';
	            $data['nombre'] ='<div class="col-sm-6 mdl-group__icon" id="inputNombre">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="nombre">
                                            <label class="mdl-textfield__label" for="nombre">Nombre</label>
                                        </div>
					              </div>';
	            $data['ape_pate'] ='<div class="col-sm-6 mdl-group__icon" id="inputPate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_pate">
                                            <label class="mdl-textfield__label" for="ape_pate">Apellido Paterno</label>
                                        </div>
					                </div>';
	            $data['ape_mate'] ='<div class="col-sm-6 mdl-group__icon" id="inputMate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_mate">
                                            <label class="mdl-textfield__label" for="ape_mate">Apellido Materno</label>
                                        </div>
					                </div>';
	            $data['telefono'] ='<div class="col-sm-6 mdl-group__icon" id="inputTelefono">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="9" type="text" id="telefono">
                                            <label class="mdl-textfield__label" for="telefono">Tel&eacute;fono</label>
                                        </div>
					                </div>';
	            $data['celular'] ='<div class="col-sm-6 mdl-group__icon" id="inputCelular">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="11" type="text" id="celular">
                                            <label class="mdl-textfield__label" for="celular">Celular</label>
                                        </div>
					                </div>';
	            $data['departamento'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDepartamento">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDep">
                    			                <option value="">Seleccione Departamento</option>
                    			           </select>
        					           </div>';
	            $data['provincia'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboProvincia">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboProv">
                    			                <option value="">Seleccione Provincia</option>
                    			           </select>
        					           </div>';
	            $data['distrito'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDistrito">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDist">
                    			                <option value="">Seleccione Distrito</option>
                    			           </select>
        					           </div>';
	            $data['fecNacimiento'] = '<div class="input-group date" data-provide="datepicker" id="fechaNacimiento">
                                            <input type="text" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                         </div>';
	        }else{//CLIENTE JURIDICO
	            $data['numDoc'] ='<div class="col-sm-6 mdl-group__icon" id="inputNumDoc">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                       <input class="mdl-textfield__input" maxlength="8" type="text" id="numDoc">
                                       <label class="mdl-textfield__label" for="numDoc">Nro. Documento</label>
            			           </div>
					           </div>';
	            $data['nombre'] ='<div class="col-sm-6 mdl-group__icon" id="inputNombre">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="nombre">
                                            <label class="mdl-textfield__label" for="nombre">Nombre</label>
                                        </div>
					              </div>';
	            $data['ape_pate'] ='<div class="col-sm-6 mdl-group__icon" id="inputPate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_pate">
                                            <label class="mdl-textfield__label" for="ape_pate">Apellido Paterno</label>
                                        </div>
					                </div>';
	            $data['ape_mate'] ='<div class="col-sm-6 mdl-group__icon" id="inputMate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_mate">
                                            <label class="mdl-textfield__label" for="ape_mate">Apellido Materno</label>
                                        </div>
					                </div>';
	            $data['telefono'] ='<div class="col-sm-6 mdl-group__icon" id="inputTelefono">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="9" type="text" id="telefono">
                                            <label class="mdl-textfield__label" for="telefono">Tel&eacute;fono</label>
                                        </div>
					                </div>';
	            $data['celular'] ='<div class="col-sm-6 mdl-group__icon" id="inputCelular">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="11" type="text" id="celular">
                                            <label class="mdl-textfield__label" for="celular">Celular</label>
                                        </div>
					                </div>';
	            $data['departamento'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDepartamento">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDep">
                    			                <option value="">Seleccione Departamento</option>
                    			           </select>
        					           </div>';
	            $data['provincia'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboProvincia">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboProv">
                    			                <option value="">Seleccione Provincia</option>
                    			           </select>
        					           </div>';
	            $data['distrito'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDistrito">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDist">
                    			                <option value="">Seleccione Distrito</option>
                    			           </select>
        					           </div>';
	            $data['nomCliente'] = '<div class="input-group date" data-provide="datepicker" id="fechaNacimiento">
                                            <input type="text" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>';
	        }
	    }else if($accion == 2){//ACTUALIZAR
	            $data['numDoc'] ='<div class="col-sm-6 mdl-group__icon" id="inputNumDoc">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                       <input class="mdl-textfield__input" maxlength="8" type="text" id="numDoc">
                                       <label class="mdl-textfield__label" for="numDoc">Nro. Documento</label>
            			           </div>
					           </div>';
	            $data['nombre'] ='<div class="col-sm-6 mdl-group__icon" id="inputNombre">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="nombre">
                                            <label class="mdl-textfield__label" for="nombre">Nombre</label>
                                        </div>
					              </div>';
	            $data['ape_pate'] ='<div class="col-sm-6 mdl-group__icon" id="inputPate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_pate">
                                            <label class="mdl-textfield__label" for="ape_pate">Apellido Paterno</label>
                                        </div>
					                </div>';
	            $data['ape_mate'] ='<div class="col-sm-6 mdl-group__icon" id="inputMate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_mate">
                                            <label class="mdl-textfield__label" for="ape_mate">Apellido Materno</label>
                                        </div>
					                </div>';
	            $data['telefono'] ='<div class="col-sm-6 mdl-group__icon" id="inputTelefono">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="9" type="text" id="telefono">
                                            <label class="mdl-textfield__label" for="telefono">Tel&eacute;fono</label>
                                        </div>
					                </div>';
	            $data['celular'] ='<div class="col-sm-6 mdl-group__icon" id="inputCelular">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="11" type="text" id="celular">
                                            <label class="mdl-textfield__label" for="celular">Celular</label>
                                        </div>
					                </div>';
	            $data['departamento'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDepartamento">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDep">
                    			                <option value="">Seleccione Departamento</option>
                    			           </select>
        					           </div>';
	            $data['provincia'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboProvincia">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboProv">
                    			                <option value="">Seleccione Provincia</option>
                    			           </select>
        					           </div>';
	            $data['distrito'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDistrito">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDist">
                    			                <option value="">Seleccione Distrito</option>
                    			           </select>
        					           </div>';
	            $data['nomCliente'] = '<div class="input-group date" data-provide="datepicker" id="fechaNacimiento">
                                            <input type="text" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>';
	    }else{//VER
	            $data['numDoc'] ='<div class="col-sm-6 mdl-group__icon" id="inputNumDoc">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                       <input class="mdl-textfield__input" maxlength="8" type="text" id="numDoc">
                                       <label class="mdl-textfield__label" for="numDoc">Nro. Documento</label>
            			           </div>
					           </div>';
	            $data['nombre'] ='<div class="col-sm-6 mdl-group__icon" id="inputNombre">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="nombre">
                                            <label class="mdl-textfield__label" for="nombre">Nombre</label>
                                        </div>
					              </div>';
	            $data['ape_pate'] ='<div class="col-sm-6 mdl-group__icon" id="inputPate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_pate">
                                            <label class="mdl-textfield__label" for="ape_pate">Apellido Paterno</label>
                                        </div>
					                </div>';
	            $data['ape_mate'] ='<div class="col-sm-6 mdl-group__icon" id="inputMate">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" id="ape_mate">
                                            <label class="mdl-textfield__label" for="ape_mate">Apellido Materno</label>
                                        </div>
					                </div>';
	            $data['telefono'] ='<div class="col-sm-6 mdl-group__icon" id="inputTelefono">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="9" type="text" id="telefono">
                                            <label class="mdl-textfield__label" for="telefono">Tel&eacute;fono</label>
                                        </div>
					                </div>';
	            $data['celular'] ='<div class="col-sm-6 mdl-group__icon" id="inputCelular">
					                   <i class="mdi mdi-edit"></i>
					                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" maxlength="11" type="text" id="celular">
                                            <label class="mdl-textfield__label" for="celular">Celular</label>
                                        </div>
					                </div>';
	            $data['departamento'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDepartamento">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDep">
                    			                <option value="">Seleccione Departamento</option>
                    			           </select>
        					           </div>';
	            $data['provincia'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboProvincia">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboProv">
                    			                <option value="">Seleccione Provincia</option>
                    			           </select>
        					           </div>';
	            $data['distrito'] ='<div class="col-sm-6 mdl-group__icon mdl-group__select" id="comboDistrito">
        					               <i class="mdi mdi-edit"></i>
        					               <select class="form-control mdl-select" id="comboDist">
                    			                <option value="">Seleccione Distrito</option>
                    			           </select>
        					           </div>';
	            $data['nomCliente'] = '<div class="input-group date" data-provide="datepicker" id="fechaNacimiento">
                                            <input type="text" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>';
	    }
	    echo json_encode(array_map('utf8_encode', $data));
	 }
}
