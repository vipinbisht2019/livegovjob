<?php  
include_once('include/database.php');

if(isset($_GET['eligible']) && !empty($_GET['eligible'])) {
	
	 $org_eligibles = $_GET['eligible'];
	 
	 $eligibility=$org_eligibles;
	 $eligibless=str_replace("-"," ",$eligibility);
	 
	 $new_eligibles=$eligibless;
	 
	 if( $eligibless == "BTech") 
		{
	  $eligible="B.Tech/B.E"; 
		} 
	elseif($eligibless == "10th") 
		{ 
	   $eligible="10th Pass Govt"; 
		}
	elseif($eligibless == "12th") 
		{ 
	   $eligible="12th Pass Govt"; 
		}
	  else 
		{ 
	   $eligible =$eligibless; 
		}	 
}

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $eligible; ?> Jobs <?php echo date('Y'); ?></title>
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
<div class="wholeleft">
<h1 class="heading-h1"><?php echo $eligible; ?> Jobs <?php echo date('Y'); ?></h1>

<?php
$jobs_content_query=mysqli_query($con,"select * from jobs where eligible='".$new_eligibles."' ");
$num_query=mysqli_num_rows($jobs_content_query);
?>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_query; ?> Jobs Found</p>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('M j, Y '); echo date('h:i'); ?> IST</p>

<div class="page_desc"><?php echo $eligible; ?> Jobs are given here. Aspirants can check <?php echo $eligible; ?> Govt Jobs <?php echo date('Y'); ?> with company name, job title, eligibility, last date, etc. in this page. Candidates who are seeking for <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> can get the latest govt job vacancies for both freshers and experienced. Check this page to know the latest and upcoming <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> instantly. Get <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?>  notifications from Banking, Railway, SSC, UPSC, PSC, PSU, and so on here.<br>
<?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> notification regarding central and state companies & its jobs vacancies across various sectors like Banking, Defence, Railway jobs, Teaching, College, Financial Institutions, Universities & Schools, SSC, UPSC, Agriculture Jobs and many more. Below list contains the current Live <?php echo $eligible; ?> Jobs vacancies across various companies in India.
</div>

<h2 class="search_wWrapH2">Location Wise Govt Vacancies List <?php echo date('Y'); ?>  for <?php echo $eligible; ?> Holders <?php echo date('j.m.Y');?></h2>

<table class="search_wWrap" cellpadding="10">
<tbody>

