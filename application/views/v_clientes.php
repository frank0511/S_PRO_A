<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clientes | Agrofer</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description"            content="Agrofer">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color"            content="<?php echo COLOR_BARRA_ANDROID?>">
        
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrapSelect/css/bootstrap-select.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>mdl/css/material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>pace/css/pace.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>fab/mfb.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>toastr/toastr.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>mdi/material-icons.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>roboto/roboto.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>agrofer.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>mdl-card__style.css">
  
    </head>
    <body>
        
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php echo $navegador; ?>
            <main class="mdl-layout__content">
    	       <section class="mdl-container content-cards">
	               <div class="mdl-card mdl-cliente">
	                   <div class="mdl-card__title">
	                       <h2 class="mdl-card__title-text" data-toggle="tooltip" data-placement="bottom" title="Terrones Paucarima, Nelly Lilian">Terrones Paucarima, Nelly Lilian</h2>
	                   </div>
	                   <div class="mdl-card__supporting-text">
	                       <div class="row">
	                           <div class="col-xs-12 mdl-text__head">Detalles del cliente</div>
                               <div class="col-xs-4  mdl-text__item">DNI</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
                               <div class="col-xs-5  mdl-text__item">Telefono</div>
                               <div class="col-xs-7  mdl-text__value"> - </div>
                               <div class="col-xs-4  mdl-text__item">Celular</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
                               <div class="col-xs-4  mdl-text__item">Correo</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
                               <div class="col-xs-4  mdl-text__item">Provincia</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
                               <div class="col-xs-4  mdl-text__item">Edad</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
                               <div class="col-xs-4  mdl-text__item">Representante</div>
                               <div class="col-xs-8  mdl-text__value"> - </div>
	                       </div>
	                   </div>    	                   
        	           <div class="mdl-card__actions">
        	               <button class="mdl-button mdl-js-button mdl-js-ripple-effect">Ver</button>
                           <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised">Editar</button>
        	           </div>
        	           <div class="mdl-card__menu">
        	               <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" id="cliente-1">
        	                   <i class="mdi mdi-more_vert"></i>
        	               </button>
        	               <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="cliente-1">
                               <li class="mdl-menu__item">Eliminar</li>
                           </ul>
        	           </div>
	               </div>
    	       </section> 
    	    </main>   	    
	    </div>
	    
    	<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">                
                    <div class="mdl-card mdl-card-fab" >
                        <div class="mdl-card__title">
    						<h2 class="mdl-card__title-text">Agregar cliente</h2>
    					</div>
					    <div class="mdl-card__supporting-text mdl-card__tab-pane">		
					       <ul class="nav nav-tabs">
					           <li class="active"><a data-toggle="tab" href="#tab-cliente">Datos b&aacute;sicos</a></li>
                               <li><a data-toggle="tab" href="#tab-representate">Representante</a></li>
                           </ul>		
                           <div class="tab-content">
                               <div id="tab-cliente" class="tab-pane fade in active">
                                   <div class="row">
                                       <div class="col-sm-6 mdl-group__icon mdl-group__select">
        					               <i class="mdi mdi-featured_play_list"></i>
        					               <select class="mdl-select form-control" id="tipoDocumento">
                    			                <option value="0">Seleccione tipo de documneto</option>
        					                    <?php echo $optDocumento;?>
                    			           </select>
        					           </div>	
            					       <div class="col-sm-6 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="numeroDocumento" name="numeroDocumento">
                    			                <label class="mdl-textfield__label" for="numeroDocumento">Num. Documento</label>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-person"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="nombresCliente" name="nombresCliente" pattern="^([A-Za-z ñáéíóú]{4,30})$">
                    			                <label class="mdl-textfield__label" for="nombresCliente">Nombres</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="apePaternoCliente" name="apePaternoCliente" pattern="^([A-Za-z ñáéíóú]{4,20})$">
                    			                <label class="mdl-textfield__label" for="apePaternoCliente">Apellido Paterno</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="apeMaternoCliente" name="apeMaternoCliente" pattern="^([A-Za-z ñáéíóú]{4,20})$">
                    			                <label class="mdl-textfield__label" for="apeMaternoCliente">Apellido Materno</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-email"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="correoCliente" name="correoCliente" pattern="[a-zA-Z0-9]+(?:(\.|_)[A-Za-z0-9!#$%&'*+/=?^`{|}~-]+)*@(?!([a-zA-Z0-9]*\.[a-zA-Z0-9]*\.[a-zA-Z0-9]*\.))(?:[A-Za-z0-9](?:[a-zA-Z0-9-]*[A-Za-z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?">
                    			                <label class="mdl-textfield__label" for="correoCliente">Email</label>
                                                <span class="mdl-textfield__error">Ingrese correctamente su correo.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-phone"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="telefonoCliente" name="telefonoCliente" pattern="^(0[1-9]{1}[1-9]{7})|(0[1-9]{2}[1-9]{6})$">
                    			                <label class="mdl-textfield__label" for="telefonoCliente">Telefono fijo</label>
                                                <span class="mdl-textfield__error">Ingrese solo n&uacute;meros. Ejm.: 043444486</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="celularCliente" name="celularCliente" pattern="^(0[1-9]{1,2}[1-9]{9})$">
                    			                <label class="mdl-textfield__label" for="celularCliente">Celular</label>
                                                <span class="mdl-textfield__error">Ingrese solo n&uacute;meros. Ejm.: 051999999999</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-12 mdl-group__icon">
        					               <i class="mdi mdi-gps_fixed"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="direccionCliente" name="direccionCliente" pattern="^.*(?=.*[0-9])(?=.*[a-zA-ZñÑ\s]).*$">
                    			                <label class="mdl-textfield__label" for="direccionCliente">Direcci&oacute;n</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni números.</span>
                    			           </div>
            				           </div>
            				           <div class="col-sm-6 col-md-4 mdl-group__icon mdl-group__select">
        					               <i class="mdi mdi-map"></i>
        					               <select class="mdl-select form-control" id="departamentoCliente">
                    			                <option value="0">Seleccione departamento</option>
                    			           </select>
        					           </div>
            				           <div class="col-sm-6 col-md-4 mdl-group__icon mdl-group__select">
        					               <select class="mdl-select form-control" id="provinciaCliente">
                    			                <option value="0">Seleccione provincia</option>
                    			           </select>
        					           </div>
            				           <div class="col-sm-6 col-md-4 mdl-group__icon mdl-group__select">
        					               <select class="mdl-select form-control" id="distritoCliente">
                    			                <option value="0">Seleccione distrito</option>
                    			           </select>
        					           </div>
                                   </div>
                               </div>
                               <div id="tab-representate" class="tab-pane fade in">
                                   <div class="row">
        					           <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-person"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="nombresRepresentante" name="nombresRepresentante" pattern="^([A-Za-z ñáéíóú]{4,30})$">
                    			                <label class="mdl-textfield__label" for="nombresRepresentante">Nombres</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="apePaternoRepresentante" name="apePaternoRepresentante" pattern="^([A-Za-z ñáéíóú]{4,30})$">
                    			                <label class="mdl-textfield__label" for="apePaternoRepresentante">Apellido Paterno</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="apeMaternoCliente" name="apeMaternoCliente" pattern="^([A-Za-z ñáéíóú]{4,30})$">
                    			                <label class="mdl-textfield__label" for="apeMaternoRepresentante">Apellido Materno</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni n&uacute;meros.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
            					           <i class="mdi mdi-featured_play_list"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="numeroDocRepresentante" name="numeroDocRepresentante" pattern="^([1-9]{8})$">
                    			                <label class="mdl-textfield__label" for="numeroDocRepresentante">DNI</label>
                                                <span class="mdl-textfield__error">No se permiten simbolos ni letras.</span>
                    			           </div>
            				           </div>
            				           <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-mail"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="correoRepresentante" name="correoRepresentante" pattern="[a-zA-Z0-9]+(?:(\.|_)[A-Za-z0-9!#$%&'*+/=?^`{|}~-]+)*@(?!([a-zA-Z0-9]*\.[a-zA-Z0-9]*\.[a-zA-Z0-9]*\.))(?:[A-Za-z0-9](?:[a-zA-Z0-9-]*[A-Za-z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?">
                    			                <label class="mdl-textfield__label" for="correoRepresentante">Email</label>
                                                <span class="mdl-textfield__error">Ingrese correctamente el correo del representante.</span>
                    			           </div>
            				           </div>
            					       <div class="col-sm-6 col-md-4 mdl-group__icon">
        					               <i class="mdi mdi-phone"></i>
            				               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    			                <input class="mdl-textfield__input" type="text" id="celularRepresentante" name="celularRepresentante" pattern="^(0[1-9]{1,2}[1-9]{9})$">
                    			                <label class="mdl-textfield__label" for="celularRepresentante">Celular para contactar</label>
                                                <span class="mdl-textfield__error">Ingrese solo n&uacute;meros. Ejm.: 051999999999</span>
                    			           </div>
            				           </div>
                                   </div>
                               </div>
                           </div>
    					</div>
    					<div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
	    
	    <ul id="menu" class="mfb-component--br mfb-slidein" data-mfb-toggle="hover">
           <li class="mfb-component__wrap">
                <button class="mfb-component__button--main" >
                    <i class="mfb-component__main-icon--resting mdi mdi-add"></i>
                </button>
                <button class="mfb-component__button--main" data-mfb-label="Nuevo cliente" onclick="openCloseModal('modalCliente')">
                    <i class="mfb-component__main-icon--active mdi mdi-person_add"></i>
                </button>
            </li>
        </ul>   
        
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/bootstrap-select.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/i18n/defaults-es_CL.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>pace/js/pace.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/lib/modernizr.touch.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/mfb.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>toastr/toastr.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>jsutils.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/jscliente.js"></script>    	
    	
    	<script type="text/javascript">
    		init();
    	</script>
    </body>
</html>