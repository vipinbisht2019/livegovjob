<?php 
include_once('include/database.php');

$menubar_content4=mysqli_query($con,"select * from menubar where id=4 ");
$row_menubar4=mysqli_fetch_array($menubar_content4);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_menubar4['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta name="description" content="<?php echo strip_tags($row_menubar4['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_menubar4['keywords']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
   
	<link rel="canonical" href="<?php echo $row_menubar4['url']; ?>">

	<meta property="og:url" content="<?php echo $row_menubar4['url']; ?>">
	<meta property="og:type" content="website>
	<meta property="og:title" content="<?php echo $row_menubar4['title']; ?>">
	<meta property="og:description" content="<?php echo $row_menubar4['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_menubar4['url']; ?>"
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
<div class="wholeleft" style="padding:0 1px;">

<h1 class="heading-h1"><?php  echo $row_menubar4['heading']; ?> <?php echo date('d.m.Y'); ?></h1>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Livegovjob-Online</p>
<p style="color: #767676;font-family: inherit;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last updated: <?php echo date('M j, Y'); ?> <?php echo $row_menubar4['time']; ?> IST </p>
<div class="page_desc">
<?php 
$org_date=date('Y');
$first_menubar=$row_menubar4['top_paragraph']; 
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
<img class="imgstyle" src="http://localhost/livegovjob/gallery/images/<?php echo $row_menubar4['image']; ?>" style="width: 100%;">
<div> <em> Sarkari Naukri <?php echo date('Y'); ?>, सरकारी नौकरी, Latest Sarkari Job Notification </em> </div>
</div>

<div>

<h2 class="table_title">Sarkari Naukri. Latest Sarkari Job Vacancies Notifications <?php echo date('Y'); ?></h2>
<table class="cattable">
<tbody>
<tr>
<td class="headingcolor" style="font-size:17px;background-color:#14598A;font-weight:bold;">Sarkari Naukri 
</td><td class="headingcolor" style="font-size:17px;background-color:#14598A;font-weight:bold;">Vacancies
</td>
</tr>
<?php  
$jobs_content1=mysqli_query($con,"select  count(eligible),eligible,all_salary  from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti','mca','bsc') group by eligible ");
$num_jobs1=mysqli_num_rows($jobs_content1);

while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
	$eligible=$jobs_row1['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);
?>
<tr>
<td><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>" target="_blank" style="text-decoration:none;">
<?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th Sarkari Naukri"; } elseif($eligible == "12th") { echo "12th Sarkari Naukri"; } else { echo $eligible; } ?></a></td>
<td><?php echo $jobs_row1['count(eligible)']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
<br>

<div class="table_title">Sarkari Naukri - Latest Sarkari Job Vacancies on <?php echo date('d.m.Y'); ?></div>
<table class="table" id="sarkari_table">
<tbody>
<tr><th>Company Name</th><th>Post Title</th><th>Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 40;
        $offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql= "SELECT count(job_subcat_id),job_subcat_id,id,qualification,total_post,post,last_date,location from jobs group by job_subcat_id ";
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
<td>
<a class="table_a" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows2['job_link']; ?>-<?php echo $govt_subcat_rows2['id']; ?>" target="_blank" title="<?php echo $govt_subcat_rows2['job_name']; ?>">
<h3 class="table_h3"><?php echo $govt_subcat_rows2['job_name']; ?></h3></a>
</td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows2['post']; ?> - <?php echo $jobs_rows2['qualification']; ?></td>
<td><span class="lstdate"></span><?php echo $jobs_rows2['last_date']; ?></td>
</tr>
<?php }  }  }
	else { echo '<tr> <td colspan="4" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>'; 
	} ?>

	</tbody>
</table>

<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/sarkari-naukri/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/sarkari-naukri/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/sarkari-naukri/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/sarkari-naukri/<?php echo $total_pages; ?>">Last</a></li>
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

<div class="bottom_content_wrap">
<?php
$org_date=date('Y');
$first_menubar=$row_menubar4['bottom_paragraph']; 
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
	$location4=strtolower($jobs_row4['location']);
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