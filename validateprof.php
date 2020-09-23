<?php
	if(!isset($_GET['field']))
	{
		echo "error";
		header('location: index.php');
		exit();
	}
	$value=$_GET['query'];
	$ff=$_GET['field'];
	
		
		if($ff=="fname1")
		{
			if(!preg_match("/[A-Za-z]$/",$value))
			{
				echo "*only alphabets are allowed";
			}
			else 
				echo "<span>valid</span>";
		}
		if($ff=="address1")
		{
			if(!preg_match("/[A-Z0-9a-z]$/",$value))
			{
				echo "*Only alphabets are allowed";
			}
			else
				echo "<span>valid</span>";

		}
		if($ff=="uid")
		{
			if(!filter_var($value,FILTER_VALIDATE_EMAIL))
			{
				echo "*invalid Email";//$f=1;
			}
			else
				echo "<span>valid</span>";
		}
		
		if($ff=="mob1")
		{
			if(!preg_match("/[0-9]$/",$value))
			{
				echo "*only number";
			}
			else if(strlen($value)!=10)
				echo "*Invalid length";
			else
				echo "<span>valid</span>";
		}
		if($ff=="pass1")
		{
			if(preg_match("/^[A-Za-z0-1@!]*$/", $ff))
			{
				echo "*alphanumeric and @! is allowed";
			}
			else if(strlen($ff)<6 | strlen($ff)>12)
			{
				echo "*password length must be between 6-12 char";
			}
		}
?>
<!--?php 
if(isset($_POST['register']))
{
	echo "<script>alert('post run');</script>";
			$fn=$_POST['fname1'];
			$ps=$_POST['pass1'];
			$ad=$_POST['address1'];
			$mail=$_POST['email1'];
			$mob=$_POST['mob1'];
			
			$f=0;
			
					
				if($f==0)
			{
			$con=mysqli_connect("localhost","root","","hackathon");
				$sql="INSERT into credentials(name,email,mobile,PASSWORD,address) values('$fn',$mail','$mob','$ps','$ad')";
					
				echo "<script>alert('data inserted successfully');</script>";
			}
	}

 ?-->