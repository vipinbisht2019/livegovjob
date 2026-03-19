<?php
include_once('include/database.php');

if(isset($_GET['state']) && !empty($_GET['state'])) {
	
	 $org_states = $_GET['state'];
	 $new_state=$org_states;
	 $statess=str_replace("-"," ",$new_state);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="Govt Jobs in <?php echo $statess; ?>" />
  <meta name="keywords" content="Govt Jobs in <?php echo $statess; ?>" />
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
<div class="wholeleft">
<h1 class="heading-h1">Govt Jobs in <?php echo $statess; ?></h1>
<?php
$jobs_content_state=mysqli_query($con,"select * from jobs where state='".$statess."' ");
$num_query_state=mysqli_num_rows($jobs_content_state); 
?>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_query_state; ?> Jobs Found </p>
<div class="page_desc">Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?>: Get Free notification of all Government Jobs in <?php echo $statess; ?> <?php echo date('F Y'); ?> and its Job vacancies in <?php echo $statess; ?> across sectors like Railways, Banking Job in <?php echo $statess; ?>, Universities, College Govt Jobs, Teaching, Schools in <?php echo $statess; ?> Financial Institutions <?php echo date('Y'); ?>, Defence, UPSC, SSC, Agriculture and many more <?php echo $statess; ?> Government Jobs.<br></div>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Updated: <?php echo date('M d,Y'); ?> 
<?php echo date('h:i:s a') ?></p>

<div class="page_desc"></div>
<h2 style="margin-bottom:3px;font-size:20px; font-weight:700;">Top Government Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> to Apply Online</h2>

<table class="latestDesListTable">
<tbody>
<tr>
<th>Company</th>
<th>Vacancies</th>
<th>Apply Link</th>
</tr>
<?php
$jobs_content=mysqli_query($con,"select count(job_subcat_id),job_subcat_id,id,state from jobs  where  state='".$statess."' group by job_subcat_id  order by id desc limit 30");
$num_jobs=mysqli_num_rows($jobs_content);
 
if( $num_jobs > 0) { 
while($jobs_rows=mysqli_fetch_array($jobs_content)) {
	$job_subcat_id=$jobs_rows['job_subcat_id'];
	 
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where id='".$job_subcat_id."' ");
$govt_subcat_nums=mysqli_num_rows($govt_subcat_content).' ';

while($govt_subcat_rows=mysqli_fetch_array($govt_subcat_content)) {
	 $job_subcat_ids=$govt_subcat_rows['id'];			 
?>
<tr>
<td><?php echo $govt_subcat_rows['job_name'] ?></td>
<td><?php echo $jobs_rows['count(job_subcat_id)']; ?> Vacancies</td>
<td><a style="text-decoration:none;" target="_blank" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" title="<?php echo $govt_subcat_rows['heading'] ?>"><?php echo $govt_subcat_rows['heading'] ?> </a></td>
</tr>
<tr>

<?php } } } 
else { echo '<tr> <td colspan="3" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>';  } ?>
</tbody>
</table>
<br>

<h2 class="search_wWrapH2">Education Wise Govt Job Vacancies <?php echo date('Y') ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Education &amp; Vacancies</th>
<th class="search_wWrapth" style="text-align:left;">Salary</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>
<?php  
$jobs_content1=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary  from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1)) {
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);	
?>
<tr>
<td class="search_wWraptr text-align-left">
<?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Pass Govt"; } elseif($eligible == "12th") { echo "12th Pass Govt"; } else { echo $eligible; } ?> Jobs - <?php echo $jobs_row1['count(job_subcat_id)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><?php echo $jobs_row1['all_salary']; ?></td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank"><u>Apply Now</u></a></td>
</tr>
<?php } ?>
</tbody>
</table>
<br>

