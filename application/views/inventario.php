<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inventario - Agrofer</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0">
        <meta name="description"            content="Agrofer">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color"            content="<?php echo COLOR_BARRA_ANDROID?>"/>
        
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrapSelect/css/bootstrap-select.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>mdl/css/material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>dataTable/css/dataTables.material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>pace/css/pace.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>fab/mfb.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>mdi/material-icons.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>roboto/roboto.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>agrofer.css">
                
    </head>
    <body >
        <div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
        
            <?php echo $navegador; ?>
            
            <main class="mdl-layout__content">
    	       <section class="mdl-container">
    	           <div class="mdl-card mdl-table">
    	               <div class="mdl-card__title">
    	                   <h2 class="mdl-card__title-text">Mi inventario</h2>
    	               </div>
    	               <div class="mdl-card__supporting-text p-0" id="tableInventario">
    	                   <?php echo $tableInventario ?>
    	               </div>
    	           </div>
    	       </section>
    	   </main>
    	   
	   </div>
	   
	   <ul id="menu" class="mfb-component--br mfb-slidein" data-mfb-toggle="hover">
           <li class="mfb-component__wrap">
                <button class="mfb-component__button--main" >
                    <i class="mfb-component__main-icon--resting mdi mdi-add"></i>
                </button>
                <button class="mfb-component__button--main" data-toggle="modal" data-target="#registrarProducto" data-mfb-label="Nuevo producto">
                    <i class="mfb-component__main-icon--active mdi mdi-note_add"></i>
                </button>
            </li>
       </ul>   
       
       <div class="modal fade" id="editProducto" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                
                    <div class="mdl-card mdl-card-fab" >
                        <div class="mdl-card__title">
    						<h2 class="mdl-card__title-text">Nuevo producto</h2>
    					</div>
					    <div class="mdl-card__supporting-text">    				
					       <div class="row">
					           <div class="col-sm-12 m-b-15">
					               <select class="form-control">
            			                <option value="">A&ntilde;o</option>
            			           </select>
					           </div>
					           
					           <div class="col-sm-12 m-b-15">
					               <select class="form-control">
            			                <option value="">Sede</option>
            			           </select>
					           </div>
					           
					           <div class="col-sm-12">
					               <select class="form-control">
            			                <option value="">Nivel y Grado</option>
            			           </select>
					           </div>
					       </div>
    					</div>
    					<div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" data-dismiss="modal" onclick="getPensionesByYear()">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
	   
	   <div class="modal fade" id="registrarProducto" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">                
                    <div class="mdl-card mdl-card-fab" >
                        <div class="mdl-card__title">
    						<h2 class="mdl-card__title-text">Nuevo producto</h2>
    					</div>
					    <div class="mdl-card__supporting-text">				
					       <div class="row">
					           <div class="col-sm-6 mdl-group__icon">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            			                <input class="mdl-textfield__input" type="text" id="nombreProducto">
            			                <label class="mdl-textfield__label" for="nombreProducto">Nombre</label>
            			           </div>
					           </div>
					           <div class="col-sm-6 mdl-group__icon">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            			                <input class="mdl-textfield__input" type="text" id="marcaProducto">
            			                <label class="mdl-textfield__label" for="marcaProducto">Marca</label>
            			           </div>
					           </div>
					           <div class="col-sm-6 mdl-group__icon">
					               <i class="mdi mdi-edit"></i>
					               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            			                <input class="mdl-textfield__input" type="text" id="precioProducto">
            			                <label class="mdl-textfield__label" for="precioProducto">Precio unitario</label>
            			           </div>
					           </div>
					           <div class="col-sm-6 mdl-group__icon mdl-group__select">
					               <i class="mdi mdi-edit"></i>
					               <select class="form-control mdl-select" id="tipoProducto">
            			                <option value="">Seleccione tipo de producto</option>
            			           </select>
					           </div>					           
					           <div class="col-sm-6 mdl-group__icon mdl-group__select">
					               <select class="form-control mdl-select" id="tipoUnidMedida">
            			                <option value="">Seleccione tipo de unidad de medida</option>
            			           </select>
					           </div>
					       </div>
    					</div>
    					<div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" data-dismiss="modal" onclick="getPensionesByYear()">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/bootstrap-select.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>dataTable/js/jquery.dataTables.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>dataTable/js/dataTables.material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>pace/js/pace.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/lib/modernizr.touch.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/mfb.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>jsutils.js"></script> 
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/jsinventario.js"></script>
    	
    </body>
</html>