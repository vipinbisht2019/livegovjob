<?php

session_start();

include_once('include/database.php');

$time = date('H:i:s A');
$date = date('M, D jS, Y');


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<style>
.message {
    background-color: #f2dede;
    border-color: #eed3d7;
    color: #b94a48;
	padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
	text-align:center;
}
</style>

<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>LiveGovJob</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login to your Account </p>
	<div class="message"><?php 
	
//	if(!empty($message)) { echo $message; } 
	if(!empty($_GET['message']) && isset($_GET['message']))
{
	echo $_GET['message'];
} else {
	echo "<span style='color: #3a87ad;'>Please login with your Email and Password</span>";
}
	?></div>

    <form name="myForm" action="login.php" method="post" onsubmit="return check()">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		 <span id="emails" style="color:red;"></span>
      </div>
	 
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="passwd" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		 <span id="passwords" style="color:red;"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-success btn-block btn-flat" name="login" style="background-color:#fd6b0d; border:0;">Sign In</button>
        </div>
      </div>
    </form>

  </div>

</div>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script src="dist/js/style.js"></script>


</body>
</html>
