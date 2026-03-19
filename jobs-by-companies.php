<?php 

include_once('include/database.php');

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job by Company</title>
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
<h1 class="heading-h1">Jobs by Company </h1>
<div class="page_desc">Browse Jobs from 2000+ Companies across India. Browse this page for latest Jobs in Companies across India. List of all Government Companies in India.</div>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;">Last Modified: <?php echo date('d-m-Y'); ?></p>
<br>
<table class="eduactiontable">
<tbody>
<tr>
<?php 
$govt_company_content=mysqli_query($con,"select * from job_sub_category ");
$num_govt_company_content=mysqli_num_rows($govt_company_content);

while($govt_subcat_company_rows=mysqli_fetch_array($govt_company_content))
{
	$job_subcat_ids43=$govt_subcat_company_rows['id'];
$govt_jobs_company_content=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids43."' ");
$num_jobs_company_content=mysqli_num_rows($govt_jobs_company_content);	 	
?>
<td style="text-transform:capitalize;height:57px;">» <a style="text-transform:capitalize;text-decoration:none; color:black;" 
href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_company_rows['job_link']; ?>-<?php echo $govt_subcat_company_rows['id']; ?>" target="_blank" class="a_linktag1"><?php echo $govt_subcat_company_rows['job_name']; ?> 
 <?php if($num_jobs_company_content != 0) { ?>(<?php echo $num_jobs_company_content; ?> Vacancies) <?php } ?>
  
 </a>
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