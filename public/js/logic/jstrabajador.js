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
			url   : 'trabajadores/accionTrabajador',
			type  : 'POST',
			async : true
		}).done(function(data) {
			data = JSON.parse(data);
		});
	});
}