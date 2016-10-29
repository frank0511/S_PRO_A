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

//INIT TOOLTIP
function initTooltip(){
	$('[data-toggle="tooltip"]').tooltip();
}

//INIT LIMIT INPUTS
function initLimitInputs() {
	for(var i = 0; i < arguments.length; i++) {
		var text 		= arguments[i];
		var textArea	= $('#'+text);
		var inputLength	= textArea.val().length;
		var spanValue	= $('.mdl-textfield__limit[for="'+text+'"]');
		var maxValInput = spanValue.attr('data-limit');
		spanValue.html(inputLength + "/" + maxValInput);
	}
}

//INIT DATEPICKER FOR DAYS
//SET FECHA/HOURS
function setValueDate(inputNew) {
	$('#'+inputNew.data('time')).val(inputNew.val());
}

//DAYS
function initCalendarDays(id){
	$("#"+id).bootstrapMaterialDatePicker({ 
		weekStart : 0, 
		date	: true, 
		time	: false, 
		format 	: 'DD/MM/YYYY'
	});
}

function initButtonCalendarDays() {
	for(var i = 0; i < arguments.length; i++) {
		var text 		= arguments[i];
		var id 			= $("#"+text);
		var newInput	= null;
		var iconButton 	= id.closest('.mdl-group__icon').find('.mdl-button');
		iconButton.click(function(){
			newInput = text+'ForCalendar';
			if ( $('#'+newInput).length < 1 ) {
				$('<input>').attr({
				    type		: 'text',
				    id			: newInput,
				    name		: newInput,
				    'data-time'	: text,
				    onchange 	: 'setValueDate($(this))',
				    style		: 'position: absolute; top: 40px; border: transparent; color: transparent; z-index: -4'
				}).appendTo(iconButton);
				initCalendarDays(newInput);
			}
			$("#"+newInput).focus();			
		});		
		var valueNewInput = $("#"+newInput).val();   
		id.text(valueNewInput);
	}
}

//DAYS 18 YEARS AGO
function initCalendarMinDate18YearsAgo(id){
	var date = new Date();
	var year	= date.getFullYear() - 18;
	var mounth 	= date.getMonth();
	var today	= date.getDate();
	
	$("#"+id).bootstrapMaterialDatePicker({ 
		weekStart : 0, 
		date	: true, 
		time	: false, 
		format 	: 'DD/MM/YYYY',
		maxDate : new Date(year, mounth, today)
	});
}

function initButtonCalendarMinDate18YearsAgo() {
	for(var i = 0; i < arguments.length; i++) {
		var text 		= arguments[i];
		var id 			= $("#"+text);
		var newInput	= null;
		var iconButton 	= id.closest('.mdl-group__icon').find('.mdl-button');
		iconButton.click(function(){
			newInput = text+'ForCalendar';
			if ( $('#'+newInput).length < 1 ) {
				$('<input>').attr({
				    type		: 'text',
				    id			: newInput,
				    name		: newInput,
				    'data-time'	: text,
				    onchange 	: 'setValueDate($(this))',
				    style		: 'position: absolute; top: 40px; border: transparent; color: transparent; z-index: -4'
				}).appendTo(iconButton);
				initCalendarDays(newInput);
			}
			$("#"+newInput).focus();			
		});		
		var valueNewInput = $("#"+newInput).val();   
		id.text(valueNewInput);
	}
}

//HOURS
function initCalendarHours(id){
	$("#"+id).bootstrapMaterialDatePicker({  
		date 	: false, 
		time	: true,
		format	: 'h:mm a'
	});
}

