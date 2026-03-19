<?php

session_start();

include_once('include/database.php');


if(empty($_SESSION['id']))
{
	header('location:index.php');
}

if(isset($_POST['add_job_sub_category']))
{
	$menu_id=$_POST['menu_id'];
	$job_cat_id=$_POST['job_cat_id'];
	$job_name=$_POST['job_name'];
	$job_title=$_POST['job_title'];
	$headings=$_POST['heading'];
	$heading=str_replace("'","&apos;",$headings);
	$job_link=$_POST['job_link'];
		
	$job_sub_cat_keywords=$_POST['job_sub_cat_keywords'];
	$top_paragraphs=$_POST['top_paragraph'];
	$top_paragraph=str_replace("'","&apos;",$top_paragraphs);
	
	$bottom_paragraphs=$_POST['bottom_paragraph'];
	$bottom_paragraph=str_replace("'","&apos;",$bottom_paragraphs);
	
	date_default_timezone_set("Asia/kolkata");
	$date = date('d-m-Y');
	$time=date('h:i');
	
	$query=mysqli_query($con, "insert into job_sub_category(`menu_id`,`job_cat_id`,`job_name`,`job_title`,`heading`,`job_link`,
	`job_sub_cat_keywords`,`top_paragraph`,`bottom_paragraph`,`date`,`time`)values('".$menu_id."','".$job_cat_id."','".$job_name."',
	'".$job_title."','".$heading."','".$job_link."','".$job_sub_cat_keywords."','".$top_paragraph."',
	'".$bottom_paragraph."','".$date."','".$time."') ");
	  
  header('location:add_job_sub_category.php');
	
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
      Add job Sub Category
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Categories</a></li>
        <li class="active">Add Job Sub Category</li>
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
                  <label for="menu_id" class="col-sm-2 control-label">Select Category <span class="sp">*</span></label>
					<div class="col-sm-6">
						<select name="menu_id" class="form-control" id="menu" onchange="menuValue(this.value)" required>
						<option value=""> Select Category</option>
					<?php
						$get_menu_category=mysqli_query($con,"select * from menubar");
						while($menu_row=mysqli_fetch_array($get_menu_category))
					{ ?>
				  
				  <option value="<?php echo $menu_row['id']; ?>"> <?php echo $menu_row['categories']; ?> </option>
				  
					<?php } ?>
				  		</select>
					</div>
                </div>
				
				<div class="form-group">
                  <label for="job_cat_id" class="col-sm-2 control-label">Select Sub Category <span class="sp">*</span></label>
					<div class="col-sm-6">
						<select name="job_cat_id" id="job_category" class="form-control" required>
							<option value=""> Select Sub Category</option>
				    	</select>
					</div>
                </div>
				
                <div class="form-group">
					<label for="job_name" class="col-sm-2 control-label">Job Name <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="job_name" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="job_title" class="col-sm-2 control-label">Job Title <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="job_title" required>
						</div>
				</div>
				  
				<div class="form-group">
					<label for="heading" class="col-sm-2 control-label">Heading <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="heading" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="job_link" class="col-sm-2 control-label">Job Link <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="job_link" required>
						</div>
				</div>
								
				<div class="form-group">
                  <label for="job_sub_cat_keywords" class="col-sm-2 control-label">Job Sub Category Keywords <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="job_sub_cat_keywords" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <label for="top_paragraph" class="col-sm-2 control-label">Top Paragraph <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="top_paragraph" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
											
				<div class="form-group">
                  <label for="bottom_paragraph" class="col-sm-2 control-label">Bottom Paragraph <span class="sp">*</span></label>
					<div class="col-sm-6">
                        <textarea id="editor1" name="bottom_paragraph" rows="10" cols="40" required > </textarea>
                    </div>	
				</div>
				
				  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="add_job_sub_category" value="Add Job Sub Category" class="btn btn-primary"/>
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

function menuValue(val)
{
	$.ajax({
		type:"POST",
		url:"ajax/job_subcategory_ajax.php",
		data:"menu_id="+val,
		success: function(data) {
			$("#job_category").html(data);
		}
	});
}

</script>

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
