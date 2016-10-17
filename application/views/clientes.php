<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clientes | Agrofer</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0">
        <meta name="description"            content="Agrofer">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color"            content="<?php echo COLOR_BARRA_ANDROID?>">
        
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrapSelect/css/bootstrap-select.min.css">
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
	    
    	<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">                
                    <div class="mdl-card mdl-card-fab" >
                        <div class="mdl-card__title">
    						<h2 class="mdl-card__title-text" id="tittleAccion">Hola</h2>
    					</div>
					    <div class="mdl-card__supporting-text">				
					       <div class="row">					           
					           <div class="col-sm-6 mdl-group__icon mdl-group__select">
					               <select class="form-control mdl-select" id="tipoDocumento" onchange="mostrarFormularioCliente();">
            			                <option value="">Seleccione tipo de documneto</option>
					                    <?php echo $optDocumento;?>
            			           </select>
					           </div>
					       </div>
    					</div>
    					<div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" data-dismiss="modal" onclick="accionCliente()">Aceptar</button>
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
                <button class="mfb-component__button--main" data-mfb-label="Nuevo cliente"  onclick="abrirModalCliente(1)">
                    <i class="mfb-component__main-icon--active mdi mdi-person_add"></i>
                </button>
            </li>
        </ul>   
        
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/bootstrap-select.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>pace/js/pace.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/lib/modernizr.touch.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/mfb.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>toastr/toastr.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>jsutils.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/jscliente.js"></script>    	
    	
    	<script type="text/javascript">
        	$(document).ready(function(){
        	    $('[data-toggle="tooltip"]').tooltip(); 
        	});
    	</script>
    </body>
</html>