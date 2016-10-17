$(document).ready(function() {
    $('#tbVentas').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2, 4 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
        language: {
            "url": "public/plugin/dataTable/language/Spanish.json"
        }
    } );
} );