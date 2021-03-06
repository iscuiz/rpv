$(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            
            "columns": [
                { "visible": false },
                null,
                null,
                null,
                null
              ],
        });
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                },
                "columns": [
                    { "visible": false },
                    null,
                    null,
                    null,
                    null
                  ],
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        dom: 'Bfrtip',
        
        buttons: [
            {
                extend: 'copy',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                text: 'Copiar',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            },
            {
                extend: 'excel',
                text: 'Exportar para Excel',
               
            },
            ,
            {
                extend: 'pdf',
                text: 'Exportar para PDF',
              /*  action: function()
                {
                    this.column(10).visible(false);  
                },*/
                pageSize: 'LEGAL',
                //para exportar a pagina atual
               exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9]
            }
            }
        ],
        
    });

 