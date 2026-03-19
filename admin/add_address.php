<?php

session_start();

include_once('include/database.php');

if(empty($_SESSION['id']))
{
	header('location:index.php');
}

if(isset($_POST['add_address']))
{
	$name=$_POST['name'];
	$plot_address=$_POST['plot_address'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	
  $query=mysqli_query($con, "insert into address(`name`,`plot_address`,`email`,`phone`)values('".$name."','".$plot_address."','".$email."','".$phone."') ");
   
   header('location:add_address.php');  
} 

if(!empty($_REQUEST['id']))
{
	$query=mysqli_query($con,"delete from address where id='".$_REQUEST['id']."' ");
	
	echo"<script>alert('Data has been deleted!')</script>'";
	echo"<script>window.open('add_address.php','_self')</script>";
	
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
      Add Address
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update Content</a></li>
        <li class="active">Add Address</li>
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
                      <label for="name" class="col-sm-2 control-label">Name <span class="sp">*</span></label>
                    <div class="col-sm-6">
					  <input type="text" class="form-control" name="name" required />
                    </div>
                </div>
				  
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Plot Address <span class="sp">*</span></label>
				  
					<div class="col-sm-6">
                        <textarea id="editor1" name="plot_address" rows="10" cols="40" required> </textarea>
                    </div>
					
				</div>
				
				<div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email <span class="sp">*</span></label>
                    <div class="col-sm-6">
					  <input type="email" class="form-control" name="email" required />
                    </div>
                </div>
				
				<div class="form-group">
                      <label for="phone" class="col-sm-2 control-label">Phone <span class="sp">*</span></label>
                    <div class="col-sm-6">
					  <input type="text" class="form-control" name="phone" maxlength="12" required />
                    </div>
                </div>
				
				 <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="add_address" value="Submit" class="btn btn-primary"/>
                    </div>
                  </div>
				
                </form>
			</div>
			
			
			  <u><h3> View Address </h3></u>
		
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Plot Address</th>
                  <th>Email</th>
                  <th>Phone</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
			   $i=1;
			$query=mysqli_query($con,"select * from address order by id ASC");			   
			while($row=mysqli_fetch_array($query))
			{
			   ?>
			   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['name']; ?> </td>
                  <td><?php echo $row['plot_address']; ?> </td>
                  <td><?php echo $row['email']; ?> </td>
				  <td><?php echo $row['phone']; ?> </td>
				  <td>
		 <a href="?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
				  </td>
                </tr>
			<?php $i++; }  ?>
                
                </tbody>
             </table>
            </div>
            <br><br>
					
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
