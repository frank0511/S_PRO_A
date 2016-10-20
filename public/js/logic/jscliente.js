var accionGlobal = "";
function abrirModalCliente(accion){
	accionGlobal = accion;
	abrirCerrarModal('modalCliente');
}

function mostrarFormularioCliente(){
		var tipoDocumento = $('#tipoDocumento option:selected').val();
		if(tipoDocumento.length == 0){
			return mostrarNotificacion('warning', 'Seleccione Tipo de Documento');
		}
		$.ajax({
			data  : {tipoDocumento : tipoDocumento,
				     accionGlobal  : accionGlobal},
			url   : 'clientes/cargarFormulario',
			type  : 'POST',
			async : false
			}).done(function(data) {
				data = JSON.parse(data);
				if (data.error == 1) {
					mostrarNotificacion('warning', data.msj);
				} else {
					$('#comboPadre').remove();
					$('#comboMovimiento').remove();
					$('#inputDescripccion').remove();
					$('#inputMonto').remove();
					$("#selectTipo").selectpicker('render');
					$('#formularioRegistro').append(data.optPadre);
					$("#selectPadre").selectpicker('render');
					$('#formularioRegistro').append(data.optMov);
					$("#selectMov").selectpicker('render');
					$('#formularioRegistro').append(data.descripcion);
					$('#formularioRegistro').append(data.monto);
					componentHandler.upgradeAllRegistered();
				}
			});
}