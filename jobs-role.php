<?php  

include_once('include/database.php');

if(isset($_GET['role']) && !empty($_GET['role'])) {
	
	$org_roles = $_GET['role'];
	$new_role=$org_roles;
	 
	$imp_role=str_replace("-"," ",$new_role);
	$main_role=$imp_role;	 
} 

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $main_role; ?> Jobs <?php echo date('Y'); ?></title>
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
<h1 class="heading-h1"><?php echo $main_role; ?> Jobs</h1>
<?php
$jobs_content_query=mysqli_query($con,"select * from jobs where post='".$main_role."' order by id desc ");
$num_query=mysqli_num_rows($jobs_content_query);
?>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php  echo $num_query; ?> Jobs Found</p>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('M j, Y '); echo date('h:i'); ?> IST</p>

<div class="page_desc"><?php echo $main_role; ?> Jobs <?php echo date('Y'); ?> Apply online <?php echo $main_role; ?> Vacancy for Freshers and Experienced across India on <?php echo date('d F Y');?>. Upload your resume and subscribe to <?php echo $main_role; ?> <?php echo date('Y'); ?> Vacancy to know immediately about the latest <?php echo $main_role; ?> Jobs notification from Livegovjob. Find Newly announced <?php echo $main_role; ?> Job Vacancies <?php echo date('Y'); ?> across India first on Livegovjob.
</div>

<h2 class="table_title"><?php  echo $num_query; ?> <?php echo $main_role; ?> Job Vacancies <?php echo date('Y'); ?> updated <?php echo date('F d,Y');?></h2>

<?php  if($num_query > 0) {  ?>

<table class="table">
<tbody>
<tr><th>Job Title</th><th>Company name</th><th>Eligibility</th><th>Last Date</th></tr>
<?php
while($jobs_content_row1=mysqli_fetch_array($jobs_content_query))
{
		$orgDate =$jobs_content_row1['last_date'];
		$newdate2 = str_replace("/","-", $orgDate);
?>
<tr>
<td>
<h2 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php echo $jobs_content_row1['link1']; ?>/<?php echo $jobs_content_row1['job_subcat_id']; ?>/<?php echo $jobs_content_row1['link2']; ?>-<?php echo $jobs_content_row1['id']; ?>" target="_blank" title="<?php echo $jobs_content_row1['post']; ?> Jobs"><?php echo $jobs_content_row1['post']; ?></a></h2></td>

<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_content_row1['company']; ?></td>

<td>
<div class="divinline pb-7"><span class="mob-only pr-2 fa-ico">
<i class="fas fa-graduation-cap mob_nly fa-ico"></i></span><?php echo $jobs_content_row1['qualification']; ?></div>
</td>
<td><span class="lstdate"></span><?php echo $newdate2;  ?></td>
</tr>
<?php } ?>

</tbody>
</table>
<?php 
	}  else  {
	echo '<div style="color:#eb1414; font-size:18px;">No Jobs match in your search criteria. Find below other related jobs.</div>';
		} 
?>

<div class="srchlist">
<h2><?php echo $main_role; ?> Jobs in Top Cities in India</h2>
<?php
$jobs_content_query2=mysqli_query($con,"select * from jobs where post='".$main_role."' group by location");
$num_query2=mysqli_num_rows($jobs_content_query2);

if($num_query2 > 0)
{
while($jobs_content_row2=mysqli_fetch_array($jobs_content_query2))
{	
	 $location=$jobs_content_row2['location'];
	 $new_location=str_replace(" ","-",$location);  
?>

<a href="http://localhost/livegovjob/search-jobs/<?php echo $new_role; ?>-jobs-in-<?php echo $new_location; ?>" target="_blank" title="<?php echo $main_role; ?> Jobs in <?php echo $location; ?>">

<?php echo $main_role; ?> Jobs in <?php echo $location; ?></a>

<?php } } 
	else  {
	echo '<div style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</div>';
		}   ?>
</div>
<br>

<h2 style="margin-bottom:3px;font-size:20px;">Apply Various Job Roles on Livegovjob</h2>
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
</table>
<br>

<div class="catta">Education Wise Job Openings Notification <?php echo date('Y'); ?>-<?php echo date('y')+1; ?></div>
<table class="eduactiontable">
<tbody>
<tr>
<?php  
$jobs_content4=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','mba') group by eligible ");
$num_jobs4=mysqli_num_rows($jobs_content4);

while($jobs_row4=mysqli_fetch_array($jobs_content4))
{
	$eligible4=$jobs_row4['eligible'];
	$org_eligible4=str_replace(" ","-",$eligible4);	
?>
<td style="text-transform:capitalize;"><a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/job-search/<?php echo $org_eligible4; ?>" target="_blank" class="a_linktag1"><?php if( $eligible4 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible4 == "10th") { echo "10th Pass Govt"; } elseif($eligible4 == "12th") { echo "12th Pass Govt"; } else { echo $eligible4; } ?> Jobs (<?php echo $jobs_row4['count(job_subcat_id)']; ?> Vacancies)</a>
</td>

<?php } ?>

<td style="text-transform:capitalize;"><a style="text-decoration:none;" href="http://localhost/livegovjob/jobs-by-education" target="_blank" class="a_linktag1">View more </a></td>

</tr>
</tbody>
</table>
<br>

<div id="jobs_right2" style="width:100%;margin-top:8px;">
<h2 class="article_head">Government Sector related Jobs</h2>
<div class="bdr p10px">

