<?php
	include("navbar.php"); 
	$uid=$psw=$e1=$e2="";
	if(isset($_POST['login']))
	{
		$uid=$_POST['uid'];
		$psw=$_POST['psw'];
		$con=mysqli_connect("localhost","root","","student");
		if(!$con)
			echo "cant connetct to database";
		else
		{
		//echo "<script>alert('database connected successfully'); </script>";
			$sql="SELECT * from profile where UID='$uid' AND PASSWORD='$psw';";
			$count=mysqli_num_rows(mysqli_query($con,$sql));
		//$s="SELECT aid from profile where UID='$uid'";
		//$r=mysqli_query($con,$s);
		
			if($count==1)
			{
				session_start();
				$s="SELECT aid from profile where UID='$uid' AND PASSWORD='$psw'";
				$r=mysqli_query($con,$s);
				while($row=mysqli_fetch_row($r))
				{
					$uid1=$row[0];
				}
				$_SESSION['uid1']="$uid1";
				//$_SESSION['view']=1;
				echo "<script>alert('welcome')</script>";
			//include("SessionSet.php");
		//	$uid1=$_SESSION['uid1'];
				header("location: books.php");
			}	
		
			else
			{
				echo "<script>alert('Invalid user,please try again');</script>";
	//		header("Location: login.php");
			}
		}
	}
if(isset($_POST['register']))
{
	$f=0;
	$uid=$_POST['uid'];
	$psw=$_POST['psw'];
	$e1=$e2="";
		if(empty($uid))
		{
			$e1="*required";$f=1;
		}
		else if(!preg_match("/[A-Za-z0-9@!]$/", $uid))
		{
			$e1="*only alphanumeric and @! is allowed";$f=1;
		}
		if(empty($psw))
		{
			$e2="*required";$f=1;
		}
		else if(preg_match("/^[A-Za-z0-1@!]*$/", $psw))
		{
			$e2="*alphanumeric and @! is allowed";$f=1;
		}
		else if(strlen($psw)<6 | strlen($psw)>12)
		{
			$e2="*password length must be between 6-12 char";$f=1;
		}
	if($f==0)
	{
		
		$con=mysqli_connect("localhost","root","","student");
		$sql="SELECT * from profile where UID='$uid' AND PASSWORD='$psw';";
		$count=mysqli_num_rows(mysqli_query($con,$sql));
		if($count>0)
		{
			echo "<script>alert('user already exist')</script>";
		//	header("location: login.php");
		}
		else
		{
			$sql="INSERT into profile(UID,PASSWORD) values('$uid','$psw');";
			if(mysqli_query($con,$sql))
			{
				echo "<script>alert('registered successfully')</script>";
				//$con=mysqli_connect("localhost","root","","student");
				$s="SELECT aid from profile where UID='$uid' AND PASSWORD='$psw'";
				$r=mysqli_query($con,$s);
				while($row=mysqli_fetch_row($r))
				{
					$uid1=$row[0];
				}
				session_start();
				$_SESSION['uid1']="$uid1";
		//	$_SESSION['ins']=1;
			}
			else
			{
				echo "<script>alert('user cant regidter')</script>";
		//		header("location: login.php");
			}
		}
	}
	else
			echo "<script>alert('incorrect info entered')</script>";


}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<a href="https://www.facebook.com"><img src="fb.png"></a>
				<a href="https://www.twitter.com"><img src="tw.png"></a>
				<a href="https://www.google.com"><img src="gp.png"></a>
			</div>

			<form id="login" class="input-group" method="post" action="">
				<input type="text" class="input-field" placeholder="User ID" name="uid">
				<input type="password" class="input-field" placeholder="Password" name="psw">
				<button type="submit" name="login" class="submit-btn">Login</button>
			</form>

			<form id="register" class="input-group" method="post" action="">
				<input type="text" class="input-field" placeholder="User ID" name="uid">
				<input type="password" class="input-field" placeholder="Password" name="psw">
				<button type="submit" name="register" class="submit-btn">Register</button>
			</form>		
		</div>
	</div>

	<script type="text/javascript">
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function login()
		{
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}

		function register()
		{
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
	</script>
</body>
</html>
