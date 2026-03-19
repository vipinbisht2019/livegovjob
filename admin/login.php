<?php

session_start();

include_once('include/database.php');

if(isset($_POST['login']))
{
	$email=mysqli_real_escape_string($con,$_POST['email']);
	
	$password=mysqli_real_escape_string($con,base64_encode(base64_encode($_POST['password'])));
	
	$query=mysqli_query($con,"select * from admin where email='".$email."' AND password='".$password."' ");
	$num=mysqli_num_rows($query);
	
	if($num==1)
	{
		$f=mysqli_fetch_array($query);
		$_SESSION['id']=$f['id'];
		$_SESSION['email']=$f['email'];
		$_SESSION['uname']=$f['uname'];
		$_SESSION['a_image']=$f['a_image'];
		$_SESSION['utype']=$f['utype'];
		
	}
	else
	{
			  
	    $message = "Invalid Your Email or Password!";
		header('location:index.php?message='.$message );
		
	}

	if(!empty($_SESSION['id']))
	{
		header('location:dashboard.php');
		
	}
	
}

?>