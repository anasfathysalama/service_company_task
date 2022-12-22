$(function (){
});

// let addNewBtn =
let addNewBtn = document.getElementById('add-new-btn');
addNewBtn.addEventListener('click', function (e) {


    $.ajax({
        type: "POST",
        data: {

        },
        url: url,
        dataType: "json",
        success: function (response) {

        },
        error: function (error) {
        }
    });
});
