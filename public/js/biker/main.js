let id;

$(function () {
    loadDataTable();
});


let loadDataTable = (data = {}) => {
    destroyDataTable('biker-parcels-table');
    let oTable = $("#biker-parcels-table").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            url: baseUrl + '/get-biker-parcels',
            type: 'get',
            data
        },
        "columns": [
            {data: 'id'},
            {data: 'pick_up_address'},
            {data: 'drop_off_address'},
        ],
        columnDefs: [
            {
                targets: 3,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    let button = `
                        <button type="button" data-id="${row.id}" class="btn btn-primary picked-btn" >
                          Pick up
                       </button>
                    `;
                    if (row.status === 'picked_up') {
                        button = '';
                    }
                    return button;

                }

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
    $('#biker-parcels-table_filter input').unbind();
    $('#biker-parcels-table_filter input').bind('keyup', function (e) {
        if (e.keyCode === 13) {
            oTable.search(this.value).draw();
        }
    });
}

$(document).on('click', '.picked-btn', function (e) {
    $("#picked-modal").modal('show');
    id = $(this).data('id');

});

$(document).on('click', '#pick-parcel-btn', function (e) {

    let pickedTime = $("#pick_up_time").val();
    let deliveredTime = $("#delivered_time").val();


    if (pickedTime === '') {
        alertMessage('please add pick-up time', 'error');
        return false;
    }

    if (deliveredTime === '') {
        alertMessage('please add deliver address', 'error');
        return false;
    }

    pickedParcel(pickedTime, deliveredTime, id);

});

let pickedParcel = (pickedTime, deliveredTime, id) => {
    $.ajax({
        type: "POST",
        data: {
            parcel_id: id,
            pick_up_time: pickedTime,
            delivered_time: deliveredTime,
            "_token": token,
        },
        url: baseUrl + "/parcels/pick-up",
        dataType: "json",
        success: function (response) {
            if (response.success === true) {
                alertMessage(response.message);
                loadDataTable();
                $("#picked-modal").modal('hide');
                $("#pick_up_time").val('');
                $("#delivered_time").val('');
            }
        },
        error: function (error) {
        }
    });
}


