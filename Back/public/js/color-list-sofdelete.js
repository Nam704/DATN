$(document).ready(function () {
    $("#delete").click(function () {
        // alert();
        $.ajax({
            url: "http://127.0.0.1:8000/api/colors/tranShed-color",
            method: "GET",
            success: function (response) {
                let colors = response.data;
                let tableColor = '';
                $.each(colors, function (index, color) {
                    tableColor += '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                    '<td>' + color.name + '</td>'+
                    '<td><button class="restore" data-id="' + color.id + '">Restore</button> </td>'
                    '</tr>'
                });
                $('.show').html(tableColor);


            },
            error: function () {
                console.log("Error Retrieving Transhed Color")
            }
        });
    });


    $(document).on("click", ".restore", function () {
        let colorId = $(this).data("id");
        $.ajax({
            url: "http://127.0.0.1:8000/api/colors/restore/" + colorId,
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function () {
                alert("Color Restored Successfully");
                $("#delete").click(); 
                location.reload();
            },
            error: function () {
                console.log("Error restoring category.");
            }
        });
    });


});