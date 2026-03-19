<?php

session_start();

include_once('include/database.php');


if(empty($_SESSION['id']))
{
	header('location:index.php');
}

$update_private_job=mysqli_query($con,"select * from private_job where id='".$_REQUEST['id']."' ");
$row_private_job=mysqli_fetch_array($update_private_job);


if(isset($_POST['edit_private_job']))
{
	$menu_id=$_POST['menu_id'];
	$headings=$_POST['heading'];
	$heading=str_replace("'","&apos;",$headings);
	$job_link=$_POST['job_link'];
	$comp_name=$_POST['comp_name'];
	$designation=$_POST['designation'];
	$education=$_POST['education'];
	$location=$_POST['location'];
	$experience=$_POST['experience'];
	$salary=$_POST['salary'];
	$job_profiles=$_POST['job_profile'];
	$job_profile=str_replace("'","&apos;",$job_profiles);
	
	$vacancy=$_POST['vacancy'];
	$job_type=$_POST['job_type'];
	
	$contact_person=$_POST['contact_person'];
	$comp_adds=$_POST['comp_add'];
	$comp_add=str_replace("'","&apos;",$comp_adds);
	
	$walkin_date=$_POST['walkin_date'];
	
	$walkin_venues=$_POST['walkin_venue'];
	$walkin_venue=str_replace("'","&apos;",$walkin_venues);
	
	$last_date=$_POST['last_date'];
	date_default_timezone_set("Asia/kolkata");
	$date = date('d-m-Y');


	$query=mysqli_query($con,"update private_job set menu_id='".$menu_id."',heading='".$heading."',job_link='".$job_link."',comp_name='".$comp_name."',designation='".$designation."',
	education='".$education."',location='".$location."',experience='".$experience."',salary='".$salary."',job_profile='".$job_profile."',vacancy='".$vacancy."',
	job_type='".$job_type."',contact_person='".$contact_person."',comp_add='".$comp_add."',walkin_date='".$walkin_date."',walkin_venue='".$walkin_venue."',last_date='".$last_date."',
	date='".$date."' where id='".$_REQUEST['id']."' ");
  
  header('location:view_private_job.php');
	
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
      Add Private Job
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Private Job</a></li>
        <li class="active">Add Private Job</li>
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
                  <label for="menu_id" class="col-sm-2 control-label">Select Menu <span class="sp">*</span></label>
					<div class="col-sm-6">
						<select name="menu_id" class="form-control">
					<?php
						$get_menu_category=mysqli_query($con,"select * from menubar where id=5");
						while($menu_row=mysqli_fetch_array($get_menu_category))
					{ ?>
				  
				  <option value="<?php echo $menu_row['id']; ?>" <?php if($menu_row['id']==$row_private_job['menu_id']) echo 'selected'; ?> > <?php echo $menu_row['categories']; ?> </option>
				  
					<?php } ?>
				  		</select>
					</div>
                </div>	
								  
				<div class="form-group">
					<label for="heading" class="col-sm-2 control-label">Heading <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="heading" value="<?php echo $row_private_job['heading']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="job alert link" class="col-sm-2 control-label">Job Link <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="job_link" value="<?php echo $row_private_job['job_link']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="company name" class="col-sm-2 control-label">Company Name <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="comp_name" value="<?php echo $row_private_job['comp_name']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="designation" class="col-sm-2 control-label">Designation<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="designation" value="<?php echo $row_private_job['designation']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="education" class="col-sm-2 control-label">Education<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="education" value="<?php echo $row_private_job['education']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="location" class="col-sm-2 control-label">Location<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="location" value="<?php echo $row_private_job['location']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="experience" class="col-sm-2 control-label">Experience<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="experience" value="<?php echo $row_private_job['experience']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="salary" class="col-sm-2 control-label">Salary<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="salary" value="<?php echo $row_private_job['salary']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="job profile" class="col-sm-2 control-label">Job Profile <span class="sp">*</span></label>
					<div class="col-sm-6">
                        <textarea id="editor1" name="job_profile" rows="10" cols="40" required ><?php echo $row_private_job['job_profile']; ?></textarea>
                    </div>	
				</div>
				
				<div class="form-group">
					<label for="vacancy" class="col-sm-2 control-label">Vacancy<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="vacancy" value="<?php echo $row_private_job['vacancy']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="job type" class="col-sm-2 control-label">Job Type<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="job_type" value="<?php echo $row_private_job['job_type']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="contact person" class="col-sm-2 control-label">Contact Person<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="contact_person" value="<?php echo $row_private_job['contact_person']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="company add" class="col-sm-2 control-label">Company Address <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="comp_add" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_private_job['comp_add']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="walkin date" class="col-sm-2 control-label">Walkin Date<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="walkin_date" value="<?php echo $row_private_job['walkin_date']; ?>" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="walkin venue" class="col-sm-2 control-label">Walkin Venue <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="walkin_venue" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row_private_job['walkin_venue']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="last date" class="col-sm-2 control-label">Last Date<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="last_date" value="<?php echo $row_private_job['last_date']; ?>" required>
						</div>
				</div>
						
				  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="edit_private_job" value="Edit Private Job" class="btn btn-primary"/>
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
