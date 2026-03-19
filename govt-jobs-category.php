<?php 

include_once('include/database.php');

if(isset($_GET['id'])) {
	 $job_category_id = $_GET['id'];
	 $job_category_link = $_GET['job_link'];
}

$job_category_content=mysqli_query($con,"select * from job_category where id='".$job_category_id."' ");
$job_category_row=mysqli_fetch_array($job_category_content);

$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $job_category_row['heading']; ?><?php echo date('d.m.Y'); ?></title>
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
<div id="tdleft">
<br>
<?php 
$govt_subcat_content=mysqli_query($con,"select * from job_sub_category where job_cat_id='".$job_category_id."' ");
$num_subcat=mysqli_num_rows($govt_subcat_content);
?>
<h1 class="heading-h1">
<?php 
$org_date=date('Y');
$first_job_category_row=$job_category_row['heading']; 
$second_job_category_row=str_replace("2020",$org_date,$first_job_category_row);
$third_job_category_row=str_replace("2021",$org_date,$second_job_category_row);
$forth_job_category_row=str_replace("2022",$org_date,$third_job_category_row);
$fifth_job_category_row=str_replace("2023",$org_date,$forth_job_category_row);
$sixth_job_category_row=str_replace("2024",$org_date,$fifth_job_category_row);
$seventh_job_category_row=str_replace("2025",$org_date,$sixth_job_category_row);
$eight_job_category_row=str_replace("2026",$org_date,$seventh_job_category_row);
$job_category_rows=str_replace("2027",$org_date,$eight_job_category_row);

echo $job_category_rows;
?><?php  date_default_timezone_set("Asia/kolkata"); echo date('d.m.Y'); ?></h1>
<p style="color: #767676;font-size: 12px;margin:0px;left:0;bottom:0;text-align:left;"><?php echo $num_subcat; ?> Jobs Found</p>
<div class="page_desc">
<?php 
$org_date=date('Y');
$first_job_category_row=$job_category_row['top_paragraph']; 
$second_job_category_row=str_replace("2020",$org_date,$first_job_category_row);
$third_job_category_row=str_replace("2021",$org_date,$second_job_category_row);
$forth_job_category_row=str_replace("2022",$org_date,$third_job_category_row);
$fifth_job_category_row=str_replace("2023",$org_date,$forth_job_category_row);
$sixth_job_category_row=str_replace("2024",$org_date,$fifth_job_category_row);
$seventh_job_category_row=str_replace("2025",$org_date,$sixth_job_category_row);
$eight_job_category_row=str_replace("2026",$org_date,$seventh_job_category_row);
$job_category_rows=str_replace("2027",$org_date,$eight_job_category_row);

echo $job_category_rows;
?>
</div>

<table class="search_wWrap" cellpadding="10">
<tbody>
<?php
if($num_subcat > 0) {
	?>
<tr>
<th class="search_wWrapth" style="background-color:#fff;color:#000;text-align:left;">Recent Jobs</th>
<th class="search_wWrapth" style="background-color:#fff;color:#000;text-align:left;"><span style=" text-transform:capitalize; "><?php echo $job_category_row['job_name']; ?></span> Recruitment <?php echo date('Y'); ?></th>
</tr>

<?php 
while($govt_subcat_rows=mysqli_fetch_array($govt_subcat_content))
{
	 $job_subcat_ids=$govt_subcat_rows['id'];
	
$govt_jobs_content=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids."' ");
$num_jobs_content=mysqli_num_rows($govt_jobs_content);
?>

<tr>
<td class="search_wWraptr text-align-left"><?php echo $govt_subcat_rows['job_name']; ?> - <?php echo $num_jobs_content; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows['job_link']; ?>-<?php echo $govt_subcat_rows['id']; ?>" style="color:#000;" target="_blank"><u><?php echo $govt_subcat_rows['job_title']; ?> Recruitment <?php echo date('Y'); ?></u></a></td>
</tr>
<?php  }  } 
	else { 
	?>
	<div style="color:#eb1414; font-size:18px;">No <?php echo $job_category_row['job_name']; ?> jobs <?php echo date('Y'); ?> are available. Find below other related jobs.</div>
<?php } ?>

