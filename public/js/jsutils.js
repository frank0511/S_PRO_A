//CERRAR SESION
$("#logOut").on("click", function() {
	$.ajax({
		url : 'utils/logOut',
		async : false,
		type : 'POST'
	}).done(function(data) {
		window.location.href = "";
	});
});

//CHANGE POSITION TABS
$('header a.mdl-layout__tab').click(function(event) {	
	var btn = $('.mdl-layout__tab-bar').find( 'a.mdl-layout__tab' ).index( this );
	var tab = $('.mdl-layout__tab-bar').children();
	var div = $(this).outerWidth();	
	var mov = null;
	
	if( btn == 0 ){
		mov = 0;
	} else if ( btn == ( tab.length - 1 ) ) {
		mov = $('.mdl-layout__tab-bar').outerWidth();
	} else {
		mov = div * btn;
	}
	
	$('.mdl-layout__tab-bar').animate({
		scrollLeft: mov
	});	
	
	if ( ( $('#menu').find('.mfb-component__button--main').length ) > 0  ) {
		$('.mfb-component__button--main').removeClass('is-up');
		setTimeout(function(){
			$('.mfb-component__button--main').addClass('is-up');
		}, 250);
	}	
});

//DETECT DEVICE FOR FAB
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var menuFab  = '#menu';
var closeFab = '#menu[data-mfb-state="closed"]';
var openFab	 = '#menu[data-mfb-state!="closed"]';
var btnFab	 = '#menu .mfb-component__button--main';
var listFab	 = '.mfb-component__list li';

$( document ).ready(function() {	
	$('body').append( '<div class="opacidad-fab"></div>' );
	
	if( isMobile.any() ) {		
		$(menuFab).attr( { 'data-mfb-toggle' : 'click',  'data-mfb-state' : 'closed' });	

		$(closeFab).find('.mfb-component__button--main:NTH-CHILD(1)').click(function(){
			$('body').toggleClass('bg-fab-black');
			$(closeFab).attr('data-mfb-state', 'open');
			$(btnFab+':NTH-CHILD(2)').addClass('active');
		});		
		
		$('.opacidad-fab').click(function(){
			$( 'body' ).removeClass('bg-fab-black');
			$(btnFab+':NTH-CHILD(2)').removeClass('active');
			$(openFab).attr('data-mfb-state', 'closed');
		});
		
	} else {
		$(menuFab).attr("data-mfb-toggle", "hover");
	}	
	
	if ( ( $('#menu').find('.mfb-component__button--main').length ) > 0  ) {
		$('.mfb-component__button--main').removeClass('is-up');
		setTimeout(function(){
			$('.mfb-component__button--main').addClass('is-up');
		}, 250);
	}	
});

if( isMobile.any() ) {		
	if ( ( $(listFab).find('button').length ) > 0 ){
		$(listFab).find('button').click(function(){
			$(openFab).attr('data-mfb-state', 'closed');
			$(btnFab+'.active:NTH-CHILD(2)').removeClass('active');
			$('body').removeClass('bg-fab-black');
		});			
	}
	
	$(openFab).find('.mfb-component__button--main:NTH-CHILD(2)').click(function(){
		$(openFab).attr('data-mfb-state', 'closed');
		$('body').toggleClass('bg-fab-black');
		$(btnFab+':NTH-CHILD(2)').toggleClass('active');
	});
	
} else {
	$(menuFab)
	.mouseenter(function() {
		$('body').addClass('bg-fab-black');
		$(btnFab+':NTH-CHILD(2)').addClass('active');
	})
	.mouseleave(function() {
		$(openFab).attr('data-mfb-state', 'closed');
		$(btnFab+'.active:NTH-CHILD(2)').removeClass('active');
		$('body').removeClass('bg-fab-black');
	});
}

// INIT SELECT 
function initSelect(){
	if( isMobile.any() ) {
	    $('.mdl-select').selectpicker('mobile');
	} else {
		$('.mdl-select').selectpicker();
	}
}

//ADD COLOR ICON FOR INPUT/BUTTON GROUP
/*$('.mdl-group__icon .mdl-textfield__input').click(function() {
	var idInput 	= $(this).attr('id');	
	var colorInput 	= $('.is-focused .mdl-textfield__label').css('color');
	$('.mdl-group__icon .mdl-textfield__input').closest('.mdl-group__icon').find('i.mdi').removeAttr('style');
	$('#'+idInput).closest('.mdl-group__icon').find('i.mdi').css('color', colorInput);
});*/

function focusAddIconColor(id, element){
	var forElement = null; 
	if( element == 1 ){
		forElement = $(id).attr('id');
	} else {
		forElement = $(id).closest('.mdl-group__icon').find('select').attr('data-id');
		console.log(id);
	}
	$('.mdl-group__icon').removeClass('active');
	$(id).closest('.mdl-group__icon').addClass('active');
}

$('.mdl-textfield__input').click(function() {
	focusAddIconColor(this, 1);
});

$('.mdl-select').click(function() {
	focusAddIconColor(this, 2);
});

$('*').blur(function(){
	$('.mdl-group__icon').removeClass('active');
});

$(window).keyup(function (e) {
	var code = (e.keyCode ? e.keyCode : e.which);
    
    var focus		 = $(document.activeElement);
    var focusElement = null;
    var focusType	 = null;
    console.log(focus);
    
    if ( focus.hasClass('mdl-textfield__input')) {
    	focusElement = focus;
    	focusType 	 = 1;
    } else if ( focus.hasClass('mdl-button__select') ) {
    	focusElement = focus;
    	focusType 	 = 2;
	} else { 
		focusElement = 0;
		$('.mdl-group__icon').removeClass('active');
	}
    
    if ( code == 9 && ( focusElement.length > 0 )  ) {  
    	if ( focusType == 1 ) {
        	focusAddIconColor(focusElement, focusType);    		
    	} else {
        	focusAddIconColor(focusElement, focusType);  
    	}
    }
});

function abrirCerrarModal(idModal){
	$('#'+idModal).modal('toggle');
}

function mostrarNotificacion(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {timeOut: 4000});
	}
}

function setearInput(idInput, val){
	$("#"+idInput).val(val);
	if(val === ""){
		$("#"+idInput).parent().removeClass("is-dirty");
		$('#'+idInput).parent().removeClass('is-focused');
	}else if(val != null){
		$("#"+idInput).parent().addClass("is-dirty");
	}else{
		$("#"+idInput).parent().removeClass("is-dirty");
		$('#'+idInput).parent().removeClass('is-focused');
	}
}

function setearCombo(idCombo, val){
	$("#"+idCombo).val(val);
	$("#"+idCombo).selectpicker('render');
}