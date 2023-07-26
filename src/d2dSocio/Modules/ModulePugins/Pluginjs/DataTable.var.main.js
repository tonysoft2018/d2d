/*<DataTablesVar>*/        
    const DataTablesVar= {
        responsive: true,
        rowReorder: {    selector: 'td:nth-child(2)'},                        
        "language": {      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
        "paging": true,
        dom: 'lBfrtip',
        order: [[0, "desc"], [1, "desc"]],
        buttons: [  'excel', 'csv', 'pdf', 'print', 'copy',   ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    };
    export default DataTablesVar;
/*</DataTablesVar>*/    
