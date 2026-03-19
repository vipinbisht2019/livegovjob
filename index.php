<?php

include_once('include/database.php');

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_meta_keyword['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="<?php echo $row_meta_keyword['description']; ?>" />
  <meta name="keywords" content="<?php echo $row_meta_keyword['keyword']; ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
    <!--indexes -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/indexes.css">
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css">  
   
	<link rel="canonical" href="<?php echo $row_meta_keyword['url']; ?>">

	<meta property="og:url" content="<?php echo $row_meta_keyword['url']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $row_meta_keyword['title']; ?>">
	<meta property="og:description" content="<?php echo $row_meta_keyword['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_meta_keyword['url']; ?>"
}
</script>
   
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<div class="section group maindiv" style="background-color: #ededed;">

<!--<div style="text-align:center;margin-right:auto;margin-left:auto;padding-top:5px;">
<h1>adds</h1>
</div> -->

<div class="container">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12  col-xs-12">

<div class="jobLocSec">
<h2 class="hd2 byLoc" style="border-bottom: 2px #1abc9c solid;">Jobs by Location <a href="http://localhost/livegovjob/jobs-by-location" class="viewall" target="_blank" style="color: #1abc9c;">VIEW ALL</a></h2>
	
<ul style="list-style: none;  width: 100%;  display: inline-block;  font-size: 15px;  margin-bottom: 0; margin-top:12px;  ">
<?php 
$jobs_content=mysqli_query($con,"select  count(location),location,eligible  from jobs 
where location IN ('Guwahati','Kancheepuram','kolkata','pune','new delhi','Hyderabad','bangalore','across india','patna','chandigarh','chennai','indore','bhubaneshwar','lucknow','jaipur','mumbai','ahmedabad','agra')  group by location ");
$num_jobs=mysqli_num_rows($jobs_content);

while($jobs_row=mysqli_fetch_array($jobs_content))
{
	$location=strtolower($jobs_row['location']);
	$org_locations=str_replace(" ","-",$location);	
?>
		
<li><a title="Jobs in <?php echo $jobs_row['location']; ?>" href="http://localhost/livegovjob/jobs-search/<?php echo $org_locations; ?>" target="_blank"><?php echo $jobs_row['location']; ?> (<?php echo $jobs_row['count(location)']; ?>)</a></li>
<?php  } ?>
<li><a title="Jobs By Location" href="http://localhost/livegovjob/jobs-by-location" target="_blank">Other Locations</a></li>
</ul>
</div>

<div class="jobLocSec_two" >
<h2 class="hd2 byLoc" style="border-bottom: 2px #F88C00 solid; ">Top Companies<a href="http://localhost/livegovjob/jobs-by-companies" class="viewall" target="_blank" style="color: #F88C00;">VIEW ALL</a></h2>
<ul>

<?php 
$govt_company_content=mysqli_query($con,"select * from job_sub_category where job_name in ('cbi','ssc','rrb','dda','rbi','Indian Railways','West Bengal Police','KFRI','BOB Financial Solutions','drdo','MEGA') ");
$num_govt_company_content=mysqli_num_rows($govt_company_content);

while($govt_subcat_company_rows=mysqli_fetch_array($govt_company_content))
{
	$job_subcat_ids43=$govt_subcat_company_rows['id'];
	
$govt_jobs_company_content=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids43."' ");
$num_jobs_company_content=mysqli_num_rows($govt_jobs_company_content);
 	
?>
<li><a title="<?php echo $govt_subcat_company_rows['job_name']; ?>"
 href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_company_rows['job_link']; ?>-<?php echo $govt_subcat_company_rows['id']; ?>" target="_blank">
 <?php echo $govt_subcat_company_rows['job_name']; ?> (<?php echo $num_jobs_company_content; ?>)
<!-- <span class= "arrow blink_me" style="font-size: 10px;">New</span> -->
</a>
</li>

<?php } ?>
</ul>
</div>

