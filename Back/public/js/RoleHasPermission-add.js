function listPermissions() {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/api/permissions/list",
            dataType: "json",
            success: function (response) {
                resolve(response); // Trả về dữ liệu khi thành công
            },
            error: function (xhr, status, error) {
                console.log("Error in listPermissions:", status, error);
                reject(new Error("Error retrieving permissions")); // Ném lỗi nếu có lỗi
            },
        });
    });
}

function listPermissionForRole(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url:
                "http://127.0.0.1:8000/api/role-has-permission/list-permission-for-role-id/" +
                id,
            data: "data",
            dataType: "json",
            success: function (response) {
                resolve(response);
            },
            error: function (xhr, status, error) {
                console.log("Error in listPermissionForRole:", status, error);
                reject(new Error("Error retrieving role permissions")); // Ném lỗi nếu có lỗi
            },
        });
    });
}

$(document).ready(function () {
    async function fetchDataAndUpdateStatus() {
        try {
            var roleID = $("#role-selected").val();
            console.log("roleID: " + roleID);

            var permissions = await listPermissions();
            var rolePermissions = await listPermissionForRole(roleID);

            if (!permissions || !rolePermissions) {
                console.log("Data not returned");
                return;
            }

            var permissionsList = permissions.permissions || [];
            var listPermissionRole =
                rolePermissions.listPermissionForRole || [];

            console.log("Dữ liệu đã sẵn sàng permissions: ", permissionsList);
            console.log(
                "Dữ liệu đã sẵn sàng listPermissionRole:",
                listPermissionRole
            );

            updateStatus(listPermissionRole); // Cập nhật trạng thái
        } catch (error) {
            console.log("Error retrieving role data:", error.message);
        }
    }

    $("#role-selected").change(async function (e) {
        e.preventDefault();
        await fetchDataAndUpdateStatus();
    });

    function updateStatus(listPermissionRole) {
        $("tr").each(function () {
            var permissionId = parseInt(
                $(this).find("input[type=hidden]").val()
            );
            var $actionButton = $(this).find(".action"); // Tìm nút có class .action

            // Kiểm tra nếu quyền đã được thêm
            if (listPermissionRole.includes(permissionId)) {
                $(this).find(".status").text("Already Added");
                $actionButton.prop("disabled", true); // Vô hiệu hoá nút
            } else {
                $(this).find(".status").text("Not yet added");
                $actionButton.prop("disabled", false); // Bật nút
            }

            // Gán sự kiện click sau khi cập nhật trạng thái của nút
            $actionButton.off("click"); // Xóa sự kiện click cũ, nếu có
            $actionButton.on("click", function (e) {
                var roleID = $("#role-selected").val();

                e.preventDefault();
                var check = confirm("You will add this permission to role?");
                if (check) {
                    console.log(roleID, permissionId);
                    $.ajax({
                        type: "POST",
                        url: "http://127.0.0.1:8000/api/role-has-permission/add",
                        data: {
                            role_id: roleID,
                            permission_id: permissionId,
                        },
                        dataType: "json",
                        success: function (response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function (response) {
                            alert(response.message);
                        },
                    });
                }
            });
        });
    }

    // Gọi hàm lần đầu khi trang tải xong
    fetchDataAndUpdateStatus();
});
