<?php 
include_once('include/database.php');

$menubar_content6=mysqli_query($con,"select * from menubar where id=6 ");
$row_menubar6=mysqli_fetch_array($menubar_content6);
$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_menubar6['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />  
  <meta name="description" content="<?php echo strip_tags($row_menubar6['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_menubar6['keywords']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
   
	<link rel="canonical" href="<?php echo $row_menubar6['url']; ?>">

	<meta property="og:url" content="<?php echo $row_menubar6['url']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $row_menubar6['title']; ?>">
	<meta property="og:description" content="<?php echo $row_menubar6['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_menubar6['url']; ?>"
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
<h1 class="heading-h1"><?php echo $row_menubar6['heading']; ?></h1>

<div class="page_desc"><?php echo $row_menubar6['top_paragraph']; ?></div>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Updated: <?php echo date('M j, Y'); ?> <?php echo $row_menubar6['time']; ?> IST</p><br>

<div class="fresher_cwrap" id="fresher_cwrap">
<div class="table_title">Latest Private Fresher Jobs Vacancies Notification <?php echo date('Y'); ?> to <?php echo date('y')+1; ?></div>
<table class="table" id="sarkari_table">
<tbody>
<tr><th>Company Name <?php echo date('Y'); ?></th><th>Job Title</th><th>Eligibility</th><th>Location</th><th>Last Date</th></tr>
<?php 
$private_job_details_content=mysqli_query($con,"select * from private_job where menu_id=5 order by id DESC limit 80");
$privat_num_rows=mysqli_num_rows($private_job_details_content);

if($privat_num_rows > 0)
	{
  while($row_private_job_details=mysqli_fetch_array($private_job_details_content))  {
?>
<tr>
<td>
<h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/private-job-details/<?php echo $row_private_job_details['job_link']; ?>-<?php echo $row_private_job_details['id']; ?>" rel="noopener" target="_blank" 
title="<?php echo $row_private_job_details['comp_name']; ?>"><?php echo $row_private_job_details['comp_name']; ?></a></h3>
</td>
<td><i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details['designation']; ?></td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details['education']; ?></td>
<td><i class="fas fa-map-marker-alt  mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details['location']; ?></td>
<td><span class="lstdate"></span><?php echo $row_private_job_details['last_date']; ?></td>
</tr>
<?php } } 
else {	
	echo '<tr><td colspan="5" style="color:#eb1414; font-size:18px;">No Jobs match your search criteria. Find below other related jobs.</td></tr><br>';
} ?>

</tbody>
</table>
<br>

<div class="table_title" style="color:#4747d1">Latest Government Fresher Jobs Vacancies Notification <?php echo date('Y'); ?> to <?php echo date('y')+1; ?></div>
<table class="table" id="sarkari_table">
<tbody>
<tr><th style="background-color:#4747d1">Company Name <?php echo date('Y'); ?></th><th style="background-color:#4747d1">Job Title</th><th style="background-color:#4747d1">Eligibility</th><th style="background-color:#4747d1">Location</th><th style="background-color:#4747d1">Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 30;
        $offset = ($pageno-1) * $no_of_records_per_page;

	    $total_pages_sql = "SELECT COUNT(*) FROM jobs ";
        $result = mysqli_query($con,$total_pages_sql);
	    $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php 
$jobs_content2=mysqli_query($con,"select  *  from jobs order by id desc LIMIT $offset, $no_of_records_per_page");
$num_jobs2=mysqli_num_rows($jobs_content2);
if($num_jobs2 > 0)
{
while($jobs_row2=mysqli_fetch_array($jobs_content2))
{
		 $orgDate2 =$jobs_row2['last_date'];
		 $newdate2 = str_replace("/","-", $orgDate2);  
?>
<tr>
<td>
<h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/job-alert/<?php echo $jobs_row2['link1']; ?>/<?php echo $jobs_row2['job_subcat_id']; ?>/<?php echo $jobs_row2['link2']; ?>-<?php echo $jobs_row2['id']; ?>" rel="noopener" target="_blank" 
title="<?php echo $jobs_row2['company']; ?>" style="color:#4747d1"><?php echo $jobs_row2['company']; ?></a></h3>
</td>
<td><i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_row2['post']; ?></td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_row2['qualification']; ?></td>
<td><i class="fas fa-map-marker-alt  mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_row2['location']; ?></td>
<td><span class="lstdate"></span><?php  echo $newdate2;?></td>
</tr>
<?php } } 
else {
	
	echo '<tr><td colspan="5" style="color:#eb1414; font-size:18px;">No Jobs match your search criteria. Find below other related jobs.</td></tr><br>';
} ?>

</tbody>
</table>
<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/fresher-jobs/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/fresher-jobs/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/fresher-jobs/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/fresher-jobs/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>
<br>

<div class="bottom_content_wrap">
<?php 
$org_date=date('Y');
$first_menubar=$row_menubar6['bottom_paragraph']; 
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
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>