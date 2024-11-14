$(document).ready(function () {
    // js for edit
    var btnUser_id = $("#user-select");
    var btnRole_id = $("#role-select");
    var valueUserId = btnUser_id.val();
    var valueRoleId = btnRole_id.val();

    var btnSave = $("#action-save");
    $(btnSave).click(function (e) {
        var valueUserId = btnUser_id.val();
        var valueRoleId = btnRole_id.val();
        console.log("id user: ", valueUserId);
        console.log("id role: ", valueRoleId);
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:8000/api/decentralization/edit",
            data: {
                user_id: valueUserId,
                role_id: valueRoleId,
            },
            dataType: "json",
            success: function (response) {
                $(".message").html(response.message);

                console.log(response);
            },
            error: function (response) {
                console.log("error");
            },
        });
        e.preventDefault();
    });
    // js for list
    var btnLockActive = $('[name="lock-active"]');

    $(btnLockActive).click(function (e) {
        var user_id = $(this).val();
        // console.log(user_id);
        $.ajax({
            type: "Put",
            url: "http://127.0.0.1:8000/api/users/edit",
            data: {
                user_id: user_id,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            },
            error: function (xhr, response) {
                console.log(xhr.responseJSON.message);
            },
        });
        e.preventDefault();
    });
});
