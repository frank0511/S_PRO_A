// INIT SELECT

$(document).ready(function() {
	initSelect();
	
    $('#tbInventario').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 3, 4 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
        language: {
            "url": "public/plugin/dataTable/language/Spanish.json"
        }
    } );
} );

function redirectProductoDetalle(idProducto) {
	$.ajax({
		data : {
			id : idProducto
		},
		url : 'inventario/redirectProductoDetalle',
		type : 'POST',
		async : false
	}).done(function(data) {
		data = JSON.parse(data);
		window.location.href = data.url;
	});
}