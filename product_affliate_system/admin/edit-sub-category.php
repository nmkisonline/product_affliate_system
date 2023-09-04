
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
$category=$func->getSingleSubCategories($_GET['id']);
$category=$category[0];
$categories=$func->getAllCategories();

?>
<!DOCTYPE html>a
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dist/css/image.css">
	<title>Edit Sub Category</title>


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
								<h1 class="m-0">Edit Sub Category</h1>
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
								<form id="edit_sub_category">
									<input type="hidden" id="sub_category_id" value="<?=$category['id']?>" name="">
									<div class="row">
									<div class="col-12 col-sm-6 form-group">
										<label for="sub_category_name">Select Main Category </label>
										<select class="form-control" id="main_category">
											<?php
											foreach($categories as $category1){
												?>
												<option value="<?=$category1['id']?>" ><?=$category1['name']?></option>
												<?php 
											}
											?>
										</select>

									</div>
									<div class="col-12 col-sm-6 form-group">
										<label for="sub_category">Enter Sub Category Name</label>
										<input type="text" value="<?=$category['name']?>" required class="form-control" id="sub_category" placeholder="Enter sub category name">
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
<!-- <script src="customjs/myjs.js"></script> -->
<script type="text/javascript">
        $("#main_category").val('<?=$category['main_category']?>');

</script>
</body>
</html>