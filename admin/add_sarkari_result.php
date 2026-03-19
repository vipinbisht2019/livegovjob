<?php

session_start();

include_once('include/database.php');


if(empty($_SESSION['id']))
{
	header('location:index.php');
}

if(isset($_POST['add_sarkari_result']))
{
	$company = $_POST['company'];
	$post = $_POST['post'];
	
	$date1 = date('dmY');
	
	$pdf_file=$_FILES['pdf_file']['name'];	
	$org_file=str_replace(' ','-',$pdf_file);
	$proper_file=$date1.''.$org_file;
		
	$tmpname=$_FILES['pdf_file']['tmp_name'];
	$file_type=$_FILES['pdf_file']['type'];
	$file_size=$_FILES['pdf_file']['size'];
	$trgt='../gallery/pdf/sarkari_results/';
	
	move_uploaded_file($tmpname,$trgt.$proper_file);
	
	$category=$_POST['category'];
	$state = $_POST['state'];
	
	$date = date('d-m-Y');
	$time=date('h:i');
	
	if($file_type != "application/pdf" && $file_type != "application/doc") {
      echo "<script> alert('Sorry, Only Pdf & Doc are allowed.')</script>";

	} else {
	$query=mysqli_query($con,"insert into sarkari_results(`company`,`post`,`pdf`,`category`,`state`,`date`,`time`)
	values('".$company."','".$post."','".$proper_file."','".$category."','".$state."','".$date."','".$time."') ");

	header('location:add_sarkari_result.php');
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
  
    <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


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
      Add Sarkari Result
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sarkari Result Content</a></li>
        <li class="active">Add Sarkari Result</li>
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
					<label for="Company" class="col-sm-2 control-label">Company<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="company" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="Post" class="col-sm-2 control-label">Post<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="post" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="Pdf File" class="col-sm-2 control-label">Pdf File <span class="sp">*</span></label>
				    <div class="col-sm-6">
					  <input type="file" class="form-control" name="pdf_file" accept="application/pdf" id="exampleInputFile" required>                  
					</div>	
				</div>	
				
				<div class="form-group">
					<label for="Category" class="col-sm-2 control-label">Category<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="category" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="State" class="col-sm-2 control-label">State <span class="sp">*</span></label>
						<div class="col-sm-6">
						<select name="state" class="form-control" required >
							<option value="" readonly> Select State</option>
							<option value="Andaman And Nicobar Island">Andaman And Nicobar Island</option>
							<option value="Andhra Pradesh">Andhra Pradesh</option>
							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
							<option value="Assam">Assam</option>
							<option value="Bihar">Bihar</option>
							<option value="Chandigarh">Chandigarh</option>
							<option value="Chhattisgarh">Chhattisgarh</option>
							<option value="Dadra And Nagar Haveli">Dadra And Nagar Haveli</option>								
							<option value="Daman And Diu">Daman And Diu</option>
							<option value="Delhi">Delhi</option>
							<option value="Goa">Goa</option>
							<option value="Gujarat">Gujarat</option>
							<option value="Haryana">Haryana</option>
							<option value="Himachal Pradesh">Himachal Pradesh</option>
							<option value="Jammu and Kashmir">Jammu and Kashmir</option>
							<option value="Jharkhand">Jharkhand</option>
							<option value="Karnataka">Karnataka</option>
							<option value="Kerala">Kerala</option>
							<option value="Ladakh">Ladakh</option>
							<option value="Lakshadweep">Lakshadweep</option>
							<option value="Madhya Pradesh">Madhya Pradesh</option>
							<option value="Maharashtra">Maharashtra</option>
							<option value="Manipur">Manipur</option>
							<option value="Meghalaya">Meghalaya</option>
							<option value="Mizoram">Mizoram</option>
							<option value="Nagaland">Nagaland</option>
							<option value="Odisha">Odisha</option>
							<option value="Puducherry">Puducherry</option>
							<option value="Punjab">Punjab</option>
							<option value="Rajasthan">Rajasthan</option>
							<option value="Sikkim">Sikkim</option>
							<option value="Tamil Nadu">Tamil Nadu</option>
							<option value="Telangana">Telangana</option>
							<option value="Tripura">Tripura</option>
							<option value="Uttar Pradesh">Uttar Pradesh</option>
							<option value="Uttarakhand">Uttarakhand</option>
							<option value="West Bengal">West Bengal</option>
														
						</select>
					</div>
				</div>
				
				  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="add_sarkari_result" value="Add sarkari result" class="btn btn-primary"/>
                    </div>
                  </div>
				
              </form>
			</div>	<br><br><br><br><br><br>
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

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


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
