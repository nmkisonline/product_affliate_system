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
$categories=$func->getAllCategories();
$subcategories=$func->getAllSubCategories();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/css/image.css">
    <title>Add Sub Category</title>


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
                                <h1 class="m-0">Add Sub Category</h1>
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
                                <form id="add_sub_category">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 form-group">
                                            <label for="sub_category_name">Select Main Category </label>
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
                                            <label for="sub_category">Enter Sub Category Name</label>
                                            <input type="text" required class="form-control" id="sub_category" placeholder="Enter sub category name">
                                        </div>


                                    </div>


                                    <div class=" my-5 d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            Submit
                                        </button>
                                    </div>       

                                </form>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main row -->
                        <div class="card">
                            <h2 class="card-header">All Sub Categories</h2>

                            <div class="card-body">
                               
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sub Category Name</th>
                                            <th>Main Category Name</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($subcategories as $category){
                                            $maincategory=$func->getSingleCategories($category['main_category']);

                                            ?>

                                            <tr>
                                                <td><?=$category['name']?></td>
                                                <td><?=$maincategory[0]['name']?></td>

                                                <td>
                                                    <!-- id="delbtn" -->
                                                    <a href="edit-sub-category?id=<?=$category['id']?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>

                                                    <button class="btn btn-danger" onclick="deleteSubCategory(<?=$category['id']?>)" ><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></button>
                                                </td>   
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Main Category Name</th>
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

    </script>
    
    <script >
        $( document ).ready(function() {
            $("#add-sub-categoryli").addClass("active");
            $("#userTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
    <script src="customjs/myjs.js"></script>

</body>
</html>

