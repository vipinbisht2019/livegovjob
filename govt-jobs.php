<?php 
include_once('include/database.php');

$menubar_content1=mysqli_query($con,"select * from menubar where id=1 ");
$row_menubar1=mysqli_fetch_array($menubar_content1);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_menubar1['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image'];?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />  
  <meta name="description" content="<?php echo strip_tags($row_menubar1['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_menubar1['keywords']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
   
	<link rel="canonical" href="<?php echo $row_menubar1['url']; ?>">

	<meta property="og:url" content="<?php echo $row_menubar1['url']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $row_menubar1['title']; ?>">
	<meta property="og:description" content="<?php echo $row_menubar1['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image'];?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_menubar1['url']; ?>"
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

<h1 class="heading-h1"><?php echo $row_menubar1['heading']; ?><?php  date_default_timezone_set("Asia/kolkata"); echo date('d.m.Y'); ?></h1>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Updated: <?php echo date('M j, Y'); ?> <?php echo $row_menubar1['time']; ?> IST</p>
<div class="page_desc">

<?php  
$org_date=date('Y');
$first_menubar=$row_menubar1['top_paragraph']; 
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

<div style="text-align:center;">
	<a style="color: #931fa7;text-decoration: none;font-weight:bold;font-size:20px;" href="http://localhost/livegovjob/sarkari-results">*** Check All Govt Exam Result here ***</a>
</div>

<h2 class="search_wWrapH2">Upcoming Govt Jobs Vacancies Notification Updated on 
<?php
echo date('d F Y');
?>
</h2>

<table class="search_wWrap" style="table-layout: auto;" cellpadding="10">
<tbody>
<tr>
<th style="text-align:left;border: 1px solid #ddd;">Top Category Govt Jobs</th>
<th style="text-align:left;border: 1px solid #ddd;">More Details</th>
</tr>
<?php 
$govt_content=mysqli_query($con,"select * from job_category where menu_id=1 limit 6");
while($govt_rows=mysqli_fetch_array($govt_content))
{
	$job_cat_ids=$govt_rows['id'];

$govt_jobs_content=mysqli_query($con,"select * from jobs where job_cat_id='".$job_cat_ids."' ");
$num_jobs_content=mysqli_num_rows($govt_jobs_content);
?>
<tr>
<td class="search_wWraptr text-align-left" style="border: 1px solid #ddd;"><?php echo $govt_rows['job_name']; ?> Jobs - <?php echo $num_jobs_content; ?> Vacancies</td>
																								
<td class="search_wWraptr text-align-left" style="border: 1px solid #ddd;"><a style="color:#000;" href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows['job_link']; ?>-<?php echo $govt_rows['id']; ?>" target="_blank"> <u><?php echo $govt_rows['job_title']; ?></u> </a></td>
</tr>

<?php } ?>
</tbody>
</table>

<h2 class="search_wWrapH2">Education Wise Govt Job Vacancies <?php echo date('Y') ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Education &amp; Vacancies</th>
<th class="search_wWrapth" style="text-align:left;">Salary</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>
<?php  
$jobs_content1=mysqli_query($con,"select  count(eligible),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1))
  {
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);
?>
<tr>
<td class="search_wWraptr text-align-left">
<?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Pass Govt"; } elseif($eligible == "12th") { echo "12th Pass Govt"; } else { echo $eligible; } ?> Jobs - <?php echo number_format($jobs_row1['count(eligible)']); ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><?php echo $jobs_row1['all_salary']; ?></td>

<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank"><u>Apply Now</u></a></td>
</tr>
<?php } ?>

</tbody>
</table>
<br> 
<h2 class="table_title">Latest Govt Jobs Vacancies Updated on <?php echo date('d M Y') ?></h2>
<table class="table">
<tbody>
<tr><th>Company Name</th><th>Job Title</th><th>Eligibility</th><th>Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql= "SELECT count(job_subcat_id),job_subcat_id,id,qualification,total_post,post,last_date from jobs group by job_subcat_id ";
        $result = mysqli_query($con,$total_pages_sql);
		$total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php

$dates=date('d/m/Y');
$jobs_content=mysqli_query($con,"select count(job_subcat_id),job_subcat_id,id,qualification,total_post,post,last_date from jobs group by job_subcat_id  order by id desc LIMIT $offset, $no_of_records_per_page");
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
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" target="_blank" title="<?php echo $govt_subcat_rows['job_name']; ?>"><?php echo $govt_subcat_rows['job_name']; ?></a></h3><div class="table_muted"></div>
</td>

