$(document).ready(function () {
    $("#user-select").change(function () {
        // alert('ok');
        var selectedUserId = $(this).val();

        $.ajax({
            url: "http://127.0.0.1:8000/api/getUserRole/" + selectedUserId, // Đường dẫn đến route để lấy role
            method: "GET",
            success: function (data) {
                // Cập nhật giá trị của role select
                $("#role-select").val(data.role_id);
                console.log(data);
            },
            error: function () {
                console.log("Error retrieving role data.");
            },
        });
    });
});
