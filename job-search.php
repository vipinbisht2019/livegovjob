<?php
include_once('include/database.php');

$menubar_content3=mysqli_query($con,"select * from menubar where id=3");
$row_menubar3=mysqli_fetch_array($menubar_content3);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_menubar3['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="<?php echo strip_tags($row_menubar3['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_menubar3['keywords']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
   
	<link rel="canonical" href="<?php echo $row_menubar3['url']; ?>">

	<meta property="og:url" content="<?php echo $row_menubar3['url']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $row_menubar3['title']; ?>">
	<meta property="og:description" content="<?php echo $row_menubar3['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_menubar3['url']; ?>"
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
<h1 class="heading-h1"><?php echo $row_menubar3['heading']; ?></h1>
<?php 
$jobs_query=mysqli_query($con,"select  *  from jobs ");
$num_job=mysqli_num_rows($jobs_query);
?>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_job; ?> Jobs Found</p>

<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('M j, Y '); echo date('h:i'); ?> IST</p>
<div class="page_desc"><?php echo $row_menubar3['top_paragraph']; ?></div>

<h2 class="search_wWrapH2">Education Wise Govt Job Vacancies <?php echo date('Y') ?></h2>
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

<h2 class="table_title">All Job Vacancies in India – Job Search Opportunities</h2>
<table class="table">
<tbody><tr><th>Company Name</th><th>Job Title</th><th>Eligibility &amp; Location</th><th>Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql= "select count(job_subcat_id),job_subcat_id,id,qualification,total_post,post,last_date,location from jobs group by job_subcat_id  ";
        $result = mysqli_query($con,$total_pages_sql);
		$total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php

$dates=date('d/m/Y');
$jobs_content2=mysqli_query($con,"select count(job_subcat_id),job_subcat_id,id,qualification,total_post,post,last_date,location from jobs  group by job_subcat_id  order by id desc LIMIT $offset, $no_of_records_per_page");
$num_jobs2=mysqli_num_rows($jobs_content2);
 
if( $num_jobs2 > 0) { 
while($jobs_rows2=mysqli_fetch_array($jobs_content2))
{
	$jobb_subcat_id=$jobs_rows2['job_subcat_id'];
	 
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where id='".$jobb_subcat_id."' ");
 $govt_subcat_nums=mysqli_num_rows($govt_subcat_content).' ';
while($govt_subcat_rows2=mysqli_fetch_array($govt_subcat_content))
{
		$job_subcat_ids2=$govt_subcat_rows2['id'];			 
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows2['job_link']; ?>-<?php echo $govt_subcat_rows2['id']; ?>" target="_blank" title="<?php echo $govt_subcat_rows2['job_name']; ?>"><?php echo $govt_subcat_rows2['job_name']; ?></a></h3></td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows2['post']; ?> - <?php echo $jobs_rows2['count(job_subcat_id)']; ?></td>
<td>
<div class="divinline pb-7"><span class="mob-only pr-2 fa-ico"><i class="fas fa-graduation-cap mob_nly fa-ico"></i></span><?php echo $jobs_rows2['qualification']; ?> - <?php echo $jobs_rows2['location']; ?></div>
</td>
<td><span class="lstdate"></span><?php echo $jobs_rows2['last_date']; ?></td>
</tr>
<?php }  }  }
	else { echo '<tr> <td colspan="4" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>'; 
	} ?>
</tbody>
</table>

<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/job-searchs/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/job-searchs/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/job-searchs/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/job-searchs/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>

<br>
<div class="srchlist">
<h2>Jobs in Top Cities across India</h2>
<?php 
$jobs_content3=mysqli_query($con,"select  count(location),location,eligible  from jobs 
where location IN ('Guwahati','Kancheepuram','kolkata','pune','new delhi','Hyderabad','bangalore','across india','patna','chandigarh','chennai','indore','bhubaneshwar','lucknow','jaipur','mumbai','ahmedabad','agra')  group by location ");
$num_jobs3=mysqli_num_rows($jobs_content3);

while($jobs_row3=mysqli_fetch_array($jobs_content3))
{
	$location3=strtolower($jobs_row3['location']);
	$org_location3=str_replace(" ","-",$location3);
?>
<a href="http://localhost/livegovjob/jobs-search/<?php echo $org_location3; ?>" title="Jobs in <?php echo $jobs_row3['location']; ?>"> Jobs in <?php echo $jobs_row3['location']; ?></a>

<?php } ?>
</div>

<div class="srchlist">
<h2>Education based Jobs </h2>
<?php  
$jobs_content4=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs  group by eligible ");
$num_jobs4=mysqli_num_rows($jobs_content4);

while($jobs_row4=mysqli_fetch_array($jobs_content4))
{
	$eligible4=$jobs_row4['eligible'];
	$org_eligible4=str_replace(" ","-",$eligible4);
?>

<a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible4; ?>" title="<?php echo $org_eligible4; ?> Jobs">
<?php if( $eligible4 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible4 == "10th") { echo "10th"; } elseif($eligible4 == "12th") { echo "12th"; } else { echo $eligible4; } ?> Jobs</a>

<?php } ?>
</div>

<div class="srchlist">
<h2>Jobs by Designation</h2>
<?php 
$jobs_content_desg=mysqli_query($con,"select count(post),post,eligible  from jobs where post IN ('manager','general manager','assistant','primary teacher','sub inspector','constable','senior engineer','engineer')  group by post ");
$num_jobs_desg=mysqli_num_rows($jobs_content_desg);

while($jobs_row_desg=mysqli_fetch_array($jobs_content_desg))
{
	$post=$jobs_row_desg['post'];
	$org_post=str_replace(" ","-",$post);	
?>
<a href="http://localhost/livegovjob/search-jobs/role/<?php echo $org_post; ?>-jobs" title="<?php echo $jobs_row_desg['post']; ?>  Jobs "><?php echo $jobs_row_desg['post']; ?>  Jobs </a>

<?php } ?>
</div>

<div class="catta">Education Wise Job Openings Notification <?php echo date('Y'); ?>-<?php echo date('y')+1; ?></div>
<table class="eduactiontable">
<tbody>
<tr>
<?php  
$jobs_content6=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','mba') group by eligible ");
$num_jobs6=mysqli_num_rows($jobs_content6);
while($jobs_row6=mysqli_fetch_array($jobs_content6))
{
	$eligible6=$jobs_row6['eligible'];
	$org_eligible6=str_replace(" ","-",$eligible6);
?>
<td style="text-transform:capitalize;"><a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/job-search/<?php echo $org_eligible6; ?>" target="_blank" class="a_linktag1"><?php if( $eligible6 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible6 == "10th") { echo "10th Pass Govt"; } elseif($eligible6 == "12th") { echo "12th Pass Govt"; } else { echo $eligible6; } ?> Jobs (<?php echo $jobs_row6['count(job_subcat_id)']; ?> Vacancies)</a>
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
$govt_content7=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows7=mysqli_fetch_array($govt_content7))
{
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows7['job_link']; ?>-<?php echo $govt_rows7['id']; ?>" title="<?php echo $govt_rows7['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows7['job_title']; ?></a>

<?php  } ?>
</div>
</div>

<div class="bottom_content_wrap">
<?php  
$org_date=date('Y');
$first_menubar=$row_menubar3['bottom_paragraph']; 
$second_menubar=str_replace("2020",$org_date,$first_menubar);
$third_menubar=str_replace("2021",$org_date,$second_menubar);
$forth_menubar=str_replace("2022",$org_date,$third_menubar);
$fifth_menubar=str_replace("2023",$org_date,$forth_menubar);
$sixth_menubar=str_replace("2024",$org_date,$fifth_menubar);
$seventh_menubar=str_replace("2025",$org_date,$sixth_menubar);
$eight_menubar=str_replace("2026",$org_date,$seventh_menubar);
$menubar_row=str_replace("2027",$org_date,$eight_menubar);

echo $menubar_row;
?>
</div>

<h2 class="search_wWrapH2">Latest Govt Jobs <?php echo date('Y'); ?> Vacancies List </h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Govt Jobs</th>
<th class="search_wWrapth" style="text-align:center;">Total Vacancies</th>
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
<td class="search_wWraptr text-align-left"><?php if( $eligible8 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible8 == "10th") { echo "10th"; } elseif($eligible8 == "12th") { echo "12th"; } else { echo $eligible8; } ?></td>
<td class="search_wWraptr text-align-center"><?php echo $jobs_row8['count(job_subcat_id)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible8; ?>" target="_blank">
<u><?php if( $eligible8 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible8 == "10th") { echo "10th Pass Govt"; } elseif($eligible8 == "12th") { echo "12th Pass Govt"; } else { echo $eligible8; } ?> Jobs</u></a></td>
</tr>

<?php } ?>
</tbody>
</table>

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