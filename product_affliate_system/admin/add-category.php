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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/css/image.css">
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
                                <form id="add_category">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="modelnumber">Enter Category Name</label>
                                            <input type="text" required class="form-control" id="category_name" placeholder="Enter Category Name">
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
                            <h2 class="card-header">All Categories</h2>

                            <div class="card-body">
                               
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($categories as $category){


                                            ?>

                                            <tr>
                                                <td><?=$category['name']?></td>
                                                <td>
                                                    <!-- id="delbtn" -->
                                                    <a href="edit-category?id=<?=$category['id']?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                                    <button class="btn btn-danger" onclick="deleteCategory(<?=$category['id']?>)" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </td>   
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>

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
            $("#add-categoryli").addClass("active");
            $("#userTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
    <script src="customjs/myjs.js"></script>

</body>
</html>

