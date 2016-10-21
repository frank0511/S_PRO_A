<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ventas - Agrofer</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
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
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>mdi/material-icons.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>roboto/roboto.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>agrofer.css">

    </head>
    <body >
    
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        
    	   <?php echo $navegador; ?>
            
    	   <main class="mdl-layout__content">
    	       <section class="mdl-container">
    	           <div class="mdl-card mdl-table">
    	               <div class="mdl-card__title">
    	                   <h2 class="mdl-card__title-text">Mis ventas</h2>
    	               </div>
    	               <div class="mdl-card__supporting-text p-0" id="tableVenta">
    	                   <?php echo $tableVentas ?>
    	               </div>
    	               <div class="mdl-card__menu">
                           <?php echo $caja;?>
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
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/jsventas.js"></script>
    	
    </body>
</html>