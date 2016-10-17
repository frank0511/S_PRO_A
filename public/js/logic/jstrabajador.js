var accionGlobal = "";
function abrirModalTrabajador(accion){
	accionGlobal = accion;
	$.ajax({
			data  : {accionGlobal  : accionGlobal},
			url   : 'trabajador/accionFormulario',
			type  : 'POST',
			async : false
			}).done(function(data) {
				data = JSON.parse(data);
				if (data.error == 1) {
					mostrarNotificacion('warning', data.msj);
				} else {
				abrirCerrarModal('modalTrabajador');
				}
			});
}