function initButtonCalendarHours() {
	for(var i = 0; i < arguments.length; i++) {
		var text 		= arguments[i];
		var id 			= $("#"+text);
		var newInput	= null;
		var iconButton 	= id.closest('.mdl-group__icon').find('.mdl-button');
		iconButton.click(function(){
			newInput = text+'ForCalendar';
			if ( $('#'+newInput).length < 1 ) {
				$('<input>').attr({
				    type		: 'text',
				    id			: newInput,
				    name		: newInput,
				    'data-time'	: text,
				    onchange 	: 'setValueDate($(this))',
				    style		: 'position: absolute; top: 40px; border: transparent; color: transparent; z-index: -4'
				}).appendTo(iconButton);
				initCalendarHours(newInput);
			}
			$("#"+newInput).focus();
			var valueNewInput = $("#"+newInput).val();
			id.html(valueNewInput);
		});
	}
}

//ADD COLOR ICON FOR INPUT/BUTTON GROUP
function focusAddIconColor(id, element){
	var forElement = null; 
	if( element == 1 ){
		forElement = $(id).attr('id');
	} else {
		forElement = $(id).closest('.mdl-group__icon').find('select').attr('data-id');
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
    var focusArea	 = null;
    
    if ( focus.hasClass('mdl-textfield__input')) {
    	focusElement = focus;
    	focusArea	 = focus;
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
    
    if ( focusArea != null ) {
    	if ( focusArea.parent('.mdl-textfield').find('.mdl-textfield__limit') != 0 ) {
    		var idTextArea  	= focusArea.attr('id');
        	var textAreaLength 	= focusArea.val().length;
        	var spanValue		= $('.mdl-textfield__limit[for="'+idTextArea+'"]');
        	var maxValText		= spanValue.attr('data-limit');
        	spanValue.html(textAreaLength + "/" + maxValText);
        	
        	if ( textAreaLength > maxValText ) {
        		focusArea.closest('.mdl-textfield').addClass('is-invalid');
        		focusAddIconColor(focusArea, focusType);
        	} else {
        		focusAddIconColor(focusElement, focusType);
        	}
    	}
    }
});

// OPEN/CLOSE MODAL
function openCloseModal(idModal){
	$('#'+idModal).modal('toggle');
}

// MOSTRAR NOTIFICACION
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


// SET INPUTS/COMBOS/VALUE
function setearInput(idInput, val, previo = null, disabled = null, clase = 'divInput'){
	$("#"+idInput).val(val);
	if(val != null){
		$("#"+idInput).parent().addClass("is-dirty");
	}else{
		$("#"+idInput).parent().removeClass("is-dirty");
	}
	if(previo != null){
		$("#"+idInput).attr("val-previo", previo);
	}

	if(disabled != null){
		$('#'+idInput).attr("disabled", true);
	} else {
		$('#'+idInput).attr("disabled", false);
		$('.'+clase).removeClass('is-disabled');
	}
}

function setearCombo(idCombo, val, previo = null, disabled = null){
	if(previo != null){
		$("#"+idCombo).attr("val-previo", previo);
	}
	if(disabled != null){
		disableEnableCombo(idCombo, true);
	} else if (disabled == null){
		disableEnableCombo(idCombo, false);
	}
	$("#"+idCombo).val(val);
	$("#"+idCombo).selectpicker('render');
}

function setValor(idNameCombo,valores) {
	$('select[name='+idNameCombo+']').val(valores);
	$('#'+idNameCombo).selectpicker('refresh');
}

// DISABLED INPUT/COMBO
function disableEnableCombo(idCombo, disaEna){
	$('#'+idCombo).prop('disabled', disaEna);
	$('#'+idCombo).selectpicker('refresh');
}

function disableEnableInput(idInput, tof){
	$('#'+idInput).attr("disabled", tof);
	if(tof == false){
		$('.divInput').removeClass('is-disabled');
	}
}

function getFechaHoy_dd_mm_yyyy() {
	var d = new Date();
	var mes = (d.getMonth()+1+'').length === 1 ? '0'+(d.getMonth()+1) : (d.getMonth()+1);
	var dia = (d.getDate()+'').length === 1 ? '0'+d.getDate() : (d.getDate());
	var hoyDia = dia+'/'+mes+'/'+d.getFullYear();
	return hoyDia;
}