<div id="jobs_right2" style="width:100%;margin-top:8px;">
<h2 class="article_head">Government Sector related Jobs</h2>
<div class="bdr p10px">
<?php 
$govt_content_jobs=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows_jobs=mysqli_fetch_array($govt_content_jobs))  {
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows_jobs['job_link']; ?>-<?php echo $govt_rows_jobs['id']; ?>" title="<?php echo $govt_rows_jobs['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows_jobs['job_title']; ?></a>
<?php  } ?>

</div>
</div>
<br>

<h2 class="search_wWrapH2">Latest <?php echo $statess; ?> Govt Jobs Location Wise Vacancies List <?php echo date('F Y'); ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">location</th>
<th class="search_wWrapth" style="text-align:left;">Total vacancies</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>
<?php 
$jobs_query2=mysqli_query($con,"select count(location),location,state from jobs where state='".$statess."' group by location ");
$num_query2=mysqli_num_rows($jobs_query2);

if($num_query2 > 0) {
while($num_rows2=mysqli_fetch_array($jobs_query2)) {
	$location=$num_rows2['location'];
	$org_location=str_replace(" ","-",$location);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php echo $location; ?></td>
<td class="search_wWraptr text-align-left"><?php echo $num_rows2['count(location)']; ?></td>
<td class="search_wWraptr text-align-left">
<a href="http://localhost/livegovjob/jobs-search/<?php echo $org_location; ?>" target="_blank"><u>Jobs in <?php echo $location; ?></u></a>
</td>
</tr>
<?php } } ?>
</tbody>
</table>
<br>

<div class="bottom_content_wrap">
<h2><b><?php echo $statess; ?> Govt Jobs <?php echo date('Y'); ?></b></h2>
<p>Blissful News for Job Seekers in <b><?php echo $statess; ?></b>! Are you longing for a great place to procure <b>Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?></b>. Are you eager to attain high paying Govt Jobs in <?php echo $statess; ?> , From Here, It's Possible. Livegovjob is the most leading resource where you can grab the Best <b>Govt Jobs in <?php echo $statess; ?></b> according to your willingness and qualification. Get it right the first time. Change Your Life, Start your Successful Career Here.</p>

<p>Govt Jobs in <?php echo $statess; ?> for candidates who completed 10th, 12th, ITI, diploma, engineering. Search and apply for <?php echo $statess; ?> Govt Jobs in <?php echo $statess; ?> which are related to your qualification updated on <?php echo date('d-m-Y'); ?>. Newly announced Govt Jobs in <?php echo $statess; ?> first on Livegovjob.com with Job description and eligibility criteria. Below list contains the current Live various Govt Jobs in <?php echo $statess; ?> vacancies across various companies.</p>

<h2><b>What are the opportunities on Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?>?</b></h2>
<p>Every Year <?php echo $statess; ?> recruits thousands of candidates for various state Government departments like Social Welfare, Industries, Human Resources Development, Banking, Railway, Police, Agriculture, Defence, Teaching, Tourism, Transport, Urban Development, Rural Development, Finance sector and much more.</p>

<h2><b>Seize the Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> quickly at Livegovjob</b></h2>
<p>In this page, both Freshers and Experienced Candidates can explore Lakhs of latest Govt Jobs in <?php echo $statess; ?> under various sectors. Notification on Upcoming <?php echo $statess; ?> Govt Jobs in <?php echo $statess; ?> are also updated in this page immediately. In this page, you can accurately grasp all department-wise, Location-wise, Education-wise Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?>. Also You can gather major city-wise Govt Jobs in <?php echo $statess; ?> here.</p>

<p>There are thousands of fruitful opportunities in Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> for Candidates those who pursued Secondary School Certificate (SSC)/ 10th pass, Pre-University Course (PUC) / Intermediate/ 12th pass, Graduation/Degree, Engineering, MBBS, Post Graduation. Frequently check this page to acquire upcoming and latest Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> and Sarkari Result notification in a jiffy. See It First Here and Begin your great career path with Livegovjob.</p>

<h2><b>What are all the information granted in Livegovjob - <?php echo $statess; ?> Govt Jobs <?php echo date('Y'); ?>?</b></h2>
<p>Today action, Tomorrow success. This is the right place for you to gather all the essential information to apply for latest Govt Jobs in <?php echo $statess; ?> . Livegovjob grants you numerous information like Job description, Total vacancy, Eligibility criteria, Salary, Educational qualification, Job Locations, Application procedure, Application fees, Selection procedure, Last Date for application, Interview Dates of all Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?>.</p>
<p>Links for <?php echo $statess; ?> Government Jobs Official Notification, Online Application Form is provided in this page itself, which paves you to apply for the latest Govt Jobs in <?php echo $statess; ?> in an easiest way. Moreover furthermore you can discover many Similar Jobs in various Government sectors in this page itself.</p>

<h2><b>Prepare for Govt Jobs in <?php echo $statess; ?> through Livegovjob Resources</b></h2>
<p>In order to attain <?php echo $statess; ?> Jobs , Livegovjob will help you with its resources like placement papers, Aptitude skill test, Interview questions and answers, Mock Tests, Current Affairs, etc. So make use of it and clench your dream Govt Jobs in <?php echo $statess; ?> .</p>

<h2><b>How to get Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> latest notification in a jiffy in the near future?</b></h2>
<p>To know immediately about the upcoming Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?> in the near future, you can subscribe to our Livegovjob Free Job Alert to your Email. Surely you can get instant alerts related to upcoming Govt Jobs in <?php echo $statess; ?> <?php echo date('Y'); ?>.</p>

</div>
<br>

<h2 class="search_wWrapH2">Latest Govt Jobs <?php echo date('Y'); ?> Vacancies List </h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Govt Jobs</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>
<?php  
$jobs_content8=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','mba','bsc') group by eligible ");
$num_jobs8=mysqli_num_rows($jobs_content8);

while($jobs_row8=mysqli_fetch_array($jobs_content8))
{
	$eligible8=$jobs_row8['eligible'];
	$org_eligible8=str_replace(" ","-",$eligible8);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible8 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible8 == "10th") { echo "10th"; } elseif($eligible8 == "12th") { echo "12th"; } else { echo $eligible8; } ?> - <?php echo $jobs_row8['count(job_subcat_id)']; ?> Vacancies</td>

<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible8; ?>" target="_blank">
<u><?php if( $eligible8 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible8 == "10th") { echo "10th Pass Govt"; } elseif($eligible8 == "12th") { echo "12th Pass Govt"; } else { echo $eligible8; } ?> Jobs</u></a></td>
</tr>

<?php } ?>

