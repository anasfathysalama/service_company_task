$(function (){
    loadDataTable();
});


let loadDataTable = (data = {}) => {
    destroyDataTable('parcels-table');
    let oTable = $("#parcels-table").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: baseUrl + '/sender-parcels',
            type: 'get',
            data
        },
        "columns": [
            {data: 'id'},
            {data: 'pick_up_address'},
            {data: 'drop_off_address'},
            {data: 'status'},
        ],
        columnDefs: [
            {
                // targets: 3,
                orderable: false,
                searchable: false,
            }],
        "scrollX": true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom":
            "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +
            "<'table-responsive'tr>" +
            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
    $('#parcels-table_filter input').unbind();
    $('#parcels-table_filter input').bind('keyup', function (e) {
        if (e.keyCode === 13) {
            oTable.search(this.value).draw();
        }
    });
}


