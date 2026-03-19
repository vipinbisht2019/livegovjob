<?php  
include_once('include/database.php');

if(isset($_GET['eligible']) && !empty($_GET['eligible'] )) {
	 $org_eligibles = $_GET['eligible'];
	 $org_location = $_GET['location'];
	
	 $eligibility=$org_eligibles;
	 $eligible=str_replace("-"," ",$eligibility);
	 
	 $new_eligibles=$eligible;
	 
	 $locality=$org_location;
	 $location=str_replace("-"," ",$locality);
	 
	 $new_locations=$location;
}

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $eligible; ?> Jobs in <?php echo $location; ?></title>
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

<?php 
	$jobs_content1=mysqli_query($con,"select  *  from jobs where location='".$location."' and eligible='".$eligible."' order by id desc limit 50");
    $num_jobs1=mysqli_num_rows($jobs_content1);
?>	
<h1 class="heading-h1"><?php echo $eligible; ?> Jobs in <?php echo $location; ?></h1>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_jobs1; ?> Jobs Found</p>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('M j, Y '); echo date('h:i'); ?> IST</p>

<div class="page_desc"><?php echo $eligible; ?> Jobs Vacancies in <?php echo $location; ?>, Apply Online to Live various 
<?php echo $eligible; ?> Jobs openings in <?php echo $location; ?>. Livegovjob is the one stop place for <?php echo $eligible; ?> 
Jobs notification across various industries and sectors in <?php echo $location; ?>.
<br><br>
 Please read the provided information such as educational qualification, application fees, selection procedure carefully 
 before applying for the Jobs. For all the freshers and experienced professionals looking for <?php echo $eligible; ?> Jobs 
 vacancies in <?php echo $location; ?>. Livegovjob serves as the one point of access.
 </div>

<h2 class="table_title"><?php echo $num_jobs1; ?> Live <?php echo $eligible; ?> Jobs in <?php echo $location; ?> Updated on <?php echo date('j M Y');?></h2>

<table class="table">
<tbody>
<?php  
if($num_jobs1 > 0)
{
?>
<tr><th>Company Name</th><th>Job Title</th><th>Eligibility &amp; Location</th><th>Last Date</th></tr>
<?php 
while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
		$orgDate1 =$jobs_row1['last_date'];
		$newdate1 = str_replace("/","-", $orgDate1);
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php echo $jobs_row1['link1']; ?>/<?php echo $jobs_row1['job_subcat_id']; ?>/<?php echo $jobs_row1['link2']; ?>-<?php echo $jobs_row1['id']; ?>"  title="<?php echo $jobs_row1['company']; ?>" target="_blank"><?php echo $jobs_row1['company']; ?></a></h3>
</td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_row1['post']; ?></td>
<td>
<div class="divinline" style="display:inline;"><span class="mob-only pr-2 fa-ico"><i class="fas fa-map-marker-alt  mob_nly fa-ico"></i></span><?php echo $jobs_row1['qualification']; ?> - <?php echo $jobs_row1['location']; ?> </div>
</td>
<td><span class="lstdate"></span><?php echo $newdate1;  ?></td>
</tr>
<?php } } else {
	
	echo '<div style="color:#eb1414; font-size:18px;">No Jobs match your search criteria. Find below other related jobs.</div>';
} ?>

</tbody>
</table>
<br>

<h2 class="table_title">Check Latest <?php  echo $new_locations;  ?> Job Vacancies / Openings <?php echo date('d M Y'); ?> </h2>
<table class="table">
<tbody><tr><th>Company Name</th><th>Job Title</th><th>Eligibility &amp; Location</th><th>Last Date</th></tr>

<?php 

