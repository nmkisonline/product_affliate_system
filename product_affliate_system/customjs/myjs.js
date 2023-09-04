
//Add new categor
$("#add_category").submit(function (event) {
    event.preventDefault();
    // if($('#image').get(0).files.length==0){

    //     swal("Category Image Missing", "Kindly upload an image", "info");
    //          return;
    // }
    
    var ajax_data = new FormData();
    ajax_data.append("func", '1');
    ajax_data.append('category_name',$("#category_name").val());
    
    // ajax_data.append('image', $('#image')[0].files[0]);
    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        processData: false,
        contentType: false,
        data:ajax_data,
        success: function (data) {

            if (data.trim() == "true") {

                swal("", "A new category added successfully!", "success").then((result) => {
                    window.location.href='index';
                });
            } else {
                swal("", "Failed to add category ,try again!", "error");
            }  
        }//succes
    });//ajax
    
});
//add product
$("#add_product").submit(function (event) {

    event.preventDefault();
    $("#add_btn").attr("disabled", true);
    $("#add_btn").html("Please wait..");

    var ajax_data = new FormData();
    ajax_data.append("func", '2');
    ajax_data.append('title',$("#title").val());
    ajax_data.append('price',$("#price").val());
    ajax_data.append('link',$("#link").val());
    ajax_data.append('main_category',$( "#main_category option:selected" ).val());
    ajax_data.append('sub_category',$( "#sub_category option:selected" ).val());
    ajax_data.append('rating',$( "#rating option:selected" ).val());
    ajax_data.append('condition',$( "#condition option:selected" ).val());
    ajax_data.append('description',$("#description").val());
    var product_image = document.getElementById('product_image').files.length;
    if(product_image<=0){

      swal("Product images are missing", "", "info").then((result) => {
               // window.location.reload();
               $("#add_btn").attr("disabled", false);
               $("#add_btn").html("Submit");
               return;

           });

      return;
  }
  
  //add product images
  for (var index = 0; index < product_image; index++) {
      ajax_data.append("product_image[]", document.getElementById('product_image').files[index]);
  }

  $.ajax({
    url: "../serverside/post.php",
    type: "POST",
    processData: false,
    contentType: false,
    data:ajax_data,
    success: function (data) { 
     if (data.trim() == "true") {
        swal("Product added successfully", "", "success").then((result) => {
         window.location.href="products";

     });
    } else {
        swal("", "Failed to add product, try again!", "error");
    }  


    $("#add_btn").attr("disabled", false);
    $("#add_btn").html("Submit");
        }//succes
    });//ajax

});//add product

//delete Product
function deleteProduct(id) {

    swal({
        text: 'Are you sure to delete this product?',
        icon: 'info',
        buttons: true,
        dangerMode: true,
    }).then((result) => {

        if (result) {
            $.ajax({
                url: "../serverside/post.php",
                type: "POST",
                data: {
                    func: 3,
                    product_id: id,
                },
                success: function (data) {

                    if (data.trim() == "true") {
                        swal({
                            icon: 'success',
                            title: 'success',
                            text: 'Product deleted successfully!',
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to delete product!'
                        });
                    }
                }//success
            });//ajax
        }
    });
}//delete product

//update product
$("#edit_product").submit(function (event) {

    event.preventDefault();
    $("#add_btn").attr("disabled", true);
    $("#add_btn").html("Please wait..");

    var ajax_data = new FormData();
    ajax_data.append("func", '4');
    ajax_data.append('product_id',$("#product_id").val());
    ajax_data.append('title',$("#title").val());
    ajax_data.append('price',$("#price").val());
    ajax_data.append('link',$("#link").val());
    ajax_data.append('rating',$( "#rating option:selected" ).val());
    ajax_data.append('main_category',$( "#main_category option:selected" ).val());
    ajax_data.append('sub_category',$( "#sub_category option:selected" ).val());
    ajax_data.append('condition',$( "#condition option:selected" ).val());
    ajax_data.append('description',$("#description").val());

    var product_image = document.getElementById('product_image').files.length;
  //add product images
  for (var index = 0; index < product_image; index++) {
      ajax_data.append("product_image[]", document.getElementById('product_image').files[index]);
  }
  $.ajax({
    url: "../serverside/post.php",
    type: "POST",
    processData: false,
    contentType: false,
    data:ajax_data,
    success: function (data) { 
     if (data.trim() == "true") {
        swal("Product update successfully", "", "success").then((result) => {
         window.location.href="products";

     });
    } else {
        swal("", "Failed to add update, try again!", "error");
    }  


    $("#add_btn").attr("disabled", false);
    $("#add_btn").html("Submit");
        }//succes
    });//ajax

});//update product


//delete Product Image
function deleteProductImage(id) {

    swal({
        text: 'Are you sure to delete this image?',
        icon: 'info',
        buttons: true,
        dangerMode: true,
    }).then((result) => {

        if (result) {
            $.ajax({
                url: "../serverside/post.php",
                type: "POST",
                data: {
                    func: 5,
                    image_id: id,
                },
                success: function (data) {
                    location.reload();
                    // if (data.trim() == "true") {
                    //     swal({
                    //         icon: 'success',
                    //         title: 'success',
                    //         text: 'Product deleted successfully!',
                    //     }).then((result) => {
                    //         location.reload();
                    //     });
                    // } else {
                    //     swal({
                    //         icon: 'error',
                    //         title: 'Oops...',
                    //         text: 'Failed to delete product!'
                    //     });
                    // }
                }//success
            });//ajax
        }
    });
}//delete product

