<?php

include_once('include/database.php');

if(isset($_GET['id'])) {
	  $job_subcategory_id = $_GET['id'];
	  $job_subcategory_link = $_GET['job_link'];
}

$job_sub_category_content=mysqli_query($con,"select * from job_sub_category where id='".$job_subcategory_id."' ");
$job_sub_category_row=mysqli_fetch_array($job_sub_category_content);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $job_sub_category_row['heading']; ?></title>
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
<?php 
$govt_jobs_content=mysqli_query($con, "select * from jobs where job_subcat_id='".$job_subcategory_id."' order by id desc");
$num_jobs=mysqli_num_rows($govt_jobs_content);
?>
<h1 class="heading-h1"><?php echo $job_sub_category_row['heading']; ?> Recruitment <?php echo date('Y'); ?></h1>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_jobs; ?> Jobs Found</p>
<div class="page_desc">
<?php 
$org_date=date('Y');
$first_subcat=$job_sub_category_row['top_paragraph']; 
$second_subcat=str_replace("2020",$org_date,$first_subcat);
$third_subcat=str_replace("2021",$org_date,$second_subcat);
$forth_subcat=str_replace("2022",$org_date,$third_subcat);
$fifth_subcat=str_replace("2023",$org_date,$forth_subcat);
$sixth_subcat=str_replace("2024",$org_date,$fifth_subcat);
$seventh_subcat=str_replace("2025",$org_date,$sixth_subcat);
$eight_subcat=str_replace("2026",$org_date,$seventh_subcat);
$site_name=str_replace("2027",$org_date,$eight_subcat);

echo $site_name;

?>


</div>

<?php 
if($num_jobs > 0) { ?>
<h2 class="table_title"><?php echo $num_jobs; ?> Jobs in <?php echo $job_sub_category_row['heading']; ?> Recruitment <?php echo date('Y'); ?></h2>
<?php
while($govt_jobs_rows=mysqli_fetch_array($govt_jobs_content))  {
?>

<div class="jobswrap">
<h2 class="jobswrap_h2"><?php  echo $govt_jobs_rows['heading_prev']; ?></h2>
<div style="font-size: 17px;"><?php  echo $govt_jobs_rows['description_prev']; ?></div>
<table class="jobswrap_tbl">
<tbody><tr><td class="tableth" style="color:#494848;"><?php echo $govt_jobs_rows['notification_prev']; ?></td><td class="tableth" style="color: #494848;">Details</td></tr>
<tr>
	<td><?php  echo $govt_jobs_rows['post']; ?></td>
	<td><?php  echo $govt_jobs_rows['qualification']; ?></td>
</tr>
<tr><td>Job Location</td><td><?php  echo $govt_jobs_rows['location']; ?></td></tr>
<tr><td>Total Vacancies</td><td><?php  echo $govt_jobs_rows['total_post']; ?></td></tr>
<tr><td>Date Added</td><td><?php  $orgdate=$govt_jobs_rows['date']; $newDate = date("d/m/Y", strtotime($orgdate));  
    echo $newDate; ?></td>
</tr>
<tr><td>Last Date to Apply</td><td><?php  echo $govt_jobs_rows['last_date']; ?></td></tr>
</tbody>
</table>
<style>

.sub1 a:hover {
  color: #fff;
  background-color:green;
}

</style>
<div class="btm_btns">
<div class="btmbtn_sub sub1">
<a style="color:#fff;" href="http://localhost/livegovjob/job-alert/<?php echo $govt_jobs_rows['link1']; ?>/<?php echo $job_subcategory_id; ?>/<?php echo $govt_jobs_rows['link2']; ?>-<?php echo $govt_jobs_rows['id']; ?>" class="btm_pbtn pbtn1 hvr-pulse-grow" style="font-size: 15px;" target="_blank">JOB DETAILS</a>
 <a href="javascript:void(0)" style="display:none;" class="btm_pbtn pbtn2 hvr-pulse-grow" style="font-size: 15px;">हिंदी में विवरण
</a>
</div>

</div>
</div>

<?php } } 

else {
   ?><div style="color:#eb1414; font-size:18px;">There is no Active Jobs in <?php echo $job_sub_category_row['heading']; ?> Recruitment <?php echo date('Y'); ?></div>
<?php }	?>

<div>
<h2 class="table_title" style="font-size:23px">Similar Jobs</h2>
<?php
$jobs_content=mysqli_query($con,"select * from jobs  order by id desc limit 25");
$num_jobs=mysqli_num_rows($jobs_content);
  
