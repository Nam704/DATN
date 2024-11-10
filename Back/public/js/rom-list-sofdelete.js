$(document).ready(function(){
    $("#sofdelete").click(function(){
       
        $.ajax({
            url: "http://127.0.0.1:8000/api/roms/transhed-rom",
            method: "GET",
            success: function(response){
                //lấy danh sách các rom từ response
                let roms = response.data;
                //xây dựng nội dung cho bảng
                let tableConten = '';
                $.each(roms, function(index,rom){
                    tableConten +=
                    '<tr>'+
                    '<td>'+ (index +1) + '</td>'+
                   
                    '<td>'+ rom.rom_size + '</td>'+
                    '<td><button class="restore" data-id="' + rom.id + '" >Restore</button></td>' +

                    '</tr>'
                });
                $('.show').html(tableConten);
                // updateRomList();
                

            },
            error: function(){
                console.log("Error retrieving trashed roms.");
            }
        });
    });


$(document).on("click", ".restore", function () {
        let romId = $(this).data("id");

        $.ajax({
            url: "http://127.0.0.1:8000/api/roms/restore/" + romId,
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function () {
                alert("Rom restored successfully!");

                // Gọi lại để tải lại danh sách đã xóa mềm sau khi khôi phục
                $("#sofdelete").click(); 
                location.reload(); 
               
            },
            error: function () {
                console.log("Error restoring rom.");
            }
        });
    });
});


