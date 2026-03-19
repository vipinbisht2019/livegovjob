<?php 
include_once('include/database.php');

$menubar_content5=mysqli_query($con,"select * from menubar where id=5 ");
$row_menubar5=mysqli_fetch_array($menubar_content5);

$menu_id=$row_menubar5['id'];

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);

$web_log_content=mysqli_query($con,"select * from web_logo limit 1");
$web_log_row=mysqli_fetch_array($web_log_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row_menubar5['title']; ?> - Livegovjob</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />  
  <meta name="description" content="<?php echo strip_tags($row_menubar5['description']); ?>" />
  <meta name="keywords" content="<?php echo strip_tags($row_menubar5['keywords']); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>  
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
	<!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css">

	<link rel="canonical" href="<?php echo $row_menubar5['url']; ?>">

	<meta property="og:url" content="<?php echo $row_menubar5['url']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $row_menubar5['title']; ?>">
	<meta property="og:description" content="<?php echo $row_menubar5['description']; ?>">
	<meta property="og:image" content="http://localhost/livegovjob/gallery/images/<?php echo $web_log_row['favicon_image']; ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "website",
  "name": "livegovjob",
  "url": "<?php echo $row_menubar5['url']; ?>"
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
<div class="ptitle">
<h1 class="ptitleh1" style="font-size: 21px;  margin: 7px 0px;"><?php echo $row_menubar5['heading']; ?></h1>
<div class="page_desc"><?php echo $row_menubar5['top_paragraph']; ?></div>
</div>

<h2 class="titleh2">Apply Online Private Company Jobs</h2>
<table class="table">
<tbody><tr><th>Company Name</th><th>Job Title</th><th>Eligibility</th><th>Last Date</th></tr>
<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 30;
        $offset = ($pageno-1) * $no_of_records_per_page;

		$total_pages_sql = "SELECT COUNT(*) FROM private_job where menu_id='".$menu_id."' ";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
		$total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<?php 
$private_job_details_content=mysqli_query($con,"select * from private_job where menu_id='".$menu_id."' order by id DESC LIMIT $offset, $no_of_records_per_page");
while($row_private_job_details=mysqli_fetch_array($private_job_details_content))  {
?>
<tr class="jobtr">
<td class="tdcomp">
<a class="acomp" href="http://localhost/livegovjob/private-job-details/<?php echo $row_private_job_details['job_link']; ?>-<?php echo $row_private_job_details['id']; ?>" target="_blank" title="<?php echo $row_private_job_details['comp_name']; ?>">
<span class="scomp"><h3 class="comph3"><?php echo $row_private_job_details['comp_name']; ?></h3></span>
</a>
</td>
<td class="tdtitle">
<i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details['designation']; ?></td>
<td class="tdqual">
<i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $row_private_job_details['education']; ?></td>
<td class="tdlast">
<span class="lstdate"></span><?php echo $row_private_job_details['last_date']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/private-jobs/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/private-jobs/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/private-jobs/".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="first-last" href="http://localhost/livegovjob/private-jobs/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>

</div>
<?php  include("include/rightside_panel2.php"); ?>
</div>

<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>

