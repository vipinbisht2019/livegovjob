<?php  
include_once('include/database.php');

if(isset($_GET['location']) && !empty($_GET['location'] )) {
	
	  $org_location = $_GET['location'];
	  $locality=$org_location;

	  $location=str_replace("-"," ",$locality);
	   $new_locations=$location;	 
} 

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jobs In <?php echo $new_locations; ?> - Jobs Openings In <?php echo $new_locations; ?> – LiveGovJob.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="Find thousands of latest fresher or experienced Jobs Vacancies in <?php echo $new_locations; ?>, check all existing Jobs in <?php echo $new_locations; ?> for many different roles and work positions." />
  <meta name="keywords" content="<?php echo $new_locations; ?> Jobs, Jobs in <?php echo $new_locations; ?>, Latest Jobs in <?php echo $new_locations; ?>, Vacancies in <?php echo $new_locations; ?>, Top Vacancies in <?php echo $new_locations; ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
   
	<link rel="canonical" href="http://localhost/livegovjob/jobs-search/<?php echo $new_locations; ?>">

	<meta property="og:url" content="http://localhost/livegovjob/jobs-search/<?php echo $new_locations; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Jobs In <?php echo $new_locations; ?> - Jobs Openings In <?php echo $new_locations; ?> – LiveGovJob.com">
	<meta property="og:description" content="Find thousands of latest fresher or experienced Jobs Vacancies in <?php echo $new_locations; ?>, check all existing Jobs in <?php echo $new_locations; ?> for many different roles and work positions.">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/favicon.png">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "https://www.livegovjob.com/jobs-search/<?php echo $new_locations; ?>"
}
</script>      
   
   
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<div id="maindiv">
<br>
<div id="tdleft">
<div class="wholeleft">

<h1 class="heading-h1"> Jobs in <?php echo $new_locations; ?> - <?php echo date('F Y'); ?> - <?php echo $new_locations; ?>
 Job Vacancies | Apply Online</h1>
 <?php 
 $jobs_content_location=mysqli_query($con,"select  * from jobs where location='".$new_locations."' ");
 $num_jobs_location=mysqli_num_rows($jobs_content_location);
?>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php  echo $num_jobs_location; ?> Jobs Found</p>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('M j, Y '); echo date('h:i'); ?> IST</p>

<div class="page_desc">Jobs in <?php echo $new_locations; ?>: Search and apply latest Job Vacancies in <?php echo $new_locations; ?> across sectors like Railways, Banking Job for freshers, Universities, Financial Institutions <?php echo date('Y');?>, Defence Job Vacancies in <?php echo $new_locations; ?> <?php echo date('Y');?>, UPSC, College, Teaching Openings, Schools, SSC Vacancy for freshers, Agriculture and many more <?php echo $new_locations; ?> Jobs.
<br><br>
Latest freshers and experienced Jobs Vacancies in <?php echo $new_locations; ?>. Create a Resume and apply to the latest <?php echo $new_locations; ?> Jobs across top companies now. Please read the provided information such as educational qualification, application fees, selection procedure carefully before applying for the Jobs. For all the freshers and experienced professionals looking for jobs vacancies in <?php echo $new_locations; ?>. Livegovjob serves as the one point of access.
</div>

<h2 class="table_title">
Latest Jobs in <?php echo $new_locations; ?> Education Wise Vacancies List Notification <?php echo date('F Y');?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth">Education</th>
<th class="search_wWrapth" style="text-align:center">Vacancies</th>
<th class="search_wWrapth">Apply Link</th>
</tr>
<?php  
$jobs_content1=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary  from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') and location='".$new_locations."' group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

if($num_jobs1 > 0) {
while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible=$jobs_row1['eligible'];
	 $org_eligible=str_replace(" ","-",$eligible);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?></td>

<td class="search_wWraptr text-align-center"><?php echo $jobs_row1['count(job_subcat_id)']; ?> Vacancies</td>

<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>/
<?php echo $locality; ?>" alt="" target="_blank"><u><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?> Jobs in <?php echo $new_locations; ?></u></a></td>
</tr>
<?php  } } ?>
</tbody>
</table>

<h2 class="table_title">
Jobs in <?php  echo $new_locations;  ?>. Latest Vacancies in <?php  echo $new_locations;  ?> updated on <?php echo date('d M Y'); ?> </h2>
<table class="table">
<tbody><tr><th>Company Name</th><th>Job Title</th><th>Eligibility &amp; Location</th><th>Last Date</th></tr>

