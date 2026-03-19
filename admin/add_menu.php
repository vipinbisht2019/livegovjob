<?php

session_start();

include_once('include/database.php');


if(empty($_SESSION['id']))
{
	header('location:index.php');
}

if(isset($_POST['add_menu']))
{
	$categories=$_POST['categories'];
	$headings=$_POST['heading'];
	$heading=str_replace("'","&apos;",$headings);
	
	$img=$_FILES['image']['name'];
	$tmpname=$_FILES['image']['tmp_name'];
	$trgt='../gallery/images/';
	
	move_uploaded_file($tmpname,$trgt.$img);
	
	$url=$_POST['url'];	
	$title=$_POST['title'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$top_paragraphs=$_POST['top_paragraph'];
	$top_paragraph=str_replace("'","&apos;",$top_paragraphs);
	$bottom_paragraphs=$_POST['bottom_paragraph'];
	$bottom_paragraph=str_replace("'","&apos;",$bottom_paragraphs);
	
	date_default_timezone_set("Asia/kolkata");
	$date = date('d-m-Y');
	$time=date('h:i');
	
	
	
  $query=mysqli_query($con, "insert into menubar(`categories`,`heading`,`image`,`url`,`title`,`keywords`,`description`,`top_paragraph`,`bottom_paragraph`,`date`,`time`)values('".$categories."',
  '".$heading."','".$img."','".$url."','".$title."','".$keywords."','".$description."','".$top_paragraph."','".$bottom_paragraph."','".$date."','".$time."') ");
  
  header('location:add_menu.php');
	
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
      Add Menu
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Menubar</a></li>
        <li class="active">Add Menu</li>
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
					<label for="categories" class="col-sm-2 control-label">Category <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="categories" required />
						</div>
				</div>
				  
				<div class="form-group">
					<label for="heading" class="col-sm-2 control-label">Heading <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="heading" required />
						</div>
				</div>
				
				<div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image <span class="sp">*</span></label>
				    <div class="col-sm-6">
					  <input type="file" class="form-control" name="image" id="exampleInputFile">                  
					</div>	
				</div>
				
				<div class="form-group">
					<label for="url" class="col-sm-2 control-label">Url <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="url" required />
						</div>
				</div>
				
				<div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Title <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="title" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <label for="keywords" class="col-sm-2 control-label">Meta Keywords <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="keywords" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="description" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                      <input type="submit" name="add_menu" value="Add Menu" class="btn btn-primary"/>
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