<?php 
$jobs_content=mysqli_query($con,"select  count(location),location,eligible  from jobs 
where location IN ('Guwahati','Kancheepuram','kolkata','pune','new delhi','chandigarh','mumbai','nainital','jaipur','Hyderabad','bangalore','across india','patna') 
and eligible='".$new_eligibles."' group by location");
$num_jobs=mysqli_num_rows($jobs_content);

if($num_jobs > 0){
?>
<tr>
<th class="search_wWrapth">Education Jobs</th>
<th class="search_wWrapth">Apply Link</th>
</tr>
<?php	
while($jobs_row=mysqli_fetch_array($jobs_content))
{
	$location=$jobs_row['location'];
	$org_location=str_replace(" ","-",$location);
?>
<tr>
<td class="search_wWraptr text-align-left"><?php  echo $new_eligibles;  ?> Jobs In <?php echo $jobs_row['location']; ?> - <?php echo $jobs_row['count(location)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php  $eligibles=str_replace(" ","-",$eligible);  if( $eligibles == "B.Tech/B.E") { echo "BTech"; } elseif($eligibles == "10th-Pass-Govt") { echo "10th" ; } elseif($eligibles == "12th-Pass-Govt") {  echo "12th"; } else { echo $eligibles; }  ?>/<?php echo $org_location; ?>" target="_blank"><u>Apply Here</u></a></td>
</tr>
<?php } }
else { ?>
	<br><div style="color:#eb1414; font-size:18px;">There is no Active Location Wise Govt Vacancies List <?php echo date("Y"); ?> </div>
<?php } ?>
</tbody>
</table>
<br>
<h2 class="table_title">Freshers <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?>. Latest <?php echo $eligible; ?> Job Vacancies on <?php echo date('d-M-Y'); ?> </h2>

<table class="table">
<tbody>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 40;
        $offset = ($pageno-1) * $no_of_records_per_page;

	    $total_pages_sql = "SELECT COUNT(*) FROM jobs where eligible='".$new_eligibles."' ";
        $result = mysqli_query($con,$total_pages_sql);
	    $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php

$jobs_query1=mysqli_query($con,"select * from jobs where eligible='".$new_eligibles."' order by id desc LIMIT $offset, $no_of_records_per_page ");
$num_query1=mysqli_num_rows($jobs_query1);

if($num_query1 > 0)
 { ?>
<tr>
<th>Company Name</th><th>Job Title</th><th>Eligibility &amp; Location</th><th>Last Date</th>
</tr>

<?php
while($num_rows1=mysqli_fetch_array($jobs_query1))
{
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php echo $num_rows1['link1']; ?>/<?php echo $num_rows1['job_subcat_id']; ?>/<?php echo $num_rows1['link2']; ?>-<?php echo $num_rows1['id']; ?>"
 target="_blank" title="<?php echo $num_rows1['company']; ?>"><?php echo $num_rows1['company']; ?></a></h3></td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $num_rows1['post']; ?></td>
<td>
<div class="divinline pb-7"><span class="mob-only pr-2 fa-ico"><i class="fas fa-graduation-cap mob_nly fa-ico"></i></span><?php echo $num_rows1['qualification']; ?> - <?php echo $num_rows1['location']; ?></div>
</td>
<td><span class="lstdate"></span><?php echo $num_rows1['last_date']; ?></td>
</tr>

 <?php } } else {
	 echo '<br><div style="color:#eb1414; font-size:18px;">No Jobs are available. Find below other related jobs.</div>';
 }  ?>
</tbody>
</table>
<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/job-searchs/<?php echo $eligibility ?>/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/job-searchs/<?php echo $eligibility; ?>/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { 
			echo "http://localhost/livegovjob/job-searchs/".$eligibility."/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/job-searchs/<?php echo $eligibility ?>/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>
<br>

<div class="srchlist">
<h2><?php echo $eligible; ?> Jobs in Top Cities India</h2>
<?php 

$jobs_query2=mysqli_query($con,"select * from jobs where eligible='".$new_eligibles."' and location IN ('agra', 'ahemdabad','bhopal','bhubaneshwar','chandigarh','chennai','coachin','coimbatore','dehradun','jaipur','lucknow','mumbai','pune','Guwahati','Kancheepuram','kolkata','pune','new delhi','Hyderabad','bangalore','across india','patna') group by location");
$num_query2=mysqli_num_rows($jobs_query2);
while($num_rows2=mysqli_fetch_array($jobs_query2)) {
	$location=$num_rows2['location'];
	$org_location=str_replace(" ","-",$location);
?>
<a href="http://localhost/livegovjob/job-search/<?php  $eligibles=str_replace(" ","-",$eligible);  if( $eligibles == "B.Tech/B.E") { echo "BTech"; } elseif($eligibles == "10th-Pass-Govt") { echo "10th" ; } elseif($eligibles == "12th-Pass-Govt") {  echo "12th"; } else { echo $eligibles; }  ?>/<?php echo $org_location; ?>" title="<?php echo $eligible; ?> Jobs in <?php echo $num_rows2['location']; ?>"><?php echo $eligible; ?> Jobs
 in <?php echo $num_rows2['location']; ?></a>

<?php  } ?>
</div>
<br>

<div id="jobs_right2" style="width:100%;margin-top:8px;">
<h2 class="article_head">Government Sector related Jobs</h2>
<div class="bdr p10px">

<?php 
$govt_content=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows=mysqli_fetch_array($govt_content))
{
	$job_cat_ids=$govt_rows['id'];

$govt_jobs_content=mysqli_query($con,"select * from jobs where job_cat_id='".$job_cat_ids."' ");
$num_jobs_content=mysqli_num_rows($govt_jobs_content);
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows['job_link']; ?>-<?php echo $govt_rows['id']; ?>" title="<?php echo $govt_rows['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows['job_title']; ?></a>

<?php  } ?>
</div>
</div>
<br>
<div class="bottom_content_wrap">
<h2><b><?php echo $eligible; ?>  Jobs <?php echo date('Y'); ?></b></h2>
<div>Happy Tidings for <?php echo $eligible; ?> passed Job Seekers! Are you eagerly seeking for Best and High-paying Job for your 
qualification? Flourish your Life with good career at Livegovjob. Each and Every Minute, You can get the Latest <?php echo $eligible; ?> Jobs, 
only at Livegovjob.</div><h2><b>Why Livegovjob for <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?>?</b></h2><div>Livegovjob is the one stop place 
where you can discover thousands of <?php echo $eligible; ?> Job opportunities in Central and State Government as well as Top Private Companies 
across various locations in India. Livegovjob grants you the Job notification from 2,000+ Companies across India, which you 
can't find anywhere else.</div><div><br></div><div>Livegovjob ensures that all the <?php echo $eligible; ?> Jobs get notified to all our 
visitors. We ensure that none of the <?php echo $eligible; ?> Jobs get missed out in our website. We help both fresher and experienced candidates 
to get Job notification on recent <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> openings across India. Notification on Upcoming <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> is also 
updated in this page immediately.</div><div><br></div><div>Frequently check this page to acquire upcoming and latest <?php echo $eligible; ?> 
Jobs notification in a jiffy. Be the First Person to explore it.</div><h2><b>Golden Job Opportunities for <?php echo $eligible; ?> Candidates</b>
</h2>
<div>For this year and upcoming year, there is huge number of jobs for <?php echo $eligible; ?> passed Candidates in Various Government as well 
as Private sectors like Banking, Railway, Defense, Marketing, Retail, Insurance, Media, Journalism, Finance, Advertising,
 Manufacturing, Construction and more.</div><div><br></div><div>This page surely grants you the Best <?php echo $eligible; ?> Jobs with 
 High Salary, Good Perks and several great benefits. So grasp it immediately.</div><h2><b><?php echo $eligible; ?> Govt Job Alert in various 
 states, cities across India</b></h2><div>Here you can search for latest <?php echo $eligible; ?> Jobs in all State-wise and Location-wise
 manners. In this page, you can immediately know the new and upcoming <?php echo $eligible; ?> Jobs in various popular cities like New Delhi,
 Mumbai, Kolkata, Pune, Noida, Chennai, Bengaluru, Hyderabad and more. Find the latest <?php echo $eligible; ?> Jobs according to your preferred
 location instantly here.</div><div>Latest Walk-in for <?php echo $eligible; ?> Jobs @ Livegovjob</div><div>This page also contains all 
 the walkin interview notification for <?php echo $eligible; ?> passed candidates across various cities in India. Everyday in this page, you can 
 find huge number of walk-in jobs for various positions at Top companies in India. From this page, you can choose and apply for 
 the walkin interview according to your willingness.</div><h2><b>What are all the information bestowed in Livegovjob - <?php echo $eligible; ?>
 Jobs <?php echo date('Y'); ?>?</b></h2><div>Today's action, Tomorrow's success. This is the right place for you to gather all the essential 
 information to apply for latest <?php echo $eligible; ?> jobs. Livegovjob grants you numerous information like Job description, Total vacancy,
 Eligibility criteria, Salary, Educational qualification, Job Locations, Application procedure, Application fees, Selection 
 procedure, Last Date for application, Interview Dates of all <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?>.</div><div><br></div><div>Links for <?php echo $eligible; ?>
 Jobs Official Notification, Online Application Form is provided in this page itself, which paves you to apply for the latest 
 <?php echo $eligible; ?> Jobs in an easiest way. Moreover furthermore you can discover many Similar Jobs for various streams like 10th, 12th,
 B.E, B.Tech, M.E, M.Tech, B.Sc, M.Sc, B.Fsc, M.Phil, Ph.D, BCA, B.B.A, MBBS, MS/MD, MCA, B.Com, etc, in this page itself.
 </div>
 <h2><b>Prepare for Latest <?php echo $eligible; ?> Jobs through Livegovjob Resources</b></h2>
 <div>In order to attain your dream Job, 
 Livegovjob will help you with its resources like placement papers, Aptitude skill test, Interview questions and answers, 
 Current Affairs, etc. So make use of it and clench your dream Job. Do Something Great and You Can Do That Here!</div>
 <h2><b>How to get Latest <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?> notification in a jiffy in the near future?</b></h2>
 <div>To know immediately about the Latest <?php echo $eligible; ?> Jobs and upcoming <?php echo $eligible; ?> Jobs in the near future, you can subscribe to 
 our Livegovjob Free Job Alert to your Email. Surely you can get instant alerts related to upcoming <?php echo $eligible; ?> Jobs <?php echo date('Y'); ?>. New 
 Beginnings, Endless Possibilities. The future depends on what you do today. Grow with the world of opportunities @ Livegovjob.
 Best wishes for all your future ventures.
</div>
</div>

<?php 
$jobs_query3=mysqli_query($con,"select * from jobs  group by state");
$num_query3=mysqli_num_rows($jobs_query3);
while($num_rows3=mysqli_fetch_array($jobs_query3)) {
	 $states=$num_rows3['state'];

$jobs_query4=mysqli_query($con,"select * from jobs where eligible='".$new_eligibles."' and state='".$states."' group by location ");
 $num_query4=mysqli_num_rows($jobs_query4);

if($num_query4 > 0) { 
?>
<div class="srchlist">
<h2><?php echo $eligible; ?> Jobs in <?php echo $num_rows3['state']; ?></h2>

<?php 
while($num_rows4=mysqli_fetch_array($jobs_query4)) {
	$location=$num_rows4['location'];
	$org_location=str_replace(" ","-",$location);
?>
<a href="http://localhost/livegovjob/job-search/<?php  $eligibles=str_replace(" ","-",$eligible);  if( $eligibles == "B.Tech/B.E") { echo "BTech"; } elseif($eligibles == "10th-Pass-Govt") { echo "10th" ; } elseif($eligibles == "12th-Pass-Govt") {  echo "12th"; } else { echo $eligibles; }  ?>/<?php echo $org_location; ?>" title="<?php echo $eligible; ?> Jobs in <?php echo $num_rows4['location']; ?>"><?php echo $eligible; ?> Jobs in <?php echo $num_rows4['location']; ?></a>

<?php } ?>
</div>
<?php }   }  ?>
<br>

</div>
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>