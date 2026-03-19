<?php

session_start();

include_once('include/database.php');

if(empty($_SESSION['id']))
{
	header('location:index.php');
}

if(isset($_POST['add_profile']))
{
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=base64_encode(base64_encode($_POST['password']));
	$utype='admin';
	$status=1;
	
	$img=$_FILES['image']['name'];
	$tmpname=$_FILES['image']['tmp_name'];
	$trgt='images/profile_images/';
	
	move_uploaded_file($tmpname,$trgt.$img);
	
  $query=mysqli_query($con, "insert into admin(`uname`,`email`,`a_image`,`mobile`,`password`,`utype`,`status`)values('".$uname."',
  '".$email."','".$img."','".$mobile."','".$password."','".$utype."','".$status."') ");
  
  header('location:add_profile.php');
	
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('include/header.php');?>

  <!-- Left side column. contains the logo and sidebar -->
  
<?php include('include/left_side_menubar.php'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Profile
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Profile</a></li>
        <li class="active">Add profile</li>
	  </ol>
    </section>

    <!-- Main content -->
 <style>

.sp {
	color:red;
}

</style> 
	 <section class="content">
		<div class="row">
        <div class="content container-fluid">
		<div class="box box-primary">
		<div class="box-header">
                <form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
				
                  <div class="form-group">
                      <label for="Name" class="col-sm-2 control-label">User Name <span class="sp">*</span></label>
                    <div class="col-sm-6">
					  <input type="text" class="form-control" name="uname" placeholder="Enter Name" required />
                    </div>
                  </div>
				  
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" placeholder="Enter Heading" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image <span class="sp">*</span></label>
				    <div class="col-sm-6">
					  <input type="file" class="form-control" name="image" id="exampleInputFile">                  
					</div>	
				</div>
								
				<div class="form-group">
                  <label for="moobile" class="col-sm-2 control-label">mobile <span class="sp">*</span></label>	
					<div class="col-sm-6">                
						<input type="text" class="form-control" name="mobile" placeholder="Enter Heading"  maxlength="11" required>
                    </div>
				</div>
				
				<div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password <span class="sp">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="password" placeholder="Enter Password" required>
					</div>
				</div>
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="add_profile" value="add_profile" class="btn btn-primary"/>
                    </div>
                  </div>
				
                </form>
			</div>
			</div>
            <!-- /.tab-content -->
        </div>
        <!-- /.col -->
		</div>
	</section>
	
  </div>
  <!-- /.content-wrapper -->
  
  <?php include('include/footer.php'); ?>
  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>


<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

</body>
</html>
