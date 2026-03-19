<?php

session_start();

include_once('include/database.php');

if(empty($_SESSION['id']))
{
	header('location:index.php');
}


if(!empty($_REQUEST['id']))
{
	$query=mysqli_query($con,"delete from admin where id='".$_REQUEST['id']."' ");
	
	?>
	<script type='text/javascript'>
	alert('Data has been deleted');
	window.location.href="view_profile.php";
	</script>";
<?php
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('include/header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
 
 <?php include('include/left_side_menubar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Profile</a></li>
        <li class="active">View profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Email ID</th>
                  <th>Image</th>
                  <th>mobile</th>
                  <th>Password</th>
                  <th>Utype</th>
                  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
			   $i=1;
			$query=mysqli_query($con,"select * from admin order by id ASC");			   
			while($row=mysqli_fetch_array($query))
			{

			   ?>
			   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['uname']; ?> </td>
				  <td><?php echo $row['email']; ?> </td>
				  <td>
				 <?php 
				 if(empty($row['a_image']))
				 { ?>
				<img src="images/profile_images/non-image.png" height="50">
				<?php  }  else  {  ?>
				 <img src="images/profile_images/<?php echo $row['a_image']; ?>" height="50"> 
				 <?php } ?>
				  </td>
				  <td><?php echo $row['mobile']; ?> 
				  </td>
				  <td><?php echo $row['password']; ?> </td>
				  <td><?php echo $row['utype']; ?> </td>
                  <td>
			<form action="edit_profile.php" method="GET">   
			  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				  <?php if($row['status'] == 1)
				  {	 ?>
				  <button type="submit" class="btn btn-success" name="active" value="active" style="width:70px;">active</button> 
				  <?php } else { ?>
				  <button type="submit" class="btn btn-danger" name="deactive" value="deactive" style="width:70px;">deactive</button> 
				  
				  <?php } ?>
			</form>
				</td>
				  <td>
				  <a href="edit_profile.php?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a> | 
				  <a href="?id=<?php echo $row['id']; ?>" class="btn"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
				  </td>
                </tr>
			<?php $i++; }  ?>
                
                </tbody>
            
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
