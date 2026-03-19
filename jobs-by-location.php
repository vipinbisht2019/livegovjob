<?php

include_once('include/database.php');

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>jobs by location <?php echo date('Y'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
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
<h1 class="heading-h1"><a href="http://localhost/livegovjob/jobs-by-location">Jobs by Location – Search Jobs in Cities, Town across India</a></h1>
<div class="page_desc">Browse Jobs in major Cities, Towns in India and International Locations Jobs on Livegovjob. 100+ Jobs Updated daily on Livegovjob. Filter your desired location to find your dream Job.</div>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('d-m-Y'); ?></p>

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

<h2 class="table_title">Jobs in Top Cities</h2>
<table class="eduactiontable">
<tbody>
<tr>

<?php 
$jobs_content=mysqli_query($con,"select  count(location),location,eligible  from jobs 
where location IN ('Guwahati','Kancheepuram','kolkata','pune','new delhi','Hyderabad','bangalore','across india','patna','chandigarh','chennai','indore','bhubaneswar','lucknow','jaipur','mumbai','ahmedabad','agra')  group by location ");
$num_jobs=mysqli_num_rows($jobs_content);
while($jobs_row=mysqli_fetch_array($jobs_content))
{
	$location=strtolower($jobs_row['location']);
	$org_location=str_replace(" ","-",$location);	
?>
<td style="text-transform:capitalize;">» <a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/jobs-search/<?php echo $org_location; ?>" target="_blank" class="a_linktag1">Jobs in <?php echo $jobs_row['location']; ?>  (<?php echo $jobs_row['count(location)']; ?> Vacancies)</a>
</td>
<?php } ?>

</tr>
</tbody>
</table>
<br><br>

<?php 
$jobs_query1=mysqli_query($con,"select * from jobs  group by state");
$num_query1=mysqli_num_rows($jobs_query1);
 
while($num_rows1=mysqli_fetch_array($jobs_query1)) {
	 $states=$num_rows1['state'];
$jobs_query2=mysqli_query($con,"select count(location),location,state from jobs where state='".$states."' group by location ");
$num_query2=mysqli_num_rows($jobs_query2);

if($num_query2 > 0) { 
?>
<h2 class="table_title">Jobs in <?php echo $states; ?></h2>
<table class="eduactiontable">
<tbody>
<tr>
<?php
while($num_rows2=mysqli_fetch_array($jobs_query2)) {
	$location=strtolower($num_rows2['location']);
	$org_location=str_replace(" ","-",$location);
?>
<td style="text-transform:capitalize;">» <a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/jobs-search/<?php echo $org_location; ?>" target="_blank" class="a_linktag1">
<?php echo $location; ?>  (<?php echo $num_rows2['count(location)']; ?> Vacancies)</a>
</td>

<?php } } ?>
</tr>
</tbody>
</table>
<?php } ?>

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