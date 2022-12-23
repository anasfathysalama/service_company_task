$(function () {

    let addNewBtn = document.getElementById('add-new-btn');
    addNewBtn.addEventListener('click', function (e) {
        $("#create-parcel-modal").modal('show');
    });


    let saveParcelBtn = document.getElementById('save-parcel-btn');
    saveParcelBtn.addEventListener('click', function (e) {
        saveNewParcel();
    });

});

let saveNewParcel = () => {
    let pickAddress = $("#pick_up_address").val();
    let dropAddress = $("#drop_off_address").val();

    if (pickAddress === '') {
        alertMessage('please add pick-up address', 'error');
        return false;
    }

    if (dropAddress === '') {
        alertMessage('please add drop-off address', 'error');
        return false;
    }

    $.ajax({
        type: "POST",
        data: {
            "_token": token,
            pick_up_address: pickAddress,
            drop_off_address: dropAddress,
        },
        url: baseUrl + "/parcels",
        dataType: "json",
        success: function (response) {
            if (response.success === true) {
                alertMessage(response.message);
                loadDataTable();
                $("#create-parcel-modal").modal('hide');
                $("#pick_up_address").val('');
                $("#drop_off_address").val('');
            }
        },
        error: function (error) {
        }
    });
}