</tbody>
</table>
<br>

<h2 class="table_title">Latest <span style="text-transform:capitalize;"><?php echo $job_category_row['job_name']; ?></span> Jobs Notification <?php echo date('F Y'); ?></h2>

<table class="table">
<tbody>
<tr>
<th>Company Name</th><th>Job Title</th><th>Eligibility</th><th>Last Date</th>

<?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

		$total_pages_sql= "SELECT job_subcat_id,id,qualification,total_post,post,last_date from jobs where job_cat_id='".$job_category_id."' ";
        $result = mysqli_query($con,$total_pages_sql);
		$total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>


</tr>
<?php
$dates=date('d/m/Y');
$jobs_content2=mysqli_query($con,"select job_subcat_id,id,qualification,total_post,post,last_date from jobs where job_cat_id='".$job_category_id."' order by id desc LIMIT $offset, $no_of_records_per_page ");
$num_jobs2=mysqli_num_rows($jobs_content2);
 
if( $num_jobs2 > 0) { 
while($jobs_rows2=mysqli_fetch_array($jobs_content2))
{
	 $job_subcat_id2=$jobs_rows2['job_subcat_id'];
	 
$govt_subcat_content2=mysqli_query($con,"select * from job_sub_category where id='".$job_subcat_id2."' ");
 $govt_subcat_nums2=mysqli_num_rows($govt_subcat_content2).' ';

while($govt_subcat_rows2=mysqli_fetch_array($govt_subcat_content2))
{
		$job_subcat_ids2=$govt_subcat_rows2['id'];			 
?>
<tr>
<td><h3 class="table_h3"><a class="table_a" href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows2['job_link']; ?>-<?php echo $govt_subcat_rows2['id']; ?>" target="_blank" ><?php echo $govt_subcat_rows2['job_name']; ?></a></h3><div class="table_muted"> </div>
</td>
<td><i class="fas fa-suitcase mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows2['post']; ?></td>
<td><i class="fas fa-graduation-cap mob_nly fa-ico" aria-hidden="true"></i><?php echo $jobs_rows2['qualification']; ?></td>
<td><span class="lstdate"></span><?php echo $jobs_rows2['last_date']; ?></td>
</tr>

<?php }  }  }
	else { echo '<tr> <td colspan="4" style="color:#eb1414; font-size:18px;">No Jobs available in your search criteria. Find below other related jobs.</td></tr>'; 
	} ?>
</tbody>
</table>


<center>
	<ul class="pagination" >
        <li><a class="first-last" href="http://localhost/livegovjob/govt-jobs/<?php echo $job_category_link; ?>-<?php echo $job_category_id; ?>/1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a class="prev-next" href="<?php if($pageno <= 1){ echo ''; } else { echo "http://localhost/livegovjob/govt-jobs/".$job_category_link."-".$job_category_id."/".($pageno - 1); } ?>">Prev</a>
        </li>
			
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="prev-next" href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "http://localhost/livegovjob/govt-jobs/".$job_category_link."-".$job_category_id."/".($pageno + 1); } ?>">Next</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a class="first-last" href="http://localhost/livegovjob/govt-jobs/<?php echo $job_category_link; ?>-<?php echo $job_category_id; ?>/<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</center>


<br>

<h2 class="search_wWrapH2"><span style="text-transform:capitalize;"> <?php echo $job_category_row['job_name']; ?></span> Vacancy
<?php echo date('Y'); ?> in <span style="text-transform:capitalize;"><?php echo $job_category_row['job_name']; ?></span> Recruitment Corporation </h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-transform:capitalize; background-color:#fff;color:#000;text-align:left;"><?php echo $job_category_row['job_name']; ?> Recruitment <?php echo date('Y'); ?></th>
<th class="search_wWrapth" style="background-color:#fff;color:#000;text-align:left;">More Details</th>
</tr>

<?php 
$govt_subcat_content4=mysqli_query($con,"select * from job_sub_category where job_cat_id='".$job_category_id."' ");
$num_subcat4=mysqli_num_rows($govt_subcat_content4);

