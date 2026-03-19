<?php

session_start();

include_once('include/database.php');


if(empty($_SESSION['id']))
{
	header('location:index.php');
}

function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}

if(isset($_POST['add_jobs']))
{
	$menu_id=$_POST['menu_id'];
	$job_cat_id=$_POST['job_cat_id'];
	$job_subcat_id=$_POST['job_subcat_id'];
	$heading_prevs=$_POST['heading_prev'];	
	$heading_prev=str_replace("'","&apos;",$heading_prevs);
	
	$description_prevs=$_POST['description_prev'];
	$description_prev=str_replace("'","&apos;",$description_prevs);
	
	$notification_prevs = $_POST['notification_prev'];
	$notification_prev=str_replace("'","&apos;",$notification_prevs);
	
	$qualification = $_POST['qualification'];
	$eligible = $_POST['eligible'];
	$link1 = $_POST['link1'];
	$link2 = $_POST['link2'];
	$headings=$_POST['heading'];
	$heading=str_replace("'","&apos;",$headings);
	
	
	$last_date = $_POST['last_date'];
	$img_date=str_replace('/','',$last_date);
	
	$img=$_FILES['images']['name'];
	$org_img=str_replace(' ','-',$img);
	$proper_img=$img_date.''.$org_img;
	
	$imageUploadPath ="../gallery/images/jobs_images/".$proper_img; 
    $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif');
		 
	$keywords=$_POST['keywords'];
	$top_paragraphs=$_POST['top_paragraph'];
	$top_paragraph=str_replace("'","&apos;",$top_paragraphs);
	
	$company = $_POST['company'];
	$post = $_POST['post'];
	$total_post = $_POST['total_post'];
	$salary = $_POST['salary'];
	$all_salary= $_POST['all_salary'];
	$state = $_POST['state'];
	$location = $_POST['location'];
	
	$bottom_paragraphs=$_POST['bottom_paragraph'];
	$bottom_paragraph=str_replace("'","&apos;",$bottom_paragraphs);
	
	date_default_timezone_set("Asia/kolkata");
	$date = date('d-m-Y');
	$time=date('h:i');
	
	if(in_array($fileType, $allowTypes)){ 
         
        $imageTemp = $_FILES["images"]["tmp_name"]; 
             
        $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
         
	mysqli_query($con, "insert into jobs(`menu_id`,`job_cat_id`,`job_subcat_id`,`heading_prev`,`description_prev`,
	`notification_prev`,`qualification`,`eligible`,`link1`,`link2`,`heading`,`image`,`keywords`,`top_paragraph`,`company`,
	`post`,`total_post`,`salary`,`all_salary`,`state`,`location`,`last_date`,`bottom_paragraph`,`date`,`time`)values('".$menu_id."','".$job_cat_id."',
	'".$job_subcat_id."','".$heading_prev."',	'".$description_prev."','".$notification_prev."','".$qualification."','".$eligible."',
	'".$link1."','".$link2."','".$heading."','".$proper_img."','".$keywords."','".$top_paragraph."','".$company."','".$post."','".$total_post."',
	'".$salary."','".$all_salary."','".$state."','".$location."','".$last_date."','".$bottom_paragraph."','".$date."','".$time."') ");

	  
  header('location:add_jobs.php');
		}
		else { 
		echo"<script>alert('File is not uploaded!')</script>'";
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
      Add jobs
      </h1>
      <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Jobs</a></li>
        <li class="active">Add Jobs</li>
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
                  <label for="menu_id" class="col-sm-2 control-label">Select Category <span class="sp">*</span></label>
					<div class="col-sm-6">
						<select name="menu_id" class="form-control" required>
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
						<select name="job_cat_id" id="job_category" onchange="job_categoryValue(this.value)" class="form-control" required>
						<option value=""> Select Sub Category</option>
					<?php
						$get_job_category=mysqli_query($con,"select * from job_category");
						while($job_category_row=mysqli_fetch_array($get_job_category))
					{ ?>		  
				  <option value="<?php echo $job_category_row['id']; ?>"> <?php echo $job_category_row['job_name']; ?> </option>		  
					<?php } ?>
				   		</select>
					</div>
                </div>
				
				<div class="form-group">
                  <label for="job_subcat_id" class="col-sm-2 control-label">Select Jobs<span class="sp">*</span></label>
					<div class="col-sm-6">
						<select name="job_subcat_id" id="job_subcategory" class="form-control" required>
							<option value=""> Select Jobs</option>
				    	</select>
					</div>
                </div>
				
				 <div class="form-group">
					<label for="heading prev" class="col-sm-2 control-label">Heading Prev <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="heading_prev" required>
						</div>
				</div>
				
				 <div class="form-group">
					<label for="description prev" class="col-sm-2 control-label">description Prev <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="description_prev" required>
						</div>
				</div>

				<div class="form-group">
					<label for="notification prev" class="col-sm-2 control-label">Notification Prev <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="notification_prev" required>
						</div>
				</div>
				
				
                <div class="form-group">
					<label for="qualification" class="col-sm-2 control-label">Qualification <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="qualification" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="eligible" class="col-sm-2 control-label">Eligible <span class="sp">*</span></label>
						<div class="col-sm-6">
						<select name="eligible" class="form-control" required >
							<option value="" readonly> Select Eligible</option>		  
							<option value="10th">10th</option>
							<option value="12th">12th</option>
							<option value="Any Graduate">Any Graduate</option>
							<option value="ITI">ITI</option>
							<option value="Diploma">Diploma</option>
							<option value="BTech">BTech</option>
							<option value="BA">BA</option>
							<option value="BArch">BArch</option>
							<option value="BCA">BCA</option>
							<option value="BBA">BBA</option>
							<option value="BCOM">BCOM</option>
							<option value="BEd">BEd</option>
							<option value="BDS">BDS</option>
							<option value="BHM">BHM</option>
							<option value="BSC">BSC</option>
							<option value="LLB">LLB</option>
							<option value="MBBS">MBBS</option>
							<option value="BVSC">BVSC</option>
							<option value="BLib">BLib</option>
							<option value="BFSc">BFSc</option>
							<option value="BPEd">BPEd</option>
							<option value="BSW">BSW</option>
							<option value="BAMS">BAMS</option>
							<option value="GNM">GNM</option>
							<option value="BBM">BBM</option>
							<option value="DNB">DNB</option>
							<option value="BUMS">BUMS</option>
							<option value="BPT">BPT</option>
							<option value="BHMS">BHMS</option>
							<option value="BASLP">BASLP</option>	
							<option value="ANM">ANM</option>
							<option value="DPharm">DPharm</option>
							<option value="CA">CA</option>
							<option value="CS">CS</option>
							<option value="ICWA">ICWA</option>
							<option value="LLM">LLM</option>
							<option value="MA">MA</option>
							<option value="MArch">MArch</option>
							<option value="MCOM">MCOM</option>
							<option value="MEd">MEd</option>
							<option value="MPharma">MPharma</option>
							<option value="MSc">MSc</option>
							<option value="MTech">MTech</option>
							<option value="MBA">MBA</option>
							<option value="MCA">MCA</option>
							<option value="MS">MS</option>
							<option value="MVSC">MVSC</option>
							<option value="MPhil">MPhil</option>
							<option value="Mlib">Mlib</option>
							<option value="MD">MD</option>
							<option value="MFSc">MFSc</option>
							<option value="MSW">MSW</option>
							<option value="PGDBA">PGDBA</option>	
							<option value="PGP">PGP</option>
							<option value="MFA">MFA</option>
							<option value="MPH">MPH</option>
							<option value="MPA">MPA</option>
														
						</select>
					</div>
				</div>
								
				<div class="form-group">
					<label for="link1" class="col-sm-2 control-label">Link 1<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="link1" required>
						</div>
				</div>
							  
				<div class="form-group">
					<label for="link2" class="col-sm-2 control-label">Link 2 <span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="link2" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="heading" class="col-sm-2 control-label">Heading<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="heading" required>
						</div>
				</div>
				
				<div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image <span class="sp">*</span></label>
				    <div class="col-sm-6">
					  <input type="file" class="form-control" name="images" id="exampleInputFile" required>                  
					</div>	
				</div>
								
				<div class="form-group">
                  <label for="job_keywords" class="col-sm-2 control-label">Job Keywords <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="keywords" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <label for="top_paragraph" class="col-sm-2 control-label">Top Paragraph <span class="sp">*</span></label>
				  
					<div class="col-sm-6">	
               <textarea class="textarea" name="top_paragraph" rows="10"  style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
				</div>
				
				
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
					<label for="total_post" class="col-sm-2 control-label">Total Post<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="total_post" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="salary" class="col-sm-2 control-label">Salary<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="salary" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="All Salary" class="col-sm-2 control-label">All salary <span class="sp">*</span></label>
						<div class="col-sm-6">
						<select name="all_salary" class="form-control" required>
							<option value="" readonly> Select Salary</option>		  
							<option value="Rs. 5,200 - 63,200">Rs. 5,200 - 63,200 (10th)</option>
							<option value="Rs. 5,200 - 92,300">Rs. 5,200 - 92,300 (12th)</option>
							<option value="Rs. 5,200 - 92,300">Rs. 5,200 - 92,300 (Any Graduate)</option>
							<option value="Rs. 5,200 - 29,200">Rs. 5,200 - 29,200 (ITI)</option>
							<option value="Rs. 5,200 - 35,000">Rs. 5,200 - 35,000 (Diploma)</option>
							<option value="Rs. 15,000 - 1,00,000">Rs. 15,000 - 1,00,000 (BTech)</option>
							<option value="Rs. 5,200 - 64,200">Rs. 5,200 - 64,200 (BA)</option>
							<option value="Rs. 5,200 - 65,200">Rs. 5,200 - 65,200 (BArch)</option>
							<option value="Rs. 5,200 - 66,200">Rs. 5,200 - 66,200 (BCA)</option>
							<option value="Rs. 5,200 - 67,200">Rs. 5,200 - 67,200 (BBA)</option>
							<option value="Rs. 5,200 - 68,200">Rs. 5,200 - 68,200 (BCOM)</option>
							<option value="Rs. 5,200 - 69,200">Rs. 5,200 - 69,200 (BEd)</option>
							<option value="Rs. 5,200 - 70,200">Rs. 5,200 - 70,200 (BDS)</option>
							<option value="Rs. 5,200 - 71,200">Rs. 5,200 - 71,200 (BHM)</option>
							<option value="Rs. 5,200 - 72,200">Rs. 5,200 - 72,200 (BSC)</option>
							<option value="Rs. 5,200 - 73,200">Rs. 5,200 - 73,200 (LLB)</option>
							<option value="Rs. 5,200 - 74,200">Rs. 5,200 - 74,200 (MBBS)</option>
							<option value="Rs. 5,200 - 75,200">Rs. 5,200 - 75,200 (BVSC)</option>
							<option value="Rs. 5,200 - 76,200">Rs. 5,200 - 76,200 (BLib)</option>
							<option value="Rs. 5,200 - 77,200">Rs. 5,200 - 77,200 (BFSc)</option>
							<option value="Rs. 5,200 - 78,200">Rs. 5,200 - 78,200 (BPEd)</option>
							<option value="Rs. 5,200 - 79,200">Rs. 5,200 - 79,200 (BSW)</option>
							<option value="Rs. 5,200 - 80,200">Rs. 5,200 - 80,200 (BAMS)</option>
							<option value="Rs. 5,200 - 81,200">Rs. 5,200 - 81,200 (GNM)</option>
							<option value="Rs. 5,200 - 82,200">Rs. 5,200 - 82,200 (BBM)</option>
							<option value="Rs. 5,200 - 83,200">Rs. 5,200 - 83,200 (DNB)</option>
							<option value="Rs. 5,200 - 84,200">Rs. 5,200 - 84,200 (BUMS)</option>
							<option value="Rs. 5,200 - 85,200">Rs. 5,200 - 85,200 (BPT)</option>
							<option value="Rs. 5,200 - 86,200">Rs. 5,200 - 86,200 (BHMS)</option>
							<option value="Rs. 5,200 -87,200">Rs. 5,200 -87,200 (BASLP)</option>	
							<option value="Rs. 5,200 - 88,200">Rs. 5,200 - 88,200 (ANM)</option>
							<option value="Rs. 5,200 -89,200">Rs. 5,200 -89,200 (DPharm)</option>
							<option value="Rs. 5,200 - 64,300">Rs. 5,200 - 64,300 (CA)</option>
							<option value="Rs. 5,200 - 65,300">Rs. 5,200 - 65,300 (CS)</option>
							<option value="Rs. 5,200 - 66,300">Rs. 5,200 - 66,300 (ICWA)</option>
							<option value="Rs. 5,200 - 67,300">Rs. 5,200 - 67,300 (LLM)</option>
							<option value="Rs. 5,200 - 68,300">Rs. 5,200 - 68,300 (MA)</option>
							<option value="Rs. 5,200 - 69,300">Rs. 5,200 - 69,300 (MArch)</option>
							<option value="Rs. 5,200 - 70,300">Rs. 5,200 - 70,300 (MCOM)</option>
							<option value="Rs. 5,200 - 71,300">Rs. 5,200 - 71,300 (MEd)</option>
							<option value="Rs. 5,200 - 72,300">Rs. 5,200 - 72,300 (MPharma)</option>
							<option value="Rs. 5,200 - 73,300">Rs. 5,200 - 73,300 (MSc)</option>
							<option value="Rs. 5,200 - 74,300">Rs. 5,200 - 74,300 (MTech)</option>
							<option value="Rs. 5,200 - 75,300">Rs. 5,200 - 75,300 (MBA)</option>
							<option value="Rs. 5,200 - 76,300">Rs. 5,200 - 76,300 (MCA)</option>
							<option value="Rs. 5,200 - 77,300">Rs. 5,200 - 77,300 (MS)</option>
							<option value="Rs. 5,200 - 78,300">Rs. 5,200 - 78,300 (MVSC)</option>
							<option value="Rs. 5,200 - 79,300">Rs. 5,200 - 79,300 (MPhil)</option>
							<option value="Rs. 5,200 - 80,300">Rs. 5,200 - 80,300 (Mlib)</option>
							<option value="Rs. 5,200 - 81,300">Rs. 5,200 - 81,300 (MD)</option>
							<option value="Rs. 5,200 - 82,300">Rs. 5,200 - 82,300 (MFSc)</option>
							<option value="Rs. 5,200 - 83,300">Rs. 5,200 - 83,300 (MSW)</option>
							<option value="Rs. 5,200 - 84,300">Rs. 5,200 - 84,300 (PGDBA)</option>	
							<option value="Rs. 5,200 - 85,300">Rs. 5,200 - 85,300 (PGP)</option>
							<option value="Rs. 5,200 - 86,300">Rs. 5,200 - 86,300 (MFA)</option>
							<option value="Rs. 5,200 - 87,300">Rs. 5,200 - 87,300 (MPH)</option>
							<option value="Rs. 5,200 - 88,300">Rs. 5,200 - 88,300 (MPA)</option>
				  
				  		</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="state" class="col-sm-2 control-label">State<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="state" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="location" class="col-sm-2 control-label">Location<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="location" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="last date" class="col-sm-2 control-label">Last Date<span class="sp">*</span></label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="last_date" required>
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
                      <input type="submit" name="add_jobs" value="Add Jobs" class="btn btn-primary"/>
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

function job_categoryValue(val)
{
	$.ajax({
		type:"POST",
		url:"ajax/jobs_ajax.php",
		data:"job_cat_id="+val,
		success: function(data) {
			$("#job_subcategory").html(data);
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