//login
$("#loginUserForm").submit(function (event) {
    event.preventDefault();
    if($("#email").val()==''||$("#pass").val()==''){
        swal("Missing details", "Enter Email and Password,kindly try again", "error");

        return
    }
    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        data: {
            func: 6,
            email: $("#email").val(),
            password: $("#pass").val()
        },
        success: function (data) {
            if (data.trim() == "true") {
               window.location.href = "index";
           }else if(data.trim() == "blocked")
           swal("Blocked", "You are blocked by admin", "error");

           else {
            swal("Invalid details", "Check your email and password!", "error");
        }
    }
});
});



//contact_us_form
$("#contact_us_form").submit(function (event) {
    event.preventDefault();
    
    $.ajax({
        url: "serverside/post.php",
        type: "POST",
        data: {
            func: 7,
            name: $("#name").val(),
            email: $("#email").val(),
            message: $("textarea#message").val()
        },
        success: function (data) {
            if (data.trim() == "true") {
                swal("", "Your feedback submited successfully ", "success").then((result) => {
                 window.location.reload();

             });

            }else {
                swal("", "Failed to submit your feedback", "error");
            }
        }
    });
});



//edit_category
$("#edit_category").submit(function (event) {
    event.preventDefault();
    var ajax_data = new FormData();
    ajax_data.append("func", '8');
    ajax_data.append("category_id", $("#category_id").val());
    ajax_data.append('category_name',$("#category_name").val());
    
    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        processData: false,
        contentType: false,
        data:ajax_data,
        success: function (data) {

            if (data.trim() == "true") {

                swal("", "Category edit successfully!", "success").then((result) => {
                    window.location.href="add-category";
                });
            } else {
                swal("", "Failed to edit category ,try again!", "error");
            }  
        }//succes
    });//ajax
    
});


//delete Category
function deleteCategory(id) {

    swal({
        text: 'All the products of this category are also deleted, Are you sure to delete?',
        icon: 'info',
        buttons: true,
        dangerMode: true,
    }).then((result) => {

        if (result) {
            $.ajax({
                url: "../serverside/post.php",
                type: "POST",
                data: {
                    func: 9,
                    category_id: id,
                },
                success: function (data) {


                    if (data.trim() == "true") {
                        swal({
                            icon: 'success',
                            title: 'success',
                            text: 'Category deleted successfully!',
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to delete category!'
                        });
                    }
                }//success
            });//ajax
        }
    });
}//delete category


//delete Message
function deleteMessage(id) {

    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        data: {
            func: 12,
            message_id: id,
        },
        success: function (data) {


            if (data.trim() == "true") {
                        // swal({
                        //     icon: 'success',
                        //     title: 'success',
                        //     text: 'Category deleted successfully!',
                        // }).then((result) => {
                            location.reload();
                        // });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to delete message!'
                        });
                    }
                }//success
            });//ajax

    
}//delete message

//Add new  sub category
$("#add_sub_category").submit(function (event) {
    event.preventDefault();

    var ajax_data = new FormData();
    ajax_data.append("func", '13');
    ajax_data.append('sub_category',$("#sub_category").val());
    ajax_data.append('main_category',$("#main_category").val());
    
    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        processData: false,
        contentType: false,
        data:ajax_data,
        success: function (data) {

            if (data.trim() == "true") {

                swal("", "Sub Category added successfully!", "success").then((result) => {
                    location.reload();
                });
            } else {
                swal("", "Failed to add sub category ,try again!", "error");
            }  
        }//succes
    });//ajax
    
});

//edit sub category
$("#edit_sub_category").submit(function (event) {
    event.preventDefault();

    var ajax_data = new FormData();
    ajax_data.append("func", '14');
    ajax_data.append('sub_category_id',$("#sub_category_id").val());
    ajax_data.append('sub_category',$("#sub_category").val());
    ajax_data.append('main_category',$("#main_category").val());
    
    $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        processData: false,
        contentType: false,
        data:ajax_data,
        success: function (data) {
            if (data.trim() == "true") {

                swal("", "Sub Category edit successfully!", "success").then((result) => {
                    window.location.href="add-sub-category";
                });
            } else {
                swal("", "Failed to edit sub category ,try again!", "error");
            }  
        }//succes
    });//ajax
    
});//edit category

//delete sub Category
function deleteSubCategory(id) {

    swal({
        text: 'All the products of this category are also deleted, Are you sure to delete?',
        icon: 'info',
        buttons: true,
        dangerMode: true,
    }).then((result) => {

        if (result) {
            $.ajax({
                url: "../serverside/post.php",
                type: "POST",
                data: {
                    func: 15,
                    category_id: id,
                },
                success: function (data) {

                    if (data.trim() == "true") {
                        swal({
                            icon: 'success',
                            title: 'success',
                            text: 'Category deleted successfully!',
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to delete category!'
                        });
                    }
                }//success
            });//ajax
        }
    });
}//delete category