<?php 
$jobs_content2=mysqli_query($con,"select  *  from jobs where location='".$new_locations."' order by id desc limit 50");
$num_jobs2=mysqli_num_rows($jobs_content2);
while($jobs_row2=mysqli_fetch_array($jobs_content2))
{	 
		$orgDate2 =$jobs_row2['last_date'];
		$newdate2 = str_replace("/","-", $orgDate2);
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php  echo $jobs_row2['link1']; ?>/<?php  echo $jobs_row2['job_subcat_id']; ?>/<?php  echo $jobs_row2['link2']; ?>-<?php  echo $jobs_row2['id']; ?>" 
target="_blank" title="<?php  echo $jobs_row2['company']; ?>"> <?php  echo $jobs_row2['company']; ?> </a></h3></td>

<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php  echo $jobs_row2['post']; ?></td>

<td><div class="divinline pb-7"><span class="mob-only pr-2 fa-ico"><i class="fas fa-graduation-cap mob_nly fa-ico"></i>
</span><?php  echo $jobs_row2['qualification']; ?> - <?php  echo $jobs_row2['location']; ?></div></td>

<td><span class="lstdate"></span><?php  echo $newdate2; ?></td>
</tr>
<?php  } ?>

</tbody>
</table>

<div class="srchlist">
<h2>Education based Jobs in <?php  echo $new_locations; ?> Location</h2>
<?php
$jobs_content3=mysqli_query($con,"select *  from jobs where location='".$new_locations."' group by eligible");
$num_jobs3=mysqli_num_rows($jobs_content3);
if($num_jobs3 > 0) {
while($jobs_row3=mysqli_fetch_array($jobs_content3))
{
		 $eligible=$jobs_row3['eligible'];
	     $org_eligible=str_replace(" ","-",$eligible);
?>
<a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible;  ?>/<?php echo $locality; ?>"><?php echo $jobs_row3['eligible']; ?> Jobs in <?php echo $new_locations; ?></a>

<?php } } else {
		echo '<br><div style="color:#eb1414; font-size:18px;">No Jobs are available. Find below other related jobs.</div><br>';
} ?>

</div>

<h2 style="margin-bottom:3px;font-size:20px;font-weight:700;">Apply Various Job Roles on Livegovjob.com</h2>
<table class="latestDesListTable">
<tbody>
<tr>
<th>Job Role</th> <th>Vacancies</th> <th>Apply Link</th>
</tr>
<?php 
$jobs_content_role=mysqli_query($con,"select count(post),post,eligible  from jobs where post IN ('manager','general manager','assistant','primary teacher','sub inspector','constable','senior engineer','engineer','director')  group by post ");
$num_jobs_role=mysqli_num_rows($jobs_content_role);

while($jobs_row_role=mysqli_fetch_array($jobs_content_role))
{
	$post=$jobs_row_role['post'];
	$org_post=str_replace(" ","-",$post);
?>
<tr>
<td><?php echo $jobs_row_role['post']; ?></td>
<td><?php echo $jobs_row_role['count(post)']; ?></td>
<td><a style="text-decoration:none;" target="_blank" href="http://localhost/livegovjob/search-jobs/role/<?php echo $org_post; ?>-jobs">
<?php echo $jobs_row_role['post']; ?> Jobs <?php echo date('Y'); ?></a></td>
</tr>

<?php } ?>

<tr><td class="thtdtable">View More</td> <td class="thtdtable">1 lakh + vacancies</td> <td class="thtdtable"><a style="text-decoration:none;" target="_blank" href="http://localhost/livegovjob/jobs-by-designation">Jobs By Role</a></td> </tr>

</tbody>
</table> <br>

<div class="catta">Education Wise Job Openings Notification <?php echo date('Y'); ?>-<?php echo date('y')+1; ?></div>
<table class="eduactiontable">
<tbody>
<tr>
<?php  
$jobs_content3=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','mba') group by eligible ");
$num_jobs3=mysqli_num_rows($jobs_content3);

while($jobs_row3=mysqli_fetch_array($jobs_content3))
{
	$eligible=$jobs_row3['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);
?>
<td style="text-transform:capitalize;"><a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>"  target="_blank" class="a_linktag1"><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Pass Govt"; } elseif($eligible == "12th") { echo "12th Pass Govt"; } else { echo $eligible; } ?> Jobs (<?php echo $jobs_row3['count(job_subcat_id)']; ?> Vacancies)</a>
</td>

<?php } ?>

<td style="text-transform:capitalize;"><a style="text-decoration:none;" href="http://localhost/livegovjob/jobs-by-education" target="_blank" class="a_linktag1">View more </a></td>
</tr>

</tbody>
</table> <br>

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
</div> <br>

<div class="bottom_content_wrap">
<h2><b><?php echo $new_locations; ?> Jobs <?php echo date('Y'); ?></b></h2>
<h2><b>Where to find Jobs <?php echo $new_locations; ?>?</b></h2>
<p>Good News for Job Seekers in <?php echo $new_locations; ?> Region! Are you eagerly seeking for Best and High-paying Jobs? Quench your thirst for Golden Job here. Start your good career at Livegovjob. Each and Every Minute, You can discover the Latest Jobs, only at Livegovjob, according to your willingness. Be the First Person to explore it. Frequently check this page to acquire notification on upcoming and latest Jobs in Punein a jiffy.</p>
<h2><b style="color: inherit; font-family: inherit;">Why Livegovjob for Jobs in <?php echo $new_locations; ?> ?</b><br></h2>
<p>Livegovjob is the one stop place where you can discover lakhs of Jobs. Livegovjob grants you the Job notification from 4,000+ Companies across India, which you can't find anywhere else. In this page, All the Job opportunities in Central Government, State Government as well as Top Private Companies in <?php echo $new_locations; ?> region is updated immediately. Livegovjob ensures that all the Jobs get notified to all our visitors. We ensure that none of the Jobs get missed out in our website. We help both fresher and experienced candidates to get Job notification on recent Jobs. Notification on Upcoming Jobs in <?php echo $new_locations; ?> 2019 is also updated in this page immediately.</p>