while($govt_subcat_rows4=mysqli_fetch_array($govt_subcat_content4))
{
	 $job_subcat_ids4=$govt_subcat_rows4['id'];
	
$govt_jobs_content4=mysqli_query($con,"select * from jobs where job_subcat_id='".$job_subcat_ids4."' ");
$num_jobs_content4=mysqli_num_rows($govt_jobs_content4);

?>
<tr>
<td class="search_wWraptr text-align-left"><?php echo $govt_subcat_rows4['job_name']; ?> Recruitment - <?php echo $num_jobs_content4; ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/recruitment-<?php echo date('Y'); ?>-<?php echo $govt_subcat_rows4['job_link']; ?>-<?php echo $govt_subcat_rows4['id']; ?>" target="_blank">
<u><?php echo $govt_subcat_rows4['job_name']; ?></u></a></td>
</tr>
<?php  } ?>
</tbody>
</table>
<br>

<div id="jobs_right2" style="width:100%;margin-top:8px;">
<h2 class="article_head">Government Sector related Jobs</h2>
<div class="bdr p10px">
<?php 
$govt_content5=mysqli_query($con,"select * from job_category where menu_id=1  order by job_name asc");
while($govt_rows5=mysqli_fetch_array($govt_content5))
{
?>
<a href="http://localhost/livegovjob/govt-jobs/<?php echo $govt_rows5['job_link']; ?>-<?php echo $govt_rows5['id']; ?>" title="<?php echo $govt_rows5['job_title']; ?>" target="_blank" class="atag" style="color:#E7580A;"><?php echo $govt_rows5['job_title']; ?></a>
<?php  } ?>

</div>
</div>

<div class="bottom_content_wrap">
<?php
$org_date=date('Y');
$first_job_category_row=$job_category_row['bottom_paragraph']; 
$second_job_category_row=str_replace("2020",$org_date,$first_job_category_row);
$third_job_category_row=str_replace("2021",$org_date,$second_job_category_row);
$forth_job_category_row=str_replace("2022",$org_date,$third_job_category_row);
$fifth_job_category_row=str_replace("2023",$org_date,$forth_job_category_row);
$sixth_job_category_row=str_replace("2024",$org_date,$fifth_job_category_row);
$seventh_job_category_row=str_replace("2025",$org_date,$sixth_job_category_row);
$eight_job_category_row=str_replace("2026",$org_date,$seventh_job_category_row);
$job_category_rows=str_replace("2027",$org_date,$eight_job_category_row);

echo $job_category_rows;
?>
</div>
<br>

<h2 class="search_wWrapH2">Latest Govt Jobs <?php echo date('Y') ?> Vacancies List </h2>
<table class="search_wWrap" cellpadding="10">
<tbody>
<tr>
<th class="search_wWrapth" style="text-align:left;">Govt Jobs</th>
<th class="search_wWrapth" style="text-align:left;">Apply Link</th>
</tr>
<?php  
$jobs_content6=mysqli_query($con,"select  count(eligible),eligible,all_salary from jobs where eligible IN ('10th','12th','any graduate','btech','diploma','iti') group by eligible ");
$num_jobs6=mysqli_num_rows($jobs_content6);
while($jobs_row6=mysqli_fetch_array($jobs_content6))
{
	$eligible6=$jobs_row6['eligible'];
	$org_eligible6=str_replace(" ","-",$eligible6);	
?>
<tr>
<td class="search_wWraptr text-align-left"><?php if( $eligible6 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible6 == "10th") { echo "10th"; } elseif($eligible6 == "12th") { echo "12th"; } else { echo $eligible6; } ?> - <?php echo number_format($jobs_row6['count(eligible)']); ?> Vacancies</td>
<td class="search_wWraptr text-align-left"><a href="http://localhost/livegovjob/job-search/<?php echo $org_eligible6; ?>" target="_blank"><u>
<?php if( $eligible6 == "BTech") { echo "B.Tech/B.E"; } elseif($eligible6 == "10th") { echo "10th Pass Govt"; } elseif($eligible6 == "12th") { echo "12th Pass Govt"; } else { echo $eligible6; } ?> Jobs</u></a></td>
</tr>
<?php } ?>

</tbody>
</table>
<br><br>
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
	dates[i].innerHTML = m + "." + d + "." + y;
    }
</script>

</body>
</html>
