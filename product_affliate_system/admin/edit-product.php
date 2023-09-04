<?php

include "../serverside/functions.php";

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    // session isn't started
    session_start();
}
if(isset($_SESSION['user_id'])){

}else{
     //header('Location: sign-in');
    ?>
    <script type="text/javascript">
        window.location.href="login";
    </script>
    <?php
    exit();
}

$func=new Functions();
$categories =$func->getAllCategories();
$products=$func->getSingleProduct($_GET['id']);
$product=$products[0];
$subcategories=$func->getSingleSubCategories($product['sub_category']);
$product_images=$func->getSingleProduct_images($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/css/image.css">
    <title>Edit Product</title>


    <?php include_once "includes/dashboard-links.php"; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!--    <div class="preloader flex-column justify-content-center align-items-center">-->
            <!--        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">-->
            <!--    </div>-->

            <!-- Navbar -->
            <?php include "includes/header.php" ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include "includes/sidebar.php" ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Edit Product</h1>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main row -->
                        <div class="card">
                            <div class="card-body">
                              <form id="edit_product">
                                <input type="hidden" id="product_id" value="<?=$_GET['id']?>" name="">
                                <div class="row">
                                    <div class="col-12 col-sm-6 form-group">
                                        <label for="title">Product title</label>
                                        <input type="text" required class="form-control" id="title" value="<?=$product['title']?>" placeholder="Enter title ">
                                    </div>
                                    <div class="col-12 col-sm-6 form-group">
                                        <label for="link">Product link</label>
                                        <input type="text" required class="form-control" id="link" value="<?=$product['link']?>" placeholder="Enter link">
                                    </div>
                                    

                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4 form-group">
                                        <label for="price">Product price</label>
                                        <input type="text" required class="form-control" id="price" value="<?=$product['price']?>" placeholder="Enter price">
                                    </div>
                                    <div class="col-12 col-sm-4 form-group">
                                        <label for="rating">Product rating</label>
                                        <select class="form-control" id="rating"> 
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select> 
                                    </div>
                                    <div class="col-12 col-sm-4 form-group">
                                        <label for="condition">Product condition</label>
                                        <select class="form-control" id="condition">
                                            <option selected value="New">New</option> 
                                            <option value="Old">Old</option>
                                            

                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-6 form-group">
                                        <label for="main_category">Select Product Category</label>
                                        <select class="form-control" id="main_category">
                                            <?php
                                            foreach($categories as $category){
                                                ?>
                                                <option value="<?=$category['id']?>" ><?=$category['name']?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                      <div class="col-12 col-sm-6 form-group">
                                        <label for="sub_category">Select Sub Category</label>
                                        <select class="form-control" id="sub_category">
                                            <?php
                                            foreach($subcategories as $category1){
                                                ?>
                                                <option value="<?=$category1['id']?>" ><?=$category1['name']?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="description">Product description</label>
                                        <textarea class="form-control" id="description">
                                            <?=$product['description']?>
                                        </textarea>
                                        
                                    </div>

                                </div>
                                <div class="row">
                                   <div class="upload__box ">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                          <p class="mb-0">Upload Product Images</p>
                                          <input type="file" multiple="" id="product_image" data-max_length="20"class="upload__inputfile">
                                      </label>
                                  </div>
                                  <div class="upload__img-wrap"></div>
                              </div>
                          </div>
                          <div class=" my-5 d-flex justify-content-center ">
                            <button type="submit" id="add_btn" class="btn btn-primary btn-lg">
                                Save
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Show product images -->
                    <div class="my-5">
                        <?php
                        if(!empty($product_images)){
                            ?>
                            <h3 class="text-center">Product Images</h3>

                            <div class="d-flex">

                                <?php
                                foreach($product_images as $product_image){ 
                                    ?>
                                    <div  class="col-3">
                                        <img style="height:200px;" src="<?=$product_image['image_path']?>" alt="Product Image">
                                        <br>
                                        <button class=" w-100 btn btn-danger" 
                                        onclick="deleteProductImage(<?=$product_image['id']?>)">Delete</button>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>  
                            <?php
                        }
                        ?>

                    </div>

                </div>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'includes/footer.php' ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<script >
    $( document ).ready(function() {

        $("#usersli").addClass("active");
        $("#userTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
<script type="text/javascript">
 jQuery(document).ready(function () {
  ImgUpload();
});

 function ImgUpload() {

  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    // alert();
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
      }

      if (imgArray.length > maxLength) {
          return false
      } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
          }
      }
      if (len > maxLength) {
        return false;
    } else {
        imgArray.push(f);

        var reader = new FileReader();
        reader.onload = function (e) {
          var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
          imgWrap.append(html);
          iterator++;
      }
      reader.readAsDataURL(f);
  }
}
});
  });
});

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
    }
}
$(this).parent().parent().remove();
});
}
</script>
<script src="customjs/myjs.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#main_category").val('<?=$product['main_category']?>');
        $("#sub_category").val('<?=$product['sub_category']?>');
        $("#rating").val('<?=$product['rating']?>');
        $("#condition").val('<?=$product['condition']?>');
    }); 
</script>
<script>
    document.getElementById('description').innerHTML = document.getElementById('description').innerHTML.trim();
        $("#main_category").change(function(event){
        // alert($("#main_category option:selected").val());

     $.ajax({
        url: "../serverside/post.php",
        type: "POST",
        data: {
            func: 16,
            main_category:$("#main_category option:selected").val(),
        },
        success: function (data) {
            // alert(data);
            var mydata = JSON.parse(data);
            if (data.trim() == "false") {
                swal({
                    icon: 'error',
                    title: 'error',
                    text: 'some error try again with other',
                }).then((result) => {
                    // location.reload();
                });
            }else if(mydata.length==0){
               swal({
                icon: 'info',
                title: '',
                text: 'This main category has no sub category',
            }).then((result) => {
                // location.reload();
            });

        }else {

            $('#sub_category').html('');

            for(let i = 0; i <mydata.length ; i++){
                $('#sub_category').append(`
                    <option value="${mydata[i].id}">${mydata[i].name}</option>
                    `);

            }

        }
        }//success
    });//ajax

 });

</script>
</body>
</html>



