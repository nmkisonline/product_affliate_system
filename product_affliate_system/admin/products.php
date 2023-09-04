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
$products=$func->getAllProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

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
                        <h1 class="m-0">Dashboard</h1>
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
                        <h1>products</h1>
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Product Link</th>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th>Price</th>
                                <th>Discription</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($products as $product){
                                    $category=$func->getSingleCategories($product['main_category']);
                                    $subcategory=$func->getSingleSubCategories($product['sub_category']);
                                    
                                    ?>

                                <tr>
                                    <td><?=$product['title']?></td>
                                    <td><?=$product['link']?></td>
                                    <td><?=$category[0]['name']?></td>
                                    <td><?=$subcategory[0]['name']?></td>
                                    
                                    <td><?=$product['price']?></td>
                                    <td><textarea><?=$product['description']?></textarea></td>

                                    <td>
                                        <!-- id="delbtn" -->
                                        <a href="edit-product?id=<?=$product['id']?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <button class="btn btn-danger" onclick="deleteProduct(<?=$product['id']?>)" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>   
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Product Link</th>
                                <th>Product Category</th>
                                <th>Price</th>
                                <th>Discription</th>
                                <th>Actions</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.row (main row) -->
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
        $("#productli").addClass("active");
        $("#userTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
<script type="text/javascript">
    $(document).on('click', '#delbtn', function(e) {
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
    //closeOnCancel: false
  });
     });
</script>

<script src="customjs/myjs.js"></script>

</body>
</html>
