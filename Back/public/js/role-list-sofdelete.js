$(document).ready(function(){

    $('#sof-delete').click(function(){
        // alert("ok")
        $.ajax({
           
            url: "http://127.0.0.1:8000/api/roles/trashed-role",
            method: "GET",
            
            success:function(response){
                let roles = response.data;
                // console.log(roles);
                let tableRole = "";
                $.each(roles, function(index,role){
                    tableRole += '<tr>'+
                        '<td>'+ (index +1) +'</td>'+
                        '<td>'+ role.name +'</td>'+
                        '<td>'+ role.display_name +'</td>'+
                        '<td><button class="restore" data-id="' + role.id +'">Restore</button></td>'


                    '</tr>';
                });
                // console.log(tableRole)
                $('.show').html(tableRole);
            },
            error: function(){
                console.log("Error Retrieving Transhed Role")
            }
        });
    });


    $(document).on("click", ".restore", function(){
        let roleId = $(this).data("id");
        $.ajax({
            url: "http://127.0.0.1:8000/api/roles/restore/" +roleId,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token bảo mật
            },
            success: function(){
                alert("Role Restored Successfully");
                $("#sof-delete").click();
                location.reload();

            },
            error: function(){
                console.log("Error Retrieving Transhed Role")
            }
        });
    });



});