<?php 
$govt_content6=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows6=mysqli_fetch_array($govt_content6))
{
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows6['job_link']; ?>-<?php echo $govt_rows6['id']; ?>" title="<?php echo $govt_rows6['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows6['job_title']; ?></a>

<?php  } ?>
</div>
</div><br>

<div class="bottom_content_wrap">
<h2><b>Latest <?php echo $main_role; ?> Jobs <?php echo date('Y'); ?> in Dream Companies</b></h2>
<p>Are you looking for designation related jobs in India? Yes your at the right place. Candidates can get the latest designation related jobs in India with a single click here.Check all the latest Designation jobs all over India. Check our page regularly in order to grab all the latest jobs regularly.Designation Jobs 2019 are updated with the general information such as educational qualification, age limit, selection procedure, salary, application/exam fee and more. State and central government related job openings updated here .Public Sector Unit (PSUs), Railway, UPSC, State PSCs, Bank, Indian Navy, Airforce, Defence, and SSC jobs by designation are updated instantly.</p>

<h2><b>Why Livegovjob for <?php echo $main_role; ?> jobs in ?</b><br></h2>
<p>Latest <?php echo $main_role; ?> Jobs <?php echo date('Y'); ?> are updated daily on the&nbsp; basis of your <?php echo $main_role; ?>. There are different types of <?php echo $main_role; ?> jobs available such as Company Secretary, Radiologist, Sales Engineer, Area Manager, General Managers, Personal Secretary, Marketing Manager, Supervisor, Air Hostess, Network Engineer, Data Analyst, Radio Jockey, Legal Manager, Hospital Pharmacist, Clerk, Medical Lab Technician, Security Officer, Computer Teacher, Electrical Engineer, Network Security Administrator, and Online Marketing Executive Jobs. <?php echo $main_role; ?> Jobs Assistant Professor, Lecturer, Business Analyst, Computer Operator, are across India. Livegovjob provides you with all the latest and important jobs and we can apply directly by subscribing to our website.<br></p>

<h2><b>What to do before applying for <?php echo $main_role; ?> Jobs in <?php echo date('Y'); ?>?</b><br></h2>
<p>Job seekers who are in search of <?php echo $main_role; ?> related jobs from different sectors in State Central Government and Private sectors across India can be grab their job easily through Livegovjob easily. Candidates can log on to our website and can click subscribe button and they can check all the latest and new jobs of <?php echo $main_role; ?> Jobs in <?php echo date('Y'); ?> page regularly.Get notified for all <?php echo $main_role; ?> Jobs in Openings and update the entire openings here for you.<br></p>

<h2><b>How to apply through Livegovjob ?</b><br></h2>
<p>Candidates can get their latest and new jobs Livegovjob acts a great medium to list out the <?php echo $main_role; ?> Jobs for all <?php echo $main_role; ?> in various states such as Andhra Pradesh, Arunachal Pradesh, Assam, Bihar, Chhattisgarh, Goa, Gujarat, Haryana, Himachal Pradesh, Jammu &amp; Kashmir, Jharkhand, Karnataka, Kerala, Madhya Pradesh, Maharashtra, Manipur, Meghalaya, Nagaland, Odisha, Punjab, Rajasthan, Sikkim, Tamil Nadu, Telangana, Tripura, Uttarakhand, Uttar Pradesh, Pondicherry, and West Bengal.Job seekers can apply for their desired <?php echo $main_role; ?> Jobs <?php echo date('Y'); ?> at Livegovjob. Just click on the apply job button of any position you would like to apply for. Candidates can check the eligibility criteria of the specified company, then you are eligible to apply for that specific job.&nbsp;</p>

<h2><b>How to receive latest <?php echo $main_role; ?> Jobs <?php echo date('Y'); ?> updates from Livegovjob?&nbsp;</b></h2>
<p>Livegovjob provide all the latest government and private job openings across India. Get all <?php echo $main_role; ?> jobs vacancies in India at Livegovjob for free of cost. Subscribe to our free job alert notifications to get updated regularly . Candidates who are interested in applying for <?php echo $main_role; ?> jobs in different sectors such as UPSC, PSC, Railway, Bank, can check this page regularly.</p>
</div>

<?php 
$jobs_query3=mysqli_query($con,"select * from jobs  group by state");
 $num_query3=mysqli_num_rows($jobs_query3);
 
while($num_rows3=mysqli_fetch_array($jobs_query3)) {
	 $states=$num_rows3['state'];

$jobs_query4=mysqli_query($con,"select * from jobs where post='".$main_role."' and state='".$states."' group by location ");
 $num_query4=mysqli_num_rows($jobs_query4);

if($num_query4 > 0) { 
?>

<div class="srchlist">
<h2><?php echo $main_role; ?> Jobs in <?php echo $num_rows3['state']; ?></h2>
<?php 
while($num_rows4=mysqli_fetch_array($jobs_query4)) {
	$location4=$num_rows4['location'];
	$org_location4=str_replace(" ","-",$location4);
?>

<a href="http://localhost/livegovjob/search-jobs/<?php echo $new_role; ?>-jobs-in-<?php echo $org_location4; ?>"
 title="<?php echo $main_role; ?> Jobs in <?php echo $num_rows4['location']; ?>">
 <?php echo $main_role; ?> Jobs in <?php echo $num_rows4['location']; ?></a>
<?php  } ?>

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