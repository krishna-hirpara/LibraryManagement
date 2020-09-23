<?php 
session_start();
if(!isset($_SESSION['uid1']))
	{		echo "<script>alert('login or register your self first')</script>";
		header("location: index.php");
		exit();
	}
	$con=mysqli_connect("localhost","root","","student");
	if(!$con)
	{
		echo "<script>alert('cant connect to database');</script>";
		exit();
	}
	$uid1=$_SESSION['uid1'];
		$s="SELECT * from profile where aid=$uid1;";
			mysqli_query($con,$s);
		$fn=mysqli_fetch_assoc(mysqli_query($con,$s));
		$uid1=$_SESSION['uid1'];
				foreach ($fn as $key => $value) {
					if($key=='rdate')
					{
					$date1=$value;
					}
				}
					$date=date('Y/m/d');
					if($date<$date1)
					{
						$sql="DELETE rdate,idate from profile where aid='$uid1'";
						echo "<script>alert('You have successfully returned book');</script>";
					}
					else
					{
						echo "<script>alert('You have to pay fine as returndate is $date1');</script>";
					}
 ?>