<h2><b style="color: inherit; font-family: inherit;">Golden Job Opportunities for Candidates</b><br></h2>
<p>For this year and upcoming year, there is huge number of jobs for passed Candidates in Various Government as well as Private sectors like Banking, Railway, Defense, Marketing, Retail, Insurance, Media, Journalism, Finance, Advertising, Manufacturing, Construction and more.<br>This page surely grants you the Best Jobs with High Salary, Good Perks and several great benefits. So grasp it immediately.</p>

<h2><b style="color: inherit; font-family: inherit;">How to find golden Job vacancies in <?php echo $new_locations; ?>?</b><br></h2>
<p>For this year and upcoming year, there is huge number of job opportunities for those who wish to work in <?php echo $new_locations; ?>. Currently, in this region, thousands of Jobs are available in Various Government as well as Top Private sectors like banking, railway, defence, Marketing, Retail, Insurance, Media, Journalism, Finance, Advertising, Manufacturing, Construction and more, which is quickly updated in this page. You can apply to software, BPO, KPO, Manufacturing, automobile, e-commerce, start ups, IT, Logistics, aviation and several other jobs openings in <?php echo $new_locations; ?> <?php echo date('Y'); ?>.</p>

<h2><b style="color: inherit; font-family: inherit;">Where you can Find best Jobs in <?php echo $new_locations; ?> for various Qualifications</b><br></h2>
<p>Here you can search for various education-wise latest Jobs in <?php echo $new_locations; ?>. This page contains Top Jobs for Engineers, Degree Holders, Graduates, Diploma Holders, ITI Holders, PG, MBA, MCA, ME, 10th pass out, 12th pass outs and many more. You can also filter jobs based on your educational qualification. Livegovjob candidates are applying to more than 10,000 such vacancies on a daily basis.</p>

<h2><b style="color: inherit; font-family: inherit;">Do Livegovjob update walk-in Jobs across in <?php echo $new_locations; ?>?</b><br></h2>
<p>Yes, we do. This page also contains all the latest walk-in interview notification for candidates in <?php echo $new_locations; ?>. Every day in this page, you can find huge number of walk-in jobs for various positions at Top companies. From this page, you can choose and apply for the walk-in interview according to your willingness. Candidates who are aspiring to find job openings can apply to all the jobs listed in this page so Job seekers may not miss this fruitful opportunity. This page surely grants you the Best Jobs in <?php echo $new_locations; ?> with High Salary, Good Perks and several great benefits, so grasp it immediately.</p>

<h2><b style="color: inherit; font-family: inherit;">What is all the information bestowed in Livegovjob in <?php echo $new_locations; ?> Jobs page</b><br></h2>
<p>This is the right place for you to gather all the essential information to apply for latest jobs in <?php echo $new_locations; ?>. Livegovjob grants you information like Job description, vacancy, eligibility criteria, salary, educational qualification, application procedure, application fees, selection procedure, last Date for application, interview Dates of all in <?php echo $new_locations; ?> Jobs <?php echo date('Y'); ?>. Links for Job Official Notification, Online Application Form is provided in this page itself, which paves you to apply for the latest Jobs in an easiest way. Moreover furthermore you can discover many Similar Jobs for various streams like 10th, 12th, B.E, B.Tech, M.E, M.Tech, B.Sc, M.Sc, B.Fsc, M.Phil, Ph.D, BCA, B.B.A, MBBS, MS/MD, MCA, B.Com, etc, in various locations like New Delhi, Mumbai, Kolkata, Pune, Noida, Bengaluru and more in this page itself. Prepare for Latest Jobs in <?php echo $new_locations; ?> through Livegovjob Resources In order to attain your dream Job, Livegovjob will help you with its resources like placement papers, Aptitude skill test, Interview questions and answers, Current Affairs, etc. So make use of it and clench your dream Job. Do Something Great and You Can Do That Here!</p>

<h2><b style="color: inherit; font-family: inherit;">How to get Latest Jobs in <?php echo $new_locations; ?> notification in a jiffy in the near future</b><br></h2>
<p>To know immediately about the Latest and upcoming Jobs in <?php echo $new_locations; ?> in the near future, you can subscribe to our Livegovjob Free Job Alert to your Email. Surely you can get instant alerts related to upcoming Jobs <?php echo date('Y'); ?>. New Beginnings, Endless Possibilities. Grow with the world of opportunities @ Livegovjob. Best wishes for all your future ventures.</p>

<p><br></p></div>
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