<?php

include_once('include/database.php');

if(isset($_GET['id'])) {

	$link1 = $_GET['link1']; 
	$job_subcat_id=$_GET['job_subcat_id'];
	 
	$link2 = $_GET['link2'];
	$jobs_id = $_GET['id'];
}

$jobs_content=mysqli_query($con,"select * from jobs where id='".$jobs_id."' ");
$num_jobs=mysqli_num_rows($jobs_content);
$jobs_row=mysqli_fetch_array($jobs_content);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $jobs_row['heading']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="<?php echo strip_tags($row_meta_keyword['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_meta_keyword['keyword']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>  
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<div id="maindiv">
<br>
<div id="tdleft">
<div class="wholeleft" style="padding:0 1px;">

<h1 class="heading-h1"><?php echo $jobs_row['heading']; ?></h1>
<p class="updatedlast">Livegovjob-Online</p>
<p class="updatedlast">Last updated: <?php  $orgdate=$jobs_row['date']; $newDate = date("M j, Y", strtotime($orgdate));  
    echo $newDate; ?> <?php echo $jobs_row['time']; ?> IST </p>
<?php 
if(empty($jobs_row['image']))	
{	?>
<img class="fl_defer_image job_image" id="job_image" src="http://localhost/livegovjob/gallery/images/jobs_images/non-image.jpg" alt="" style="display: block; width: 100%;">
<?php } else { ?>
	
<img class="fl_defer_image job_image" id="job_image" src="http://localhost/livegovjob/gallery/images/jobs_images/<?php echo $jobs_row['image']; ?>" alt="" style="display: block; width: 100%;">
<?php } ?>
<br>
<div class="cmpny-descrip indentDiv" style="font-size:17px;"><?php echo $jobs_row['top_paragraph']; ?></div>

<table class="table tbl_jobs" >
<tbody>
<tr style="display:none;"></tr>
<tr>
<td><strong>Company Name</strong></td>
<td><span style="color: #9874b9;"><?php echo $jobs_row['company']; ?></span></td>
</tr>
<tr>
<td><strong>Post Name </strong></td>
<td> <span style="color:darkgreen;"> <?php echo $jobs_row['post']; ?></span></td>
</tr>
<tr>
<td><strong>No of Posts</strong></td>
<td><?php echo $jobs_row['total_post']; ?> Posts</td>
</tr>
<?php 
	$salary=$jobs_row['salary'];
		if($salary != 'not')
		{
 ?>
<tr>
<td><strong>Salary</strong></td>
<td><?php echo $jobs_row['salary']; ?>/-Per Month</td>
</tr>
<?php } ?>
<tr>
<td><strong>Job Location</strong></td>
<td><?php echo $jobs_row['location']; ?></td>
</tr>
<tr>
<td><strong>Last Date to Apply</strong></td>
<td><?php echo $jobs_row['last_date']; ?></td>
</tr>

</tbody>
</table>

<div class="para1" style="font-size:16px;">
<?php echo $jobs_row['bottom_paragraph'];  ?>
</div>

<div style="text-align:center">
<div>
<h2 style="text-align:left">Similar Jobs</h2>
<?php 
$jobs_content_similar=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_id."' order by id asc ");
$num_jobs_similar=mysqli_num_rows($jobs_content_similar);
while($jobs_row_similar=mysqli_fetch_array($jobs_content_similar))
{
?>
<div class="tcMaindiv">
<div class="tcImagediv">
<img class="fl_defer_image job_image" src="http://localhost/livegovjob/gallery/images/jobs_images/<?php echo $jobs_row_similar['image']; ?>" style="display: block;">

</div>
<div class="tcCntndiv">
<h3 class="tctitle"><a href="http://localhost/livegovjob/job-alert/<?php echo $jobs_row_similar['link1']; ?>/<?php echo $jobs_row_similar['job_subcat_id']; ?>/<?php echo $jobs_row_similar['link2']; ?>-<?php echo $jobs_row_similar['id']; ?>"  target="_blank"><?php echo $jobs_row_similar['heading']; ?></a></h3>
<div class="tcdesc" style="font-size: 16px;"><?php echo $jobs_row_similar['top_paragraph']; ?></div>
</div>
</div>
<?php } ?>
</div>

<div id="jobs_right2" style="width:100%;margin-top:8px;">
<h2 class="article_head">Government Sector related Jobs</h2>
<div class="bdr p10px">

