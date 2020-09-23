<?php 
		session_start();

		if(!isset($_SESSION['uid1']))
		{
			header("location: index.php");
			exit();
		}
		include("logoutnav.php");
		if(isset($_POST['save']))
		{
			$fn=$_POST['fname'];
			$ln=$_POST['lname'];
			$id=$_POST['id'];
			$email=$_POST['email'];
			$mob=$_POST['mob'];
		//$uid=$_POST['uid'];
		//$psw=$_POST['psw'];
	
	//	$con=mysqli_connect("localhost","root","","student");
	//	$s="SELECT aid from profile where UID='$uid' AND PASSWORD='$psw'";
	//	$r=mysqli_query($con,$s);
	//	while($row=mysqli_fetch_row($r))
	//		{
	//			$uid1=$row[0];
	//		}
		
		//include "SessionSet.php";
		$con=mysqli_connect("localhost","root","","student");
			$uid1=$_SESSION['uid1'];
				$sql="UPDATE profile set fname='$fn', lname='$ln', id='$id', email='$email', mobile='$mob' ,pic='profilepic.jpg',sign='sign.png' where aid=$uid1";
			if(mysqli_query($con,$sql))
			{
				echo "<script>alert('profile updated successfully');</script>";
				header("Location: books.php");
			}	
			else
				echo "<script>alert('coudnnnnnnnt update profile');</script>";
		}
		else echo "hyy";

 ?>