<?php

include_once('include/database.php');

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>jobs by designation <?php echo date('Y'); ?></title>
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
<h1 class="heading-h1"><a href="http://localhost/livegovjob/jobs-by-designation">Jobs by Designation</a></h1>
<div class="page_desc">Find the Latest Jobs for your most preferred Designation in Top Government as well as Private Companies across India. This page comprises [Count of Designation based Jobs like 2,000+] Designation based Jobs Across India, which are immediately updated upto this minute. Frequently check this page to apply for your desired Designation.</div>
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

<h2 class="table_title">Jobs by Designation</h2>
<table class="eduactiontable">
<tbody>
<tr>

<?php 
$jobs_content=mysqli_query($con,"select count(post),post,eligible  from jobs where post IN ('manager','general manager','assistant','primary teacher','sub inspector','constable','senior engineer','engineer')  group by post ");
$num_jobs=mysqli_num_rows($jobs_content);
while($jobs_row=mysqli_fetch_array($jobs_content))
{
	$post=$jobs_row['post'];
	$org_post=str_replace(" ","-",$post);
?>
<td style="text-transform:capitalize;">» <a style="text-transform:capitalize;text-decoration:none;" 
href="http://localhost/livegovjob/search-jobs/role/<?php echo $org_post; ?>-jobs" target="_blank" class="a_linktag1"> <?php echo $jobs_row['post']; ?>  (<?php echo $jobs_row['count(post)']; ?> Vacancies)</a>
</td>
<?php } ?>

</tr>
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