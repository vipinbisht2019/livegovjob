<?php
include_once('include/database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page Not Found</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  
  <link rel="stylesheet" href="http://localhost/livegovjob/gallery-css/bootstrap.css">
  <script src="http://localhost/livegovjob/gallery-js/jquery.js"></script>
  <script src="http://localhost/livegovjob/gallery-js/bootstrap.js"></script>  
  
  <!--All stylesheet -->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/style.css">
	<!-- footer css-->
   <link rel="stylesheet" href="http://localhost/livegovjob/assets/css/footer.css"> 
</head>
<body>
<!--header starts-->
<?php  include_once('include/header_panel.php'); ?>
<!--header ends-->

<br><br>
<div class="container" align="center">

<style>
p {
	margin-bottom:-10px;
}

@media only screen and (max-width :400px)
{
.img_err
{
	width:200px;
}

.btn_err {
	width:100px;
	font-size:12px;
}
}

@media only screen and (max-width :800px) {
.img_err
{
	width:200px;
}

.btn_err {
	width:100px;
	font-size:12px;
}
}

</style>
<br>	
	<img class="img_err" src="http://localhost/livegovjob/gallery/images/404.png"><br>
	<a href="http://localhost/livegovjob/" class="btn btn_err" style="background:#2f4f4f;color:white;" role="button">Back to home</a>


</div>
</div>
<br>
 
<!--footer starts-->
<?php  include("include/footer_panel.php"); ?>
<!--footer ends-->

</body>
</html>


