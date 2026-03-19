<?php 
include_once('include/database.php');

if(isset($_GET['id'])){
	 $private_jobs_id = $_GET['id'];
	 $job_link=$_GET['job_link']; 
} 

$private_jobs_details_query=mysqli_query($con,"select * from private_job where id='".$private_jobs_id."' ");
$private_jobs_details_row=mysqli_fetch_array($private_jobs_details_query);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $private_jobs_details_row['heading']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="gallery/">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="<?php echo strip_tags($row_meta_keyword['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_meta_keyword['keyword']); ?>" />
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
  	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css">
   <!-- job-details -->
    <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/private_jobs_details.css"> 
	
<style>
@media only screen and (max-width: 410px)
#tdleft, .tdleft {
    width: 100%;
}
</style>	
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<div id="maindiv">
<br>
<div id="tdleft">
<div class="ptitle">
<h1 class="ptitleh1" style="font-size: 21px;  margin: 7px 0px;"><?php echo $private_jobs_details_row['heading']; ?>!!!</h1>
<small class="postedOn">Posted On: 
<?php 
$old_date =$private_jobs_details_row['date'];
echo $new_date = date('d M Y', strtotime($old_date));
?>
</small>
</div>

<div class="jobdetails">
<div class="jdwrap">
<div class="jobprof_title">Job Details</div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-bank pico"></i>Company Name</div><div class="jdcont"><?php echo $private_jobs_details_row['comp_name']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-bell pico"></i>Designation</div><div class="jdcont"><?php echo $private_jobs_details_row['designation']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-graduation-cap pico"></i>Education</div><div class="jdcont"><?php echo $private_jobs_details_row['education']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-map-marker pico"></i>Location</div><div class="jdcont"><?php echo $private_jobs_details_row['location']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-calendar pico"></i>Experience</div><div class="jdcont"><?php echo $private_jobs_details_row['experience']; ?></div></div>
<div class="jdrow sal_jdrow"><div class="jdtitle"><i class="fa fa-money pico"></i>Salary</div><div class="jdcont"><?php echo $private_jobs_details_row['salary']; ?></div></div>
</div>
<br>

<div class="jobprof_wrap">
<div class="jobprof_title"><i class="fa fa-suitcase pico"></i>Job Profile:</div>
<div class="jobprof">
<p>
<span style="background-color: rgb(255, 255, 255);"><?php echo $private_jobs_details_row['job_profile']; ?></span></p></div>
</div>
<div class="jdwrap">
<div class="jobprof_title">Other Details</div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-envelope-open pico"></i>Total Vacancies</div><div class="jdcont"><?php echo $private_jobs_details_row['vacancy']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-check-circle pico"></i>Job Type</div><div class="jdcont"><?php echo $private_jobs_details_row['job_type']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-user-circle-o pico"></i>Contact Person</div><div class="jdcont"><?php echo $private_jobs_details_row['contact_person']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-address-card pico"></i>Company Address</div><div class="jdcont"><?php echo $private_jobs_details_row['comp_add']; ?></div></div>
<div class="jdrow"><div class="jdtitle"><i class="fa fa-history pico"></i>Last Date</div><div class="jdcont"><?php echo $private_jobs_details_row['last_date']; ?></div></div>
<div class="jdrow sal_jdrow"><div class="jdtitle"><i class="fa fa-address-card-o pico"></i>Walkin Venue</div><div class="jdcont"><?php echo $private_jobs_details_row['walkin_venue']; ?></div></div>
</div>
</div>

<h2 class="titleh2">Similar Jobs</h2>
<table class="table">
<tbody><tr><th>Company Name</th><th>Job Title</th><th>Eligibility</th><th>Last Date</th></tr>
<?php 
$d=date('d-m-Y');
$private_job_details_content_related=mysqli_query($con,"select * from private_job order by id ASC limit 20");
while($row_private_job_details_related=mysqli_fetch_array($private_job_details_content_related))
 {	
?>
<tr class="jobtr">
<td class="tdcomp">
<a class="acomp" href="http://localhost/livegovjob/private-job-details/<?php echo $row_private_job_details_related['job_link']; ?>-<?php echo $row_private_job_details_related['id']; ?>" target="_blank" title="<?php echo $row_private_job_details_related['comp_name'];  ?>">
<span class="scomp"><h3 class="comph3"><?php echo $row_private_job_details_related['comp_name'];  ?></h3></span>
</a>
</td>
<td class="tdtitle">
<i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details_related['designation'];  ?></td>
<td class="tdqual">
<i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details_related['education'];  ?></td>
<td class="tdlast">
<span class="lstdate"></span><?php echo $row_private_job_details_related['last_date'];  ?></td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
<?php  include("include/rightside_panel2.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>