while($jobs_rows=mysqli_fetch_array($jobs_content))
{
	 $job_subcat_ids= $jobs_rows['job_subcat_id'];
	
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where id='".$job_subcat_ids."' ");
 $govt_subcat_nums=mysqli_num_rows($govt_subcat_content);

while($govt_subcat_rows=mysqli_fetch_array($govt_subcat_content))
{
	 $job_subcat_ids=$govt_subcat_rows['id'];
?>
<div class="tcMaindiv">
<div class="tcImagediv">
<img class="fl_defer_image" src="http://localhost/livegovjob/gallery/images/jobs_images/<?php echo $jobs_rows['image']; ?>" alt="" style="display: block;">

</div>
<div class="tcCntndiv">
<h3 class="tctitle"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" target="_blank"><?php echo $jobs_rows['heading'];  ?></a></h3>
<div class="tcdesc"><?php echo $jobs_rows['top_paragraph']; ?></div>
</div>
</div>
<?php } } ?>
</div>
<br>

<h2 class="search_wWrapH2">Education Wise Govt Job Vacancies</h2>
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
<td class="search_wWraptr text-align-left">
<?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Pass Govt"; } elseif($eligible == "12th") { echo "12th Pass Govt"; } else { echo $eligible; } ?> Jobs - <?php echo $jobs_row1['count(eligible)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><?php echo $jobs_row1['all_salary']; ?></td>

<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank"><u>Apply Now</u></a></td>
</tr>
<?php } ?>
</tbody>
</table>
<br>

<h2 style="font-weight:700;font-size:17px;text-align:left;margin:0.5em 0;color:#5b5959;">Top Trending Jobs</h2>
<table class="cattable" cellpadding="10">
<tbody>

<tr>
<th style="font-size:16px;font-weight:bold;color:white;text-align:center; background-color: #14598A;">
Top Recruitment <?php echo date('Y'); ?></th>
<th style="font-size:16px;font-weight:bold;color:white;text-align:center; background-color: #14598A;">
Vacancies Count</th>
</tr>

<tr>
<?php  
$govt_jobs_query=mysqli_query($con,"select * from jobs where menu_id=1 ");
$govt_jobs_nums2=mysqli_num_rows($govt_jobs_query); 
?>
<td><a href="http://localhost/livegovjob/govt-jobs" target="_blank" class="a_linktag"><u>Central Govt Jobs</u></a></td>
<td><?php echo $govt_jobs_nums2; ?>+ Vacancies</td>
</tr>

<?php 
$job_category_content2=mysqli_query($con,"select * from job_sub_category where job_name in('ccb','rbi','er','mega','dda') ");
$job_num_row2=mysqli_num_rows($job_category_content2);
while($govt_subcat_rows2=mysqli_fetch_array($job_category_content2))
{
	$job_subcat_ids2=$govt_subcat_rows2['id'];
	
$govt_jobs_content2=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids2."' ");
$num_jobs_content2=mysqli_num_rows($govt_jobs_content2);
?>
<tr>
<td>
<a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows2['job_link']; ?>-<?php echo $govt_subcat_rows2['id']; ?>" target="_blank" class="a_linktag">
<u><?php  echo $govt_subcat_rows2['job_name']; ?> Recruitment</u>
</a></td>
<td><?php  echo $num_jobs_content2; ?> Vacancies</td>
</tr>

<?php } ?>
</tbody>
</table>

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

<style>
h1 {
  font-size: 25px;
  color: #c3554a;
}
p {
  font-size:16px; 
}
</style>
<div class="bottoms_para">
<?php
$org_date=date('Y');
$first_subcat = $job_sub_category_row['bottom_paragraph']; 
$second_subcat=str_replace("2020",$org_date,$first_subcat);
$third_subcat=str_replace("2021",$org_date,$second_subcat);
$forth_subcat=str_replace("2022",$org_date,$third_subcat);
$fifth_subcat=str_replace("2023",$org_date,$forth_subcat);
$sixth_subcat=str_replace("2024",$org_date,$fifth_subcat);
$seventh_subcat=str_replace("2025",$org_date,$sixth_subcat);
$eight_subcat=str_replace("2026",$org_date,$seventh_subcat);
$site_name=str_replace("2027",$org_date,$eight_subcat);

echo $site_name;
?>
</div>
<br>
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>