<div class="jobLocSec_3in1">
<h2 class="hd2 byLoc" style="border-bottom: 2px #e60073 solid; ">Government Jobs<a href="http://localhost/livegovjob/govt-jobs" class="viewall" target="_blank" style="color: #e60073;">VIEW ALL</a></h2>
<ul>
<?php 
$govt_content=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows=mysqli_fetch_array($govt_content))
{
	$job_cat_ids=$govt_rows['id'];

$govt_jobs_content=mysqli_query($con,"select * from jobs where job_cat_id='".$job_cat_ids."' ");
$num_jobs_content=mysqli_num_rows($govt_jobs_content);
?>
<li><a title="<?php echo ucfirst($govt_rows['job_name']); ?>" href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows['job_link']; ?>-<?php echo $govt_rows['id']; ?>" target="_blank"><span style="text-transform:capitalize;"><?php echo $govt_rows['job_name']; ?></span>Jobs (<?php echo $num_jobs_content; ?>)</a></li>
<?php } ?>
</ul>
</div>

<!--<div style="text-align:center;">
	<a href="#"><img class="" src="" alt=""></a>
</div> -->


<div class="jobLocSec">
<h2 class="hd2 byLoc" style="border-bottom: 2px solid #09c;">Jobs by Education<a href="http://localhost/livegovjob/jobs-by-education" class="viewall" style="font-size: 14px; color: #0071bc; text-decoration: none;font-family: roboto,Arial,Helvetica,sans-serif; 
 float: right;" target="_blank">VIEW ALL</a></h2>
<ul>

<?php  
$jobs_content1=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','bca','mca','mba','mtech','bsc','msc') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);	
?>
<li><a title="Jobs in <?php echo $eligible; ?>" href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank">
<?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?> (<?php echo $jobs_row1['count(job_subcat_id)']; ?>)</a></li>

<?php } ?>
</ul>
</div>
<br>
</div>
<br>
<div class="col-lg-3 col-md-3  col-sm-12 col-xs-12" >
<div class="sides1">
<form action="search.php" method="get">
<div class="input-group fl-searchbar" id="fl-searchbar">
<input type="text" class="form-control  bs-autocomplete ui-autocomplete-input" name="term" placeholder="Search" id="fl-search" data-hidden_field_id="city-code" data-item_id="id" data-item_label="value" autocomplete="off">
<div class="input-group-btn">
<button class="btn btn-default" style="outline:none;" type="submit" id="fl-search-btn">
<img src="http://localhost/livegovjob/gallery/search1.png" alt="search1.png" height="25">
</button>
</div>
</div>
</form>

</div>


<div class="sides1">
<table style="padding-top:3px;margin-left:auto;margin-right:auto;">
<tbody>
<tr>
<td style="width:300px;">
<div style="border:1px solid #4b4b4b;padding:10px;color:#fff;background-color:#343437;text-align:center;">
<div>
<h2 style="font-size:20px;color:#fff;font-weight:bold;margin:0;line-height: 1.5em;"> Free Job Alert to your Email </h2>
</div>
<p></p>
<div style="text-align:center;">
<div style="text-align:center;"><input type="submit" class="subtbtn" value="SUBSCRIBE NOW " id="subscribe-card-widget"></div>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div> 

<div class="sides1">
<a href="javascript:void(0);" target="_blank" style="text-decoration:none;"><div class="widgetbutton" style="font-size:17px; text-align:center;">सरकारी नौकरी अब हिंदी में</div></a>
</div> 
<br>

<div class="sides1">
<div class="firstdiv">
<div class="sidebr_widget">
<h2 style="color:#fff;font-family:Arial,Helvetica,sans-serif;margin:0;text-align:center;padding-top:5px;font-size: 18px;">Important Jobs</h2>
<ul class="ullistwidget">

