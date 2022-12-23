let destroyDataTable = (tableId) => {
    let table = $('#' + tableId).DataTable({
        retrieve: true,
        destroy: true,
        paging: false,
        searching: false
    });
    table.destroy();
}

let alertMessage = (message, type = 'success') => {
    $.notify(message, type);
}
