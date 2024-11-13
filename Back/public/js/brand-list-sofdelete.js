$(document).ready(function () {
    
    $("#story-Delete").click(function () {


        $.ajax({
            url: "http://127.0.0.1:8000/api/brands/tranShed-brand",
            method: "GET",
            success: function (response) {
                // Lấy danh sách các category từ response
                let brands = response.data;

                // Xây dựng nội dung HTML cho bảng
                let tableContent = '';
                $.each(brands, function (index, brand) {
                    tableContent +=
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + brand.name + '</td>' +
                        '<td><button class="restore" data-id="' + brand.id + '">Restore</button></td>' +
                        '</tr>';
                });

                // Ghi đè nội dung của .show với toàn bộ bảng
                $('.show').html(tableContent);
            },
            error: function () {
                console.log("Error retrieving trashed brands.");
            }
        });
    });
    // restore
    $(document).on("click", ".restore", function () {
        let brandId = $(this).data("id");

        $.ajax({
            url: "http://127.0.0.1:8000/api/brands/restore/" + brandId,
            method: "post",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function () {
                alert("Category restored successfully!");

                // Gọi lại để tải lại danh sách đã xóa mềm sau khi khôi phục
                $("#story-Delete").click(); 
                location.reload();
            },
            error: function () {
                console.log("Error restoring brand.");
            }
        });
    });
});


