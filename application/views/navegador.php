<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<header class="mdl-layout__header">
    <a class="mdl-button__return" href="javascript:history.back()"><i class="mdi mdi-arrow_back"></i></a>
	<div class="mdl-layout__header-row">
		<span class="mdl-layout-title">
		  <a href="<?php echo base_url()?>"></a>
		  <?php echo (isset($view)) ? '<label> '.$view.'</label>' : null?>
		</span>
		<div class="mdl-layout-spacer"></div>
		<nav class="mdl-navigation">
            <button id="account" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="mdi mdi-account_circle"></i>
            </button>
		</nav>
	</div>
	<?php echo (isset($tabs)) ? $tabs : null?>	
</header>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="account">
    <li class="mdl-menu__item">Perfil</li>
    <li class="mdl-menu__item" id="logOut">Cerrar sesi&oacute;n </li>
</ul>

<div class="mdl-layout__drawer">
	<span class="mdl-layout-title"><a href="<?php echo base_url()?>">SGPA</a></span>
	<nav class="mdl-navigation">
	   <?php echo $modulos ?>
	</nav>
</div>