$jobs_content2=mysqli_query($con,"select  *  from jobs where location='".$location."'  order by id desc limit 25");
$num_jobs2=mysqli_num_rows($jobs_content2);
if($num_jobs2 > 0)
{
while($jobs_row2=mysqli_fetch_array($jobs_content2))
{
		 $orgDate2 =$jobs_row2['last_date'];
		 $newdate2 = str_replace("/","-", $orgDate2);  
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php echo $jobs_row2['link1']; ?>/<?php echo $jobs_row2['job_subcat_id']; ?>/<?php echo $jobs_row2['link2']; ?>-<?php echo $jobs_row2['id']; ?>" 
target="_blank"
 title="<?php echo $jobs_row2['company']; ?>"> <?php echo $jobs_row2['company']; ?> </a></h3></td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_row2['post']; ?></td>
<td>
<div class="divinline pb-7"><span class="mob-only pr-2 fa-ico"><i class="fas fa-graduation-cap mob_nly fa-ico"></i>
</span><?php echo $jobs_row2['qualification']; ?> - <?php echo $jobs_row2['location']; ?></div>
</td>
<td><span class="lstdate"></span><?php  echo $newdate2;?></td></tr>

<?php } } 
else {	
	echo '<div style="color:#eb1414; font-size:18px;">No Jobs match your search criteria. Find below other related jobs.</div><br>';
} ?>
</tbody>
</table>

<h2 style="margin-bottom:3px;font-size:20px;font-weight:700;">Apply Variouss Job Roles on Livegovjob.com</h2>
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
$jobs_content1=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','mba') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible1=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible1);
	
?>
<td style="text-transform:capitalize;"><a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>"  target="_blank" class="a_linktag1"><?php if( $eligible1 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible1 == "10th") { echo "10th Pass Govt"; } elseif($eligible1 == "12th") { echo "12th Pass Govt"; } else { echo $eligible1; } ?> Jobs (<?php echo $jobs_row1['count(job_subcat_id)']; ?> Vacancies)</a>
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

