<?php

include_once('include/database.php');

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jobs by Education</title>
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

<h1 class="heading-h1">Jobs by Education – Search Jobs for Under Graduate, Post Graduate, Diploma, 10th pass across India</h1>
<div class="page_desc">Govt Jobs by Educational Qualification. Find 10th, 12th, Diploma, ITI, Under Graduate UG, Post Graduate PG Jobs updated on Livegovjob. Browse your Educational Qualification page to find your dream Job.
</div>

<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('d-m-Y'); ?></p>
<div class="page_desc"></div>
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

while($jobs_row1=mysqli_fetch_array($jobs_content1))
{
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

<style>
.eduactiontable {
	border-width: thin;
	border-collapse: collapse;
    width: 100%;
}
.eduactiontable td {
	padding: 15px 7px;
}

.eduactiontable td a{
	padding: 15px 7px;
}

.eduactiontable	a {
    color:black;
}
</style>
<br>
<h2 class="table_title">Jobs in UG & PG</h2>
<table class="eduactiontable">
<tbody>
<tr>
<?php  
$jobs_content2=mysqli_query($con,"select  count(job_subcat_id),eligible,all_salary from jobs  group by eligible ");
$num_jobs2=mysqli_num_rows($jobs_content2);
while($jobs_row2=mysqli_fetch_array($jobs_content2))
{
	$eligible=$jobs_row2['eligible'];
	$org_eligible=str_replace(" ","-",$eligible);	
?>
<td style="text-transform:capitalize;">»<a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/job-search/<?php echo $org_eligible; ?>"   class="a_linktag1"><?php if( $eligible == "BTech") { echo "B.Tech/B.E"; } elseif($eligible == "10th") { echo "10th"; } elseif($eligible == "12th") { echo "12th"; } else { echo $eligible; } ?> Jobs (<?php echo $jobs_row2['count(job_subcat_id)']; ?> Vacancies)</a>
</td>
<?php } ?>

</tr>
</tbody>
</table>

</div>
</div>
<?php  include("include/rightside_panel1.php"); ?>
</div>
<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>