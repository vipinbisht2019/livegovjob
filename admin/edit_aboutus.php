<?php

session_start();

include_once('include/database.php');

if(empty($_SESSION['id']))
{
	header('location:index.php');
}

$update_query=mysqli_query($con,"select * from aboutus where id='".$_REQUEST['id']."' ");
$row=mysqli_fetch_array($update_query);

if(isset($_POST['edit_aboutus']))
{
	$heading=$_POST['heading'];
	$description=$_POST['description'];
	
	date_default_timezone_set("Asia/Calcutta");
	$date = date('d-m-Y');
		
  $query=mysqli_query($con,"update aboutus set heading='".$heading."',description='".$description."',date='".$date."' where id='".$_REQUEST['id']."' ");
	
   echo"<script>alert('Data has Updated Successfully!')</script>'";
   echo"<script>window.open('view_aboutus.php','_self')</script>";
  
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
      Update About Us
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update Content</a></li>
        <li class="active">Update About Us</li>
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
                <form class="form-horizontal" method="POST" role="form">
				
                <div class="form-group">
                      <label for="heading" class="col-sm-2 control-label">Heading <span class="sp">*</span></label>
                    <div class="col-sm-6">
					  <input type="text" class="form-control" name="heading" value="<?php echo $row['heading']; ?>" />
                    </div>
                </div>
				  
				<div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description <span class="sp">*</span></label>
				  
					<div class="col-sm-6">
                        <textarea id="editor1" name="description" rows="10" cols="40"> <?php echo $row['description']; ?> </textarea>
                    </div>
					
				</div>
				
				 <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="edit_aboutus" value="Update About" class="btn btn-primary"/>
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