<li class="lilistwidget">
<a href="http://localhost/livegovjob/govt-jobs" target="_blank" title="Government Jobs">Government Jobs </a></li>
<?php $govt_content=mysqli_query($con,"select * from job_category where id in ('1') ");
while($govt_rows=mysqli_fetch_array($govt_content))
{ ?>
<li class="lilistwidget"><a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows['job_link']; ?>-<?php echo $govt_rows['id']; ?>" target="_blank" title="<?php echo $govt_rows['job_name']; ?> Jobs"><span style="text-transform:capitalize;"><?php echo $govt_rows['job_name']; ?></span> Jobs</a></li>
<?php } ?>

<li class="lilistwidget"><a href="http://localhost/livegovjob/free-job-alert" target="_blank" title="Free Job Alert">Free Job Alert</a></li>
<li class="lilistwidget"><a href="http://localhost/livegovjob/job-search" target="_blank" title="Job Search">Job Search</a></li>
<li class="lilistwidget"><a href="http://localhost/livegovjob/sarkari-naukri" target="_blank" title="Sarkari Naukri">Sarkari Naukri</a></li>

<?php 
$govt_subcat_content32=mysqli_query($con,"select * from job_sub_category where job_name in ('cbi','ssc','sbi','dda','rbi','Indian Railways','West Bengal Police','KFRI','bhel','RITES') ");
$num_subcat32=mysqli_num_rows($govt_subcat_content32);

while($govt_subcat_rows32=mysqli_fetch_array($govt_subcat_content32))
{ 	
?>

<li class="lilistwidget"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows32['job_link']; ?>-<?php echo $govt_subcat_rows32['id']; ?>" target="_blank" title="<?php echo $govt_subcat_rows32['job_name']; ?> Recruitment"><?php echo $govt_subcat_rows32['job_name']; ?> Recruitment</a></li>

<?php } ?>
<li class="lilistwidget"><a href="http://localhost/livegovjob/sarkari-results" target="_blank" title="Sarkari Result">Sarkari Result</a></li>
</ul>
</div>
</div>
</div><br>


<div class="sides1 sidebarqq">

<h2 id="popular-tools">Govt Jobs <?php echo date('Y'); ?> by State</h2>
<ul>
<?php 
$state_jobs_content33=mysqli_query($con,"select  * from jobs group by state");
$state_num33=mysqli_num_rows($state_jobs_content33);
while($state_rows33=mysqli_fetch_array($state_jobs_content33))
{
	$state33=$state_rows33['state'];
	$org_state33=str_replace(" ","-",$state33);
?>
<li><a href="http://localhost/livegovjob/govt-jobs-state/<?php echo $org_state33; ?>-government-jobs-recruitment" target="_blank" title="Govt Jobs in <?php  echo $state33; ?>">Govt Jobs in <?php  echo $state33; ?></a></li>

<?php } ?>
</ul>
</div>


<div class="sides1">
<div class="r_widgetrecpage">
<div class="art_wid_headrecpage"><h3>Top Govt Jobs <?php echo date('Y'); ?></h3></div>
<ul class="artcle_widUlrecpage">

<?php 
$govt_subcat_content34=mysqli_query($con,"select * from job_sub_category where job_name in ('cbi','ssc','sbi','rbi','Indian Railways','West Bengal Police','KFRI','bhel','Central Railway','Indian Navy') ");
$num_subcat34=mysqli_num_rows($govt_subcat_content34);

while($govt_subcat_rows34=mysqli_fetch_array($govt_subcat_content34))
{ 	
?>
<li>
<div class="divwhlerecpage"><div class="divlftrecpage">»</div>
 <div class="divrhtrecpage" style="text-align:left;"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows34['job_link']; ?>-<?php echo $govt_subcat_rows34['id']; ?>" target="_blank" title="<?php echo $govt_subcat_rows34['job_name']; ?> Recruitment 
<?php echo date('Y'); ?>"><?php echo $govt_subcat_rows34['job_name']; ?> Recruitment <?php echo date('Y'); ?></a>
 </div>
</div>
</li>
<?php } ?>

</ul>
</div>
</div>

</div>

</div>
<br>
</div>
<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->
</div>

</body>
</html>
