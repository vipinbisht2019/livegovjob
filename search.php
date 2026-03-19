<?php 
include_once('include/database.php');
	
$meta_keyword_content=mysqli_query($con,"select * from meta_keyword where id=2");
$row_meta_keyword=mysqli_fetch_array($meta_keyword_content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Livegovjob - Exclusive Job Portal for Freshers in India</title>
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
   
<style>
#fl-searchbar2 {
    border: 1px solid #4e44ea47;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    transition: box-shadow 200ms cubic-bezier(0.4, 0.0, 0.2, 1);
}
#fl-search2 {
    border-radius: 0px;
    background: #fff;
    height: 45px;
    border: 0px;
	outline:none;
}


.input-group .form-control2 {
    position: unset;
}
.input-group .form-control2 {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
	padding: 6px 12px;
}

.form-control2, output {
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
}
.search-second, #fl-search-menu-btn2 {
    border: 0px;
	outline:none;
	background-color:#fff;
	outline: 1px solid transparent
}

.searchres_wrap {
    margin-top: 30px;
    padding-right: 15px;
}
.searchres_row {
    padding: 15px 7px;
    margin-bottom: 10px;
    border: 1px solid #f5f5f5;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0), 0 0 0 1px rgba(0,0,0,0);
}

a.searchres_title {
    font-size: 17px;
    font-weight: bold;
}
.searchres_desc {
    text-align:justify;
}
</style>   
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<div id="maindiv">
<br>
<div id="tdleft">
<div class="wholeleft">

<h2 style="font-weight: 500;margin-top:1px;">Livegovjob search</h2><br>
<form action="search.php" method="get">
<div class="search-second">
<div class="input-group fl-searchbar" id="fl-searchbar2">
<input type="text" class="form-control2  bs-autocomplete ui-autocomplete-input" name="term" placeholder="Search Here..." id="fl-search2" data-hidden_field_id="city-code" data-item_id="id" data-item_label="value" autocomplete="off">
<div class="input-group-btn">
<button class="btn btn-default" type="submit"  id="fl-search-menu-btn2">
<img src="http://localhost/livegovjob/gallery/search1.png" alt="search" height="33">
</button>
</div>

</div>
</div>
</form>

<div class="search_response" id="search_response">
	<div class="searchres_wrap">
<?php
 if(isset($_GET['term'])) {
	$a=$_GET['term']; 
	
	$q=mysqli_query($con,"select * from jobs WHERE  qualification LIKE '%$a%' OR eligible LIKE '%$a%' OR company LIKE '%$a%' OR post LIKE '%$a%' OR state LIKE '%$a%' OR location LIKE '%$a%'  order by id asc  limit 4");
	$n=mysqli_num_rows($q);
	
	if($n==0) 
		{  ?>
		<div>
		<p style='color:grey;'>There are no results found...<p>
		</div>		
<?php	
 }	else  {
		while($r=mysqli_fetch_array($q))  {
			$qualification=$r['qualification'];
			$eligible=$r['eligible'];
			$company=$r['company'];
			$post=$r['post'];
			$state=$r['state'];
			$location=$r['location'];
					
?>
	<div class="searchres_row">		
	
		<div class="searchres_desc">
		<?php if(!empty($eligible)) { echo $eligible; } ?> Jobs Vacancies in <?php if(!empty($location)) { echo $location; } ?>, Apply Online to Live Any Graduate Jobs openings in <?php if(!empty($location)) { echo $location; } ?>. Livegovjob is the one stop place for <?php if(!empty($eligible)) { echo $eligible; } ?> Jobs notification across various industries and sectors in <?php if(!empty($location)) { echo $location; } ?>.
		</div><br>
		
		<div class="searchres_desc">
		Jobs in <?php if(!empty($state)) { echo $state; } ?> <?php echo date('Y'); ?> Search and apply to latest Job Vacancies in <?php if(!empty($state)) { echo $state; } ?> across sectors like Railways, Banking Job in <?php if(!empty($state)) { echo $state; } ?> for freshers, Universities, Financial Institutions <?php echo date('Y'); ?>, Defence Vacancies, UPSC, College Jobs in <?php if(!empty($state)) { echo $state; } ?> <?php echo date('Y'); ?>, Teaching Openings, Schools in <?php if(!empty($state)) { echo $state; } ?>, SSC Vacancy for freshers, Agriculture and many more <?php if(!empty($state)) { echo $state; } ?> Jobs.
		</div><br>
		
		<div class="searchres_desc">
		<?php if(!empty($post)) { echo $post; } ?> Jobs <?php echo date('Y'); ?> Apply online to <?php if(!empty($post)) { echo $post; } ?> Jobs for Freshers and Experienced across India. Upload your resume and subscribe to Jobs in <?php if(!empty($post)) { echo $post; } ?> <?php echo date('Y'); ?> to know immediately about the latest Job notification from Livegovjob.com, Find Newly announced <?php if(!empty($post)) { echo $post; } ?> Jobs <?php echo date('Y'); ?> across India first on Livegovjob.
		</div><br>
		
		<div class ="searchres_desc">
		<?php if(!empty($company)) { echo $company; } ?> Jobs <?php echo date('Y'); ?>: Apply online to Latest <?php if(!empty($company)) { echo $company; } ?> Jobs <?php echo date('Y'); ?> Vacancies across India. Upload your resume and subscribe to <?php if(!empty($company)) { echo $company; } ?> Jobs Vacancies in <?php if(!empty($company)) { echo $company; } ?> <?php echo date('Y'); ?> to know immediately about the latest recruitment <?php echo date('Y'); ?> notification for both fresher's and experienced candidates. Find Newly announced <?php if(!empty($company)) { echo $company; } ?> Jobs <?php echo date('Y'); ?> Vacancy across India first on Livegovjob.
		</div>
		
	</div>
<?php } } } ?>
	
  </div>
</div>

</div>
</div>
<?php  include("include/rightside_panel2.php"); ?>
</div>
<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->
</body>
</html>