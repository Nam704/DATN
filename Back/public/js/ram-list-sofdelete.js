$(document).ready(function(){
    $("#sofdelete").click(function(){
       
        $.ajax({
            url: "http://127.0.0.1:8000/api/rams/transhed-ram",
            method: "GET",
            success: function(response){
                //lấy danh sách các ram từ response
                let rams = response.data;
                //xây dựng nội dung cho bảng
                let tableConten = '';
                $.each(rams, function(index,ram){
                    tableConten +=
                    '<tr>'+
                    '<td>'+ (index +1) + '</td>'+
                   
                    '<td>'+ ram.ram_size + '</td>'+
                    '<td><button class="restore" data-id="' + ram.id + '" >Restore</button></td>' +

                    '</tr>'
                });
                $('.show').html(tableConten);
                // updateRamList();

            },
            error: function(){
                console.log("Error retrieving trashed rams.");
            }
        });
    });


$(document).on("click", ".restore", function () {
        let ramId = $(this).data("id");

        $.ajax({
            url: "http://127.0.0.1:8000/api/rams/restore/" + ramId,
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function () {
                alert("Ram restored successfully!");

                // Gọi lại để tải lại danh sách đã xóa mềm sau khi khôi phục
                $("#sofdelete").click(); 
                location.reload(); 
            },
            error: function () {
                console.log("Error restoring ram.");
            }
        });
    });
});


