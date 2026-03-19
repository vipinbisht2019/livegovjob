<?php

include_once('include/database.php');

$free_job_alert_content1=mysqli_query($con,"select * from free_job_alert");
$row_free_job_alert_content1=mysqli_fetch_array($free_job_alert_content1);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Free Job Alert - Livegovjob</title>
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

<h1 class="heading-h1"><?php echo $row_free_job_alert_content1['heading']; ?> <?php echo date('Y'); ?></h1>
<div class="page_desc">
<?php // echo $row_free_job_alert_content1['top_paragraph']; 
$org_date=date('Y');
$first_free_job_alert_content=$row_free_job_alert_content1['top_paragraph']; 
$second_free_job_alert_content=str_replace("2020",$org_date,$first_free_job_alert_content);
$third_free_job_alert_content=str_replace("2021",$org_date,$second_free_job_alert_content);
$forth_free_job_alert_content=str_replace("2022",$org_date,$third_free_job_alert_content);
$fifth_free_job_alert_content=str_replace("2023",$org_date,$forth_free_job_alert_content);
$sixth_free_job_alert_content=str_replace("2024",$org_date,$fifth_free_job_alert_content);
$seventh_free_job_alert_content=str_replace("2025",$org_date,$sixth_free_job_alert_content);
$eight_free_job_alert_content=str_replace("2026",$org_date,$seventh_free_job_alert_content);
$free_job_alert_content_row=str_replace("2027",$org_date,$eight_free_job_alert_content);

echo $free_job_alert_content_row;
?>
</div>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">updated: <?php echo date('M j, Y'); ?> <?php echo date('h:i:sa'); ?> </p>

<h2 class="search_wWrapH2">
Free Job Alert <?php echo date('Y'); ?> for latest Government Jobs Vacancies</h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Job Alert</th>
<th class="search_wWrapth text-center">Vacancies</th>
<th class="search_wWrapth text-center">Apply Link</th>
</tr>

<?php  
$jobs_content1=mysqli_query($con,"select  count(eligible),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?> Free Job Alert</td>
<td class="search_wWraptr text-align-center"><?php echo number_format($jobs_row1['count(eligible)']); ?> Vacancies</td>
<td class="search_wWraptr text-align-center"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank"><u><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?> Free Job Alert »</u></a></td>
</tr>
<?php } ?>

</tbody>
</table>
<br>

<div class="table_title">Free Job Alert <?php echo date('Y'); ?> for Upcoming Govt Jobs in India Updated on <?php echo date('d.m.Y'); ?></div>
<table class="table" id="sarkari_table">
<tbody>
<tr><th>Company Name</th><th>Post Title</th><th>Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql= "SELECT count(job_subcat_id),job_subcat_id,id,qualification,location,total_post,post,last_date from jobs  group by job_subcat_id ";
        $result = mysqli_query($con,$total_pages_sql);
		$total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php

$dates=date('d/m/Y');
$jobs_content=mysqli_query($con,"select count(job_subcat_id),job_subcat_id,id,qualification,location,total_post,post,last_date from jobs  group by job_subcat_id  order by id desc LIMIT $offset, $no_of_records_per_page");
$num_jobs=mysqli_num_rows($jobs_content);
 
if( $num_jobs > 0) { 
while($jobs_rows=mysqli_fetch_array($jobs_content))
{
	$job_subcat_id=$jobs_rows['job_subcat_id'];
	 
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where id='".$job_subcat_id."' ");
 $govt_subcat_nums=mysqli_num_rows($govt_subcat_content).' ';

while($govt_subcat_rows=mysqli_fetch_array($govt_subcat_content))
{
		$job_subcat_ids=$govt_subcat_rows['id'];
?>
<tr>
<td>
<a class="table_a" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" target="_blank"><h3 class="table_h3"><?php echo $govt_subcat_rows['job_name']; ?></h3></a>
</td>
<td><i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows['qualification']; ?> - <?php echo $jobs_rows['location']; ?> </td>
<td><span class="lstdate"></span><?php echo $jobs_rows['last_date']; ?></td>
</tr>
<?php }  }  }
	else { echo '<tr> <td colspan="4" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>'; 
	} ?>

</tbody>
</table>

<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/free-job-alert/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/free-job-alert/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/free-job-alert/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/free-job-alert/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>

<div class="bottom_content_wrap">
<?php  
$org_date=date('Y');
$first_free_job_alert_content=$row_free_job_alert_content1['bottom_paragraph']; 
$second_free_job_alert_content=str_replace("2020",$org_date,$first_free_job_alert_content);
$third_free_job_alert_content=str_replace("2021",$org_date,$second_free_job_alert_content);
$forth_free_job_alert_content=str_replace("2022",$org_date,$third_free_job_alert_content);
$fifth_free_job_alert_content=str_replace("2023",$org_date,$forth_free_job_alert_content);
$sixth_free_job_alert_content=str_replace("2024",$org_date,$fifth_free_job_alert_content);
$seventh_free_job_alert_content=str_replace("2025",$org_date,$sixth_free_job_alert_content);
$eight_free_job_alert_content=str_replace("2026",$org_date,$seventh_free_job_alert_content);
$free_job_alert_content_row=str_replace("2027",$org_date,$eight_free_job_alert_content);

echo $free_job_alert_content_row;
?>
</div>
<br>

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

<div class="jobLocSec_3in1">
<h2 class="hd2 byLoc">Jobs by Education<a href="http://localhost/livegovjob/jobs-by-education" class="viewall" target="_blank">VIEW ALL</a></h2>
<ul>

<?php  
$jobs_content3=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','bca','mca','mba','mtech','bsc','msc','ba','ma','mcom') group by eligible ");
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
<style>
#faqq h1 {
	color:#c3554a;
	font-size:19px;
	font-weight:bold;
}
</style>

<div class="bottom_content_wrap" id="faqq">
<?php 
$org_date=date('Y');
$first_free_job_alert_content=$row_free_job_alert_content1['faq_paragraph']; 
$second_free_job_alert_content=str_replace("2020",$org_date,$first_free_job_alert_content);
$third_free_job_alert_content=str_replace("2021",$org_date,$second_free_job_alert_content);
$forth_free_job_alert_content=str_replace("2022",$org_date,$third_free_job_alert_content);
$fifth_free_job_alert_content=str_replace("2023",$org_date,$forth_free_job_alert_content);
$sixth_free_job_alert_content=str_replace("2024",$org_date,$fifth_free_job_alert_content);
$seventh_free_job_alert_content=str_replace("2025",$org_date,$sixth_free_job_alert_content);
$eight_free_job_alert_content=str_replace("2026",$org_date,$seventh_free_job_alert_content);
$free_job_alert_content_row=str_replace("2027",$org_date,$eight_free_job_alert_content);

echo $free_job_alert_content_row;
 ?>
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