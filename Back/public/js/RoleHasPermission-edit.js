$(document).ready(function () {
    var role_id = $("#role_id").val();
    $("tr").each(function () {
        var btnDelete = $(this).find("button.action-delete");
        var permission_id = parseInt(btnDelete.val());
        btnDelete.click(function (e) {
            e.preventDefault();
            var check = confirm("Are you sure?");
            if (check) {
                $.ajax({
                    type: "Delete",
                    url: "http://127.0.0.1:8000/api/role-has-permission/destroy",
                    data: {
                        role_id: role_id,
                        permission_id: permission_id,
                    },
                    dataType: "json",
                    success: function (response) {
                        alert("Deleted successfully");
                        location.reload();
                    },
                });
            }
            console.log("permission_id: ", permission_id);
            console.log("role_id: ", role_id);
        });
    });
});
