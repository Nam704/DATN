$(document).ready(function () {
    $("#sof-delete").click(function () {
        $.ajax({
            url: "http://127.0.0.1:8000/api/permissions/list",
            method: "GET",
            success: function (response) {

                let permissions = response.data;
                let tablePermission = "????";
                $.each(permissions, function (index, permission) {
                    tablePermission +=
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + permission.name + '</td>' +
                        '<td>' + permission.display_name + '</td>' +
                        '<td><button class="restore" data-id="' + permission.id + '">Restore</button></td>' +
                        '</tr>';
                });
                console.log(permissions);
                $('.show').html(tablePermission);
            },
            error: function () {
                console.log("Error Retrieving Transhed Permission")

            }
            

        });
        
    });

    $(document).on("click", ".restore", function () {
        // e.preventDefault();
        let permission = $(this).data("id");
        $.ajax({
            url: "http://127.0.0.1:8000/api/permissions/restore/" + permission,
            method: "POST",
            success: function () {
                alert("Permission Restored Successfully")
                $("#sof-delete").click();
                location.reload();
            },
            error: function () {
                console.log("Error Retrieving Transhed Permission")

            }

        });

    });
    

   



});
