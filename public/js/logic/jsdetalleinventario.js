$(document).ready(function() {
    $('#tbEntradas, tbSalidas').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
        columnDefs: [
            { "visible": false, "targets": 1 }
        ],
        language: {
            "url": "public/plugin/dataTable/language/Spanish.json"
        },
        searching: false,
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
} );