</tbody>
</table>
<br>
<style>
.bt_wrap h2 {
color:black;	
}
</style>
<div class="bottom_content_wrap bt_wrap">
<h2 style="color:#c3554a;">Govt Jobs in <?php echo $statess; ?> - FAQ</h2>
<h2>Q1. Is the <?php echo $statess; ?> Govt Jobs page in Livegovjob daily updated?</h2>
<p>Yes, <?php echo $statess; ?> Govt Jobs page in Livegovjob gets updated on a daily basis. Jobs seekers can get latest govt job notifications for all openings in various sectors. Job seekers can view the latest jobs which are updated on the <?php echo $statess; ?> Govt Jobs instantly.</p>

<h2>Q2. What are the important details which are available for Govt Jobs in <?php echo $statess; ?> in Livegovjob?</h2>
<p>Govt Jobs in <?php echo $statess; ?> in Livegovjob provides the govt job details with the company name, post name and the eligibility with latest date to apply details .Job seekers can make use of this Govt Jobs page to find state and central government jobs by category, education, board, location, experience, qualification, etc., and this page lists out the latest job openings from state, central, railway, bank, PSU, SSC, UPSC, Army, Navy, Defence, and jobs.</p>

<h2>Q3. Why Govt Jobs in <?php echo $statess; ?> Livegovjob for New Government Jobs <?php echo date('Y'); ?>?</h2>
<p>Govt Jobs in <?php echo $statess; ?> in Livegovjob provides Govt Jobs across various industries and sectors Livegovjob Govt Jobs page lists out the Government jobs openings for both freshers and experienced candidates.</p>

<h2>Q4. Are all Important Active Govt Jobs available on Govt Jobs in <?php echo $statess; ?> ?</h2>
<p>Yes, all the Important Active Govt Jobs available on Govt Jobs in <?php echo $statess; ?>  are available designation wise and candidates can check the available jobs for competitive examinations like UPSC, RRB NTPC, IBPS PO &amp; Clerk, SBI PO &amp; Clerk, SSC CGL, RBI Grade B, LIC AAO, TET.</p>

<h2>Q5. Are all the designation related jobs available for <?php echo $statess; ?> Govt Jobs in Livegovjob?</h2>
<p>Yes, all the designation related jobs are available for <?php echo $statess; ?> Govt Jobs. Once you subscribe to our Livegovjob free job alert, you will receive the latest government job notifications.</p>
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