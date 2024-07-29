$(function (e) {
    // responsive datatable
    $('#responsiveDataTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search Participants...',
            sSearch: '',
        },
        "pageLength": 20,
        ordering: false
    });
    // responsive datatable

    // responsive datatable
    $('#exportDataTable').DataTable({
        dom: 'l<"mt-2"B>frtip',
        buttons: [
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                }
            }
        ],
        responsive: true,
        language: {
            searchPlaceholder: 'Search Participants...',
            sSearch: '',
        },
        "pageLength": 20,
        ordering: false
    });
    // responsive datatable
});

