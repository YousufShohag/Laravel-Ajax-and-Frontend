jQuery(document).ready(function(){

    jQuery("#save").on("submit", function(e){
        e.preventDefault();
        var allData = new FormData(this);

        $.ajax({
            url:"/products/storeproducts",
            type:"POST",
            dataType:"JSON",
            data:allData,
            contentType:false,
            processData:false,
            success:function(response){

                if(response.status=="faild"){
                    jQuery(".error_name").text(response.errors.name);
                    jQuery(".error_category_name").text(response.errors.category_name);
                    jQuery(".error_brnad_name").text(response.errors.brnad_name);
                    jQuery(".error_description").text(response.errors.description);
                    jQuery(".error_image").text(response.errors.image);
                    jQuery(".error_status").text(response.errors.status);
                }
                else{
                    jQuery('.msg').html("<div class='alert alert-info' role='alert'>Product save</div>");
                    jQuery('.msg').fadeOut(2000);
                    show();
                    
                }
                
                
            }
        })

    });
    show()
    function show(){
        $.ajax({
            url:'/products/showproducts',
            data:'get',
            dataType:'json',
            success:function(response){
                var sl = 1;
                var data = '';
                $.each(response.data,function(key, item){
                    var status = "";
                    if (item.status==1) {
                        status="<button value="+item.id+" class='status btn btn-info btn-sm'><i class='fas fa-check-circle'></i></button>";
                    }else{
                        status="<button value="+item.id+" class='status btn btn-danger btn-sm'><i class='fas fa-check-circle'></i></button>";
                    }
                    var image = "<img height='100px' src='/backend/product/"+item.image+"' />";
                    data += '<tr>\
                                <td>'+sl+'</td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.category_name+'</td>\
                                <td>'+item.brnad_name+'</td>\
                                <td>'+item.description+'</td>\
                                <td>'+image+'</td>\
                                <td>'+status+'</td>\
                                <td>\
                                <button value='+item.id+' class="btnupdate btn btn-info btn-sm"  data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></button>\
                                <button value='+item.id+' class="btnDelete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>\</td>\
                            </tr>';
                            sl++;
                })
                jQuery(".allData").html(data);
            }
        })
    }


    jQuery(document).on("click",".status",function(){
        var id = jQuery(this).val();
      
        $.ajax({
            url:"/products/statusproducts/"+id,
            type:"get",
            dataType:"JSON",
            
            success:function(response){
                show();
            }
        })

    })

    jQuery(document).on("click",".btnDelete",function(){
        
        var id = jQuery(this).val();
        //alert(id)
        $.ajax({
            url:"/products/deleteproducts/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                jQuery('.msg').html("<div class='alert alert-danger' role='alert'>Data Delete</div>");
                jQuery('.msg').fadeOut(2000);
                show();
            }
        })
    })

    jQuery(document).on("click",".btnupdate", function(){
        var id = jQuery(this).val();
        jQuery(".update").val(id);
        $.ajax({
            url:"/products/updateshowproducts/"+id,
            data:"get",
            dataType:"JSON",
            success:function(response){
                var image = "<img height='100px' src='/backend/product/"+response.data.image+"' />";
                jQuery(".name").val(response.data.name);
                jQuery(".category_name").val(response.data.category_name);
                jQuery(".brnad_name").val(response.data.brnad_name);
                jQuery(".description").val(response.data.description);

                
                // jQuery(".image").val(response.data.image);
                jQuery(".status").val(response.data.status);
                jQuery(".update").val(response.data.id);
                jQuery("#img").html(image);
                //alert(response.data.image);
            }
        })
    })

    jQuery("#updateForm").on("submit", function(e){
        e.preventDefault();
         var id = jQuery(".update").val();
         var updateData = new FormData(this);
    
        $.ajax({
                url:"/products/update/"+id,
                type:"POST",
                dataType:"JSON",
                data:updateData,
                contentType:false,
                processData:false,
            success:function(response){
                jQuery(".modal").hide();
                jQuery(".modal-backdrop").hide();
                show();
            }
        })
    
    })


});