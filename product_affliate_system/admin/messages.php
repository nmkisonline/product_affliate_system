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
$messages=$func->getAllMessages();

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
                        <h1>Messages</h1>
                        <table id="userTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($messages as $message){
                                   ?>

                                <tr>
                                    <td><?=$message['name']?></td>
                                    <td><?=$message['email']?></td>
                                    <td><textarea><?=$message['message']?></textarea></td>

                                    <td>
                                        
                                        <button class="btn btn-danger" onclick="deleteMessage(<?=$message['id']?>)" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>   
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
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
         $("#messageli").addClass("active");
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
