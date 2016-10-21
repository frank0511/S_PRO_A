<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Configuraci&oacute;n - Agrofer</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="Content-Type"     content="text/html; charset=utf-8" />
        <meta name="viewport"               content="width=device-width, initial-scale=1.0">
        <meta name="description"            content="Agrofer">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color"            content="<?php echo COLOR_BARRA_ANDROID?>">
        
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>bootstrapSelect/css/bootstrap-select.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>mdl/css/material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>dataTable/css/dataTables.material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>pace/css/pace.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>fab/mfb.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>toastr/toastr.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>mdi/material-icons.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>roboto/roboto.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>agrofer.css">
        
        <style type="text/css">
            #breadcrumbPermisosByRol, #cardPermisosByRol{
            	display: none;
            }
        </style>
    </head>
    <body>
        
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	       <?php echo $navegador; ?>
	
    	   <main class="mdl-layout__content">
    	       <section class="mdl-container content-cards">
    	           <div class="mdl-empty">
    	               <i class="mdi mdi-local_library"></i>
    	               <p>Primero realiza tu b&uacute;squeda</p>
    	               <p>en el bot&oacute;n inferior.</p>
    	           </div>
    	           <ol class="breadcrumb" id="breadcrumbPermisosByRol">
    	               <li><a href="javascript:void(0)">Filtro</a></li>
    	               <li><a href="javascript:void(0)">Rol</a></li>
    	           </ol>
    	           <div class="mdl-card mdl-table" id="cardPermisosByRol">
    	               <div class="mdl-card__title">
    	                   <h2 class="mdl-card__title-text">Permisos</h2>
    	               </div>
    	               <div class="mdl-card__supporting-text">
    	               
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
                <button class="mfb-component__button--main" data-mfb-label="Filtrar rol" onclick="openCloseModal('modalFiltrar')">
                    <i class="mfb-component__main-icon--active mdi mdi-filter_list"></i>
                </button>
            </li>
        </ul> 
        
        <div class="modal fade" id="modalFiltrar" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                
                    <div class="mdl-card mdl-card-fab" >
                        <div class="mdl-card__title">
    						<h2 class="mdl-card__title-text">Filtrar rol</h2>
    					</div>
					    <div class="mdl-card__supporting-text">
					       <div class="row">
    					       <div class="col-sm-12 mdl-group__icon mdl-group__select">
    				               <i class="mdi mdi-work"></i>
    				               <select class="mdl-select form-control" id="selectRol" onchange="getSistemaByRol()">
            			                <option value="0">Seleccione rol</option>
            			                <?php echo $optRoles; ?>
            			           </select>
    				           </div>
				           </div>
					    </div>
    					<div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" data-dismiss="modal">Aceptar</button>
                        </div>
				    </div>
			    </div>
		    </div>
	    </div>
	    
	    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/bootstrap-select.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrapSelect/js/i18n/defaults-es_CL.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>dataTable/js/jquery.dataTables.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>dataTable/js/dataTables.material.min.js"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>pace/js/pace.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/lib/modernizr.touch.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>fab/mfb.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>toastr/toastr.min.js"></script>    	    
    	<script type="text/javascript" src="<?php echo RUTA_JS?>jsutils.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/jsconfiguracion.js"></script>    	
    	
    	<script type="text/javascript">
    		init();
    	</script>
    	
    </body>
</html>