function init(){
	initSelect();
	initTooltip();
	initLimitInputs('observacionesTrabajador');
    $(":input").inputmask();
    var hoy = getFechaHoy_dd_mm_yyyy();
    $("#fecNac").val(hoy);
}
var accionGlobal = "";
function accionModal(accion){
	accionGlobal = accion;
	openCloseModal('modalTrabajador');
}

function functionTrabajador(){
	var nombre       = $('#nombresTrabajador').val();
	var ape_pate     = $('#apePaternoTrabajador').val();
	var ape_mate     = $('#apeMaternoTrabajador').val();
	var num_doc      = $('#numeroDocumento').val();
	var sexo         = $('#sexoTrabajador option:selected').val();
	var estado       = $('#estadoCivilTrabajador option:selected').val();
	var fec_nac      = $('#fecNac').val();
	var direccion    = $('#direccionTrabajador').val();
	var departamento = $('#estadoCivilTrabajador option:selected').val();
	var provincia    = $('#estadoCivilTrabajador option:selected').val();
	var distrito     = $('#estadoCivilTrabajador option:selected').val();
	var telefono     = $('#telefonoTrabajador').val();
	var celular      = $('#celularTrabajador').val();
	var correo       = $('#correoTrabajador').val();
	var cargo        = $('#cargoTrabajador option:selected').val();
	var observacion  = $('#observacionesTrabajador').val();

	if(nombre.trim( ) == '' || nombre.length == 0 || /^\s+$/.test(nombre)){
		return mostrarNotificacion('warning', 'Ingrese Nombre');
	}
	if(ape_pate.trim( ) == '' || ape_pate.length == 0 || /^\s+$/.test(ape_pate)){
		return mostrarNotificacion('warning', 'Ingrese Apellido Paterno');
	}
	if(ape_mate.trim( ) == '' || ape_mate.length == 0 || /^\s+$/.test(ape_mate)){
		return mostrarNotificacion('warning', 'Ingrese Apellido Materno');
	}
	if(num_doc.trim() == '' || num_doc.length == 0 || /^\s+$/.test(num_doc)){
		return mostrarNotificacion('warning', 'Ingrese Numero de Documento');
	}
	if( isNaN(num_doc) ) {
		return mostrarNotificacion('warning', 'Solo Numeros en Numero de Documento');
		}
	if(sexo.length == 0){
		return mostrarNotificacion('warning', 'Seleccione Sexo');
	}
	if(estado.length == 0){
		return mostrarNotificacion('warning', 'Seleccione Sexo');
	}
	if(direccion.trim() == '' || direccion.length == 0 || /^\s+$/.test(direccion)){
		return mostrarNotificacion('warning', 'Ingrese Numero de Documento');
	}
	if(telefono.trim() == '' || telefono.length == 0 || /^\s+$/.test(telefono)){
		return mostrarNotificacion('warning', 'Ingrese Numero de Documento');
	}
	if( isNaN(telefono) ) {
		return mostrarNotificacion('warning', 'Solo Numeros en Numero de Documento');
		}
	if(celular.trim() == '' || celular.length == 0 || /^\s+$/.test(celular)){
		return mostrarNotificacion('warning', 'Ingrese Numero de Documento');
	}
	if( isNaN(celular) ) {
		return mostrarNotificacion('warning', 'Solo Numeros en Numero de Documento');
		}
	if(cargo.length == 0){
		return mostrarNotificacion('warning', 'Seleccione Sexo');
	}
	Pace.restart();
	Pace.track(function() {
		$.ajax({
			data  : { accionGlobal : accionGlobal,
			          nombre       : nombre,
			          ape_pate     : ape_pate,
			          ape_mate     : ape_mate,
			          num_doc      : num_doc,
			          sexo         : sexo,
			          estado       : estado,
			          fec_nac      : fec_nac,
			          direccion    : direccion,
			          departamento : departamento,
			          provincia    : provincia,
			          distrito     : distrito,
			          telefono     : telefono,
			          celular      : celular,
			          correo       : correo,
			          cargo        : cargo,
			          observacion  : observacion},
			url   : 'c_trabajadores/accionTrabajador',
			type  : 'POST',
			async : true
		}).done(function(data) {
			data = JSON.parse(data);
		});
	});
}

function getProvinciasByDepartamento() {
	var flag_Dep = $('#departamentoTrabajador option:selected').val();
	$.ajax({
		data : {
			flag_Dep : flag_Dep
		},
		url : 'c_trabajadores/buildOptProvincia',
		type : 'POST',
		async : false
	}).done(
			function(data) {
				data = JSON.parse(data);
				$('#provinciaTrabajador').append(data.optProvincias);
				$('#provinciaTrabajador').selectpicker('refresh');
			});
}

function getDistritosByProcinciaByDepartamento(){
	var flag_Dep = $('#departamentoTrabajador option:selected').val();
	var flag_Prov = $('#provinciaTrabajador option:selected').val();
	$.ajax({
		data : {
			flag_Dep  : flag_Dep,
			flag_Prov : flag_Prov
		},
		url : 'c_trabajadores/buildOptDistrito',
		type : 'POST',
		async : false
	}).done(
			function(data) {
				data = JSON.parse(data);
				$('#distritoTrabajador').append(data.optDistritos);
				$('#distritoTrabajador').selectpicker('refresh');
			});
}