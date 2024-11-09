$(document).ready(function () {
    $("#story-Delete").click(function () {


        $.ajax({
            url: "http://127.0.0.1:8000/api/categories/transhed-category",
            method: "GET",
            success: function (response) {
                // Lấy danh sách các category từ response
                let categories = response.data;

                // Xây dựng nội dung HTML cho bảng
                let tableContent = '';
                $.each(categories, function (index, category) {
                    tableContent +=
                        '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + category.name + '</td>' +
                        '<td><button class="restore" data-id="' + category.id + '">Restore</button></td>' +
                        '</tr>';
                });

                // Ghi đè nội dung của .show với toàn bộ bảng
                $('.show').html(tableContent);
            },
            error: function () {
                console.log("Error retrieving trashed categories.");
            }
        });
    });
    // restore
    $(document).on("click", ".restore", function () {
        let categoryId = $(this).data("id");

        $.ajax({
            url: "http://127.0.0.1:8000/api/categories/restore/" + categoryId,
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function () {
                alert("Category restored successfully!");

                // Gọi lại để tải lại danh sách đã xóa mềm sau khi khôi phục
                $("#story-Delete").click(); 
            },
            error: function () {
                console.log("Error restoring category.");
            }
        });
    });
});


