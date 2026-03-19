<?php

session_start();

include_once('include/database.php');

if(empty($_SESSION['id']))
{
	header('location:index.php');
}

$query_pic_pwd=mysqli_query($con,"select * from admin where id='".$_SESSION['id']."' ");
$row=mysqli_fetch_array($query_pic_pwd);

$image=$row['a_image'];
$pwd= $row['password'];


if(isset($_POST['change_pic_pwd']))
{

	$img=$_FILES['image']['name'];
	$tmpname=$_FILES['image']['tmp_name'];
	$trgt='images/profile_images/';
	
	move_uploaded_file($tmpname,$trgt.$img);
		
		if(empty($img))
		{
			$query=mysqli_query($con, "update admin set a_image='".$image."' where id='".$_SESSION['id']."' ");
		}
		else {
	$query=mysqli_query($con, "update admin set a_image='".$img."' where id='".$_SESSION['id']."' ");
		}
}

if(isset($_POST['edit_password']))
{

	$old_password=base64_encode(base64_encode($_POST['old_password']));
	$new_password=base64_encode(base64_encode($_POST['new_password']));
	$confirm_password=base64_encode(base64_encode($_POST['confirm_password']));
	
	if($old_password != $pwd)
	{ ?>
		<script type='text/javascript'>
	alert('Current password is not Correct!');
		</script>
  <?php 
	}
	else	
		{	
			if($new_password != $confirm_password)
			  { 
		?>
			<script type='text/javascript'>
				alert('Password Doesnot matched!');
			</script>
		<?php
			 }
			else {
				
				$query=mysqli_query($con, "update admin set password='".$confirm_password."' where id='".$_SESSION['id']."' ");
			}			
		}
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
      Edit Profile
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Change profile</li>
	  </ol>
    </section>

<style>

.sp {
 color:red;
}

</style> 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="border-top-color: #fff; "><br>
            
            <!-- form start -->
          
              <div class="box-body">
			  
			  <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Profile pic setting</a></li>
              <li><a href="#tab_2" data-toggle="tab">Password Setting</a></li>         
            </ul>
			
            <div class="tab-content">
              
			  <div class="tab-pane active" id="tab_1">
			   
			   <form class="form-horizontal" name="" method="POST" role="form" enctype="multipart/form-data">
			   
			   <div class="box-body">
			  
				<div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Select Image <span class="sp">*</span></label>
					<div class="col-sm-6">  
						<input type="file" class="form-control" name="image" id="exampleInputFile">           
					</div>				  
                </div>
				               		  
				<div class="col-sm-offset-2 col-sm-10" style="margin-top:10px;">
					<button type="submit" name="change_pic_pwd" class="btn btn-primary">Change Picture</button>
				</div>
			 
              </div>
			   </form>
              
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <form class="form-horizontal" name="" method="POST" role="form">
			   <div class="box-body">
			   
				<div class="form-group">
                  <label class="col-sm-2 control-label">Old Password <span class="sp">*</span></label>
					<div class="col-sm-6"> 
						<input type="text" class="form-control" name="old_password"  required>
					</div>
				</div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">New Password <span class="sp">*</span></label>
					<div class="col-sm-6"> 
						<input type="text" class="form-control" name="new_password"  required>
					</div>
				</div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Confirm Password <span class="sp">*</span></label>
					<div class="col-sm-6"> 
						<input type="text" class="form-control" name="confirm_password"  required>
					</div>
				</div>
			  
				               		  
				<div class="col-sm-offset-2 col-sm-10" style="margin-top:10px;">
					<button type="submit" name="edit_password" class="btn btn-primary">Change Password</button>
				</div>
			 
              </div>
			   </form>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
               
				               		  
				
			 
              </div>
            
		
          </div>
          <!-- /.box -->
        </div>     
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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