<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows['post']; ?> - <?php echo $jobs_rows['count(job_subcat_id)']; ?> Vacancy</td>

<td><i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows['qualification']; ?></td>
<td><span class="lstdate"></span><?php echo $jobs_rows['last_date']; ?></td>
</tr>
<?php }  }  }
	else { echo '<tr> <td colspan="4" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>'; 
	} ?>
</tbody>
</table>

<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/govt-jobs/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/govt-jobs/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/govt-jobs/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/govt-jobs/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>

<h2 class="search_wWrapH2">State Government Jobs Vacancies Notification <?php echo date('d.m.Y'); ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">State Name</th>
<th class="search_wWrapth" style="text-align:left;">Vacancies Count</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>

<?php
$state_jobs_content=mysqli_query($con,"select  count(state),state from jobs group by state");
$state_num=mysqli_num_rows($state_jobs_content);

while($state_rows=mysqli_fetch_array($state_jobs_content))
{
	$state=$state_rows['state'];
	$org_state=str_replace(" ","-",$state);
?>
<tr>
<td class="search_wWraptr text-align-left"><?php  echo $state; ?></td>
<td class="search_wWraptr text-align-left"><?php echo $state_rows['count(state)']; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/govt-jobs-state/<?php echo $org_state; ?>-government-jobs-recruitment" 
target="_blank" style="color:#000;"><u>Govt Jobs in <?php  echo $state; ?></u></a></td>
</tr>
<?php } ?>

</tbody>
</table>
<br>

<h2 class="search_wWrapH2">Latest Govt Jobs <?php echo date('Y'); ?> in Bank Sector</h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="background-color:#26548b;color:#fff;">Bank Recruitment <?php echo date('Y'); ?></th>
<th class="search_wWrapth" style="background-color:#26548b;color:#fff;">More Details</th>
</tr>
<?php
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where job_cat_id=1 ");
$num_subcat=mysqli_num_rows($govt_subcat_content); 

while($govt_subcat_rows=mysqli_fetch_array($govt_subcat_content))
{
	 $job_subcat_ids=$govt_subcat_rows['id'];
	
$govt_jobs_content=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids."' ");
$num_jobs_content=mysqli_num_rows($govt_jobs_content);
?>

<tr>
<td class="search_wWraptr text-align-left"><?php echo $govt_subcat_rows['job_name']; ?> - <?php echo $num_jobs_content; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" style="color:#000;" target="_blank"><u><?php echo $govt_subcat_rows['heading']; ?></u></a></td>
</tr>
<?php }  ?>

</tbody>
</table>

<h2 class="search_wWrapH2">Latest Govt Jobs <?php echo date('F'); ?>  <?php echo date('Y'); ?>-<?php echo date('y')+1; ?></h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Govt Jobs <?php echo date('Y'); ?></th>
<th class="search_wWrapth" style="text-align:left;">More Details</th>
</tr>
<?php  
$jobs_content3=mysqli_query($con,"select  count(eligible),eligible,all_salary  from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') group by eligible ");
$num_jobs3=mysqli_num_rows($jobs_content3);

while($jobs_row3=mysqli_fetch_array($jobs_content3))
{
	$eligible3=$jobs_row3['eligible'];
	$org_eligible3=str_replace(" ","-",$eligible3);
?>

<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible3 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible3 == "10th") { echo "10th Pass Govt"; } elseif($eligible3 == "12th") { echo "12th Pass Govt"; } else { echo $eligible3; } ?> Jobs - <?php echo $jobs_row3['count(eligible)']; ?> </td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible3; ?>" target="_blank"  style="color:#000;"><u><?php if( $eligible3 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible3 == "10th") { echo "10th Pass Govt"; } elseif($eligible3 == "12th") { echo "12th Pass Govt"; } else { echo $eligible3; } ?> Jobs</u></a></td>
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
while($govt_rows_jobs=mysqli_fetch_array($govt_content_jobs))
{
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows_jobs['job_link']; ?>-<?php echo $govt_rows_jobs['id']; ?>" title="<?php echo $govt_rows_jobs['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows_jobs['job_title']; ?></a>
<?php  } ?>

</div>
</div>

<div class="bottoms_para" style="font-size:16px;">
<?php 

$org_date=date('Y');
$first_menubar=$row_menubar1['bottom_paragraph']; 
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

</div>
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
var dates=document.getElementsByClassName("js_dates");
	for(var i=0;i<dates.length;i++)
    {
	dates[i].innerHTML = d + "." + m + "." + y;
    }
</script>

</body>
</html>