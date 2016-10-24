<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ingresar - SGPA</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0">
        <meta name="description"            content="SGPA">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color"            content="<?php echo COLOR_BARRA_ANDROID?>">
        
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>mdl/css/material.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>pace/css/pace.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_PLUGINS?>fab/mfb.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>mdi/material-icons.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_FONTS?>roboto/roboto.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>agrofer.css">
        <link type="text/css" rel="stylesheet" href="<?php echo RUTA_CSS?>logic/login.css">
        
    </head>
    <body>  
        <main>
    		<section class="buttons login-button-active">
    			<button class="login-button">
    				<a href="#" class="log-link login-button-active">Ingresar</a>
    				<div class="login-underline login-button-active"></div>
    			</button>
    			<button class="signup-button">
    				<a href="#" class="sign-link">Recordar contrase&ntilde;a</a>
    				<div class="signup-underline login-button-active"></div>
    			</button>
    		</section>
    		<section class="forms">
    			<div class="login-form login-button-active" id="l-login">
    				<fieldset>
    				    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="input-user">
                            <input class="mdl-textfield__input" type="text" id="login-user" name="login-user">
                            <label class="mdl-textfield__label" for="login-user">Usuario</label>
                            <span class="mdl-textfield__error">Corregir su usuario</span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="input-pass">
                            <input class="mdl-textfield__input" type="password" id="login-password" name="login-password">
                            <label class="mdl-textfield__label" for="login-password">Contrase&ntilde;a</label>
                            <span class="mdl-textfield__error">Corregir su contrase&ntilde;a</span>
                        </div>
    				</fieldset>
    				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="login()" >Ingresar</button>
    			</div>
    			<div class="signup-form" id="l-password">
    				<fieldset>
                        <label style="color: #e2e2e2">Para poder recordar su contrase&ntilde;a por favor brindenos su correo electr&oacute;nico para contactarnos con usted.</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="email" id="signup-email" name="signup-email">
                            <label class="mdl-textfield__label" for="signup-email">Correo</label>
                        </div>
    				</fieldset>
    				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="" >Recordar</button>
    			</div>
    		</section>
    	</main>
    	 
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>jquery/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>pace/js/pace.min.js"></script>
    	<script type="text/javascript" src="<?php echo RUTA_JS?>logic/login.js"></script>
    	
	</body>
</html>