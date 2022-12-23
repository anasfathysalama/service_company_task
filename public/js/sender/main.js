$(function (){
    loadDataTable();
});


let loadDataTable = (data = {}) => {
    destroyDataTable('sender-parcels-table');
    let oTable = $("#sender-parcels-table").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: baseUrl + '/get-sender-parcels',
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
    $('#sender-parcels-table_filter input').unbind();
    $('#sender-parcels-table_filter input').bind('keyup', function (e) {
        if (e.keyCode === 13) {
            oTable.search(this.value).draw();
        }
    });
}