<?php 
$govt_content7=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows7=mysqli_fetch_array($govt_content7))
{
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows7['job_link']; ?>-<?php echo $govt_rows7['id']; ?>" title="<?php echo $govt_rows7['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows7['job_title']; ?></a>
<?php  } ?>
</div>
</div>

<h2 class="search_wWrapH2">Education Wise Govt Job Vacancies <?php echo date('Y'); ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Education &amp; Vacancies</th>
<th class="search_wWrapth" style="text-align:left;">Salary</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>

<?php  
$jobs_content1=mysqli_query($con,"select  count(eligible),eligible,all_salary  from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);
while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Pass Govt"; } elseif($eligible == "12th") { echo "12th Pass Govt"; } else { echo $eligible; } ?> Jobs - <?php echo $jobs_row1['count(eligible)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><?php echo $jobs_row1['all_salary']; ?></td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank"><u>Apply Now</u></a></td>
</tr>
<?php } ?>

</tbody>
</table>
<br>

<div class="jobLocSec_3in1">
<h2 class="hd2 byLoc">Jobs by Designation<a href="http://localhost/livegovjob/jobs-by-designation" class="viewall" target="_blank">VIEW ALL</a></h2>
<ul>
<?php 
$jobs_content2=mysqli_query($con,"select count(post),post,eligible  from jobs where post IN ('manager','general manager','assistant','primary teacher','sub inspector','constable','senior engineer','engineer')  group by post ");
$num_jobs2=mysqli_num_rows($jobs_content2);

while($jobs_row2=mysqli_fetch_array($jobs_content2))
{
	$post2=$jobs_row2['post'];
	$org_post2=str_replace(" ","-",$post2);
?>
<li><a href="http://localhost/livegovjob/search-jobs/role/<?php echo $org_post2; ?>-jobs" target="_blank"><?php echo $jobs_row2['post']; ?> (<?php echo $jobs_row2['count(post)']; ?>)</a></li>
<?php  } ?>
</ul>
</div>

<div class="jobLocSec_3in1">
<h2 class="hd2 byLoc">Jobs by Education<a href="http://localhost/livegovjob/jobs-by-education" class="viewall" target="_blank">VIEW ALL</a></h2>
<ul>
<?php  
$jobs_content3=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','bca','mca','mba','mtech','bsc','msc') group by eligible ");
$num_jobs3=mysqli_num_rows($jobs_content3);

while($jobs_row3=mysqli_fetch_array($jobs_content3))
{
	$eligible3=$jobs_row3['eligible'];
	$org_eligible3=str_replace(" ","-",$eligible3);
?>
<li><a title="Jobs in <?php echo $eligible3; ?>" href="http://localhost/livegovjob/job-search/<?php echo $org_eligible3; ?>" target="_blank"><?php if( $eligible3 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible3 == "10th") { echo "10th"; } elseif($eligible3 == "12th") { echo "12th"; } else { echo $eligible3; } ?> (<?php echo $jobs_row3['count(job_subcat_id)']; ?>)</a></li>

<?php } ?>
</ul>
</div>

<div class="jobLocSec_3in1">
<h2 class="hd2 byLoc">Jobs by Location<a href="http://localhost/livegovjob/jobs-by-location" class="viewall" target="_blank">VIEW ALL</a></h2>
<ul>
<?php 
$jobs_content4=mysqli_query($con,"select  count(location),location,eligible  from jobs 
where location IN ('Guwahati','Kancheepuram','kolkata','pune','new delhi','Hyderabad','bangalore','across india','patna','chandigarh','chennai','indore','bhubaneshwar','lucknow','jaipur','mumbai','ahmedabad','agra')  group by location ");
$num_jobs4=mysqli_num_rows($jobs_content4);

while($jobs_row4=mysqli_fetch_array($jobs_content4))
{
	$location4=$jobs_row4['location'];
	$org_locations4=str_replace(" ","-",$location4);
?>
<li><a title="Jobs in <?php echo $jobs_row4['location']; ?>" href="http://localhost/livegovjob/jobs-search/<?php echo $org_locations4; ?>" target="_blank"><?php echo $jobs_row4['location']; ?> (<?php echo $jobs_row4['count(location)']; ?>)</a></li>

<?php  } ?>
</ul>
</div>
<br>

</div>
</div>
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>
<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->
</body>
</html>