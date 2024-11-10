// $(document).ready(function () {
//     // var permissionsForRole = [];

//     $.ajax({
//         type: "GET",
//         url: "http://127.0.0.1:8000/api/permissions/list",
//         data: "data",
//         dataType: "json",
//         success: function (response) {
//             var permissions = response.permissions; // Mảng permissions
//             console.log("permissions: " + permissions); // In ra mảng permissions

//             // function fetchPermissionsForRole(role_id) {
//             //     $.ajax({
//             //         type: "GET",
//             //         url:
//             //             "http://127.0.0.1:8000/api/role-has-permission/list-permission-for-role-id/" +
//             //             role_id,
//             //         dataType: "json",
//             //         success: function (response) {
//             //             var permissionsForRole = response.listPermissionForRole; // Mảng permissions cho role
//             //             console.log(
//             //                 "permissionsForRole: " + permissionsForRole
//             //             ); // In ra mảng permissionsForRole

//             //             // Hàm cập nhật trạng thái nút
//             //             function updateButtonStates() {
//             //                 $("tr").each(function () {
//             //                     // Lấy giá trị permission_id từ input hidden
//             //                     var permissionId = parseInt(
//             //                         $(this).find("input[type=hidden]").val()
//             //                     );
//             //                     console.log(permissionId); // In ra permissionId

//             //                     // Nếu permission_id có trong permissionsForRole thì cập nhật nút thành "Already Added"
//             //                     if (permissionsForRole.includes(permissionId)) {
//             //                         $(this)
//             //                             .find(".status")
//             //                             .text("Already Added")
//             //                             .prop("disabled", true); // Disable nút
//             //                     } else {
//             //                         $(this).find(".status").text("Add"); // Hiển thị "Add" nếu không có trong permissionsForRole
//             //                     }
//             //                 });
//             //             }

//             //             // Cập nhật trạng thái nút
//             //             updateButtonStates();
//             //         },
//             //         error: function () {
//             //             console.log("Error retrieving role data.");
//             //         },
//             //     });
//             // }

//             // Khởi tạo với role_id ban đầu
//             // var role_id = $("#role-selected").val();
//             // fetchPermissionsForRole(role_id);

//             // // Khi thay đổi role_id
//             // $("#role-selected").change(function (e) {
//             //     e.preventDefault();
//             //     var role_id = $(this).val();
//             //     fetchPermissionsForRole(role_id);
//             // });
//         },
//         error: function () {
//             console.log("Error retrieving permission data.");
//         },
//     });
// });