<div class="bottom_content_wrap">
<h2><b><?php echo $eligible; ?> Jobs in <?php echo $location; ?></b></h2>
<p>Looking for <?php echo $eligible; ?> Jobs in <?php echo $location; ?>? If so, you have landed to the right place. Apply to various <?php echo $eligible; ?> Job openings in Goa either online or offline. Livegovjob is a one-stop source where you can get all <?php echo $eligible; ?> Jobs notification across multiple industries and sectors in Goa.<br>Job seekers can get more information about the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> such as educational qualification, application fee, selection procedure, pay scale, age limit, and important dates before applying for a specific job. This page provides all latest and upcoming notification about <?php echo $eligible; ?> Jobs vacancies in Goa. Read further this article to know the latest and upcoming <?php echo $eligible; ?> Jobs in <?php echo $location; ?>.</p>
 
 <h2><b style="color: inherit; font-family: inherit;"><?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?></b><br></h2>
 <p>Here is a good news for the <?php echo $eligible; ?> Graduates who are seeking for the best jobs in Goa. Are you in quest of searching the best and high-paying jobs in Goa? If so, here are the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?>. Be the first person to explore it. Get all the latest and upcoming <?php echo $eligible; ?> Jobs in <?php echo $location; ?> with additional information here. Apply for the desired job you're looking for without any trouble.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">Why Livegovjob for <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?>?</b><br></h2>
  <p>Livegovjob is one of the leading job portals in providing various <?php echo $eligible; ?> Job openings which is available in the State and Central government, and private companies <?php echo $location; ?>. We provide latest and upcoming job openings 
 from 3,000+ Companies in all over India.<br>We surmise that you can get latest updates about <?php echo $eligible; ?> Jobs in <?php echo $location; ?> in an instant. Livegovjob updates this page regularly to provide the best experience to the job seekers in getting the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?>. We update Jobs in Goa for both freshers and experienced candidates. Get up-to-date notification of all <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?> shortly. Check this page often to know latest job notification of <?php echo $eligible; ?> Jobs in <?php echo $location; ?>.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">Golden Job Opportunities in Goa for <?php echo $eligible; ?> Candidates</b><br></h2>
 <p>Every year, lots of <?php echo $eligible; ?> Jobs in <?php echo $location; ?> are available for <?php echo $eligible; ?> graduates in diverse departments such as Banking, Public Sector Unit Jobs, SSC, UPSC, Finance, Railway, Defence, Retail, Manufacturing, Insurance, Journalism, Media, Marketing, Advertising, Construction and so on. Additionally, you can apply to <?php echo $eligible; ?> Jobs in <?php echo $location; ?> in various sectors like Software, E-commerce, BPO, Logistics, KPO, Manufacturing, Automobile, Start-ups, IT, Aviation and several other jobs openings in Goa <?php echo date('Y'); ?> based on your qualification.</p>
 <p>Candidates who are looking for various <?php echo $eligible; ?> job openings in Goa can apply to various jobs provided in this page. We update up-to-date <?php echo $eligible; ?> Jobs in <?php echo $location; ?> with more information such as educational qualification, selection process, age limit, application procedure, important dates, and so on. Check this <?php echo $eligible; ?> Jobs in <?php echo $location; ?> page to find various job openings with good pay and other benefits.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">Latest Walk-in for <?php echo $eligible; ?> Jobs in <?php echo $location; ?> @ Livegovjob</b><br></h2>
 <p>We provide all the latest walk-in jobs for <?php echo $eligible; ?> graduates in Goa. Livegovjob updates <?php echo $eligible; ?> Jobs in <?php echo $location; ?> in an instant once the concerned authorities release the job openings and details on their official portal. Job seekers can find numerous job vacancies based on their interest in this article. In this page, we update the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> for all kind of jobs very quickly.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">What's more at Livegovjob for <?php echo $eligible; ?> Jobs in <?php echo $location; ?>?</b><br></h2>
 <p>Livegovjob grants you various <?php echo $eligible; ?> Jobs in <?php echo $location; ?> so the job seekers can get jobs based on <?php echo $eligible; ?> and <?php echo $location; ?>. Additionally, candidates can find similar job opportunities in various streams such as 10th, 12th, B.E, B.Tech, B.Sc, M.Sc, BCA, B.B.A, M.Phil, Ph.D., MBBS, MS/MD, M.E, M.Tech, MCA, B.Com, and so on. We cover <?php echo $eligible; ?> Jobs in <?php echo $location; ?> available in different locations like New Delhi, Mumbai, Kolkata, Pune, Noida,Hyderabad, Bengaluru, Hyderabad and more across India.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">What are all the information bestowed in Livegovjob for <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?>?</b><br></h2>
 <p>Apply for latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> without any trouble here. We update latest and upcoming job 
 notifications for all <?php echo $eligible; ?> Jobs in <?php echo $location; ?> very quickly. Hence, job hunters can get all the job- related information in the way they want. That being said, Livegovjob provides numerous information such as Job description, Eligibility criteria, number of vacancies, pay scale, Application procedure, Application/exam fees, Selection procedure, starting and the last Date for 
 application, Interview Dates/walk-in dates of all <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?>. Furthermore, you can get the direct links for official notification, Online Application Form of <?php echo $eligible; ?> Jobs in <?php echo $location; ?> here. This makes you apply for the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> easily.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">Prepare for Latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> 
 through Livegovjob Resources</b><br></h2><p>Livegovjob not only provides the latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> but also offers various useful resources to prepare for written exam and interview if any. Candidates can download those useful resources such as placement papers, Aptitude skill test, Interview questions and answers, and Current Affairs in the PDF format. Make use of all these resources to prepare for the exam and score high marks in the exam.</p>
 
 <h2><b style="color: inherit; font-family: inherit;">How to get Latest notification on <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?> shortly in the near future</b><br></h2>
 <p>As we discussed earlier, Livegovjob acts as a great source to get an instant job notification of <?php echo $eligible; ?> Jobs in <?php echo $location; ?>. Subscribe to our email free job alert to receive instant job updates to your inbox. We surmise that you can receive instant alerts related to upcoming <?php echo $eligible; ?> Jobs in <?php echo $location; ?> <?php echo date('Y'); ?>. Keep checking this page to get all latest <?php echo $eligible; ?> Jobs in <?php echo $location; ?> in an instant. Best wishes for all your future ventures.</p>
 <h2><br></h2>
 </div>

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