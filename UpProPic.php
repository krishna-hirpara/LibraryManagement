<?php 
session_start();
error_reporting(0);
include("newlogoutNav.php");
	
	if(!isset($_SESSION['uid1']))
		{
			header("location: index.php");
			exit();
		}
	
	$fee=$see="";
	if(isset($_POST['save']))
	{
		$fp=$_FILES["pic"]["type"];
		$sp=$_FILES["sign"]["type"];
		$fpn=$_FILES["pic"]["name"];
		$spn=$_FILES["sign"]["name"];
		$ss=$_FILES["sign"]["size"];
		$fs=$_FILES["pic"]["size"];
		$st=$_FILES["sign"]["tmp_name"];
		$ft=$_FILES["pic"]["tmp_name"];
		$fe=$_FILES["pic"]["error"];
		$se=$_FILES["sign"]["error"];
		$c=0;
		
			
			if ((($fp == "image/gif") || ($fp== "image/jpeg") || ($fp== "image/pjpeg")|| ($fp== "image/png")) && ($fs < 900000))
			{
				if($fe>0)
				{
					$fee= "Error : ".$fe;$c=1;
				}
				// else if(file_exists("C:/wamp64/www/Rough/".$_FILES["pic"]["name"]))
				// {
				// 	echo "<script>alert(file already exist)</script>";$c=1;
				// }
				
			}
			else
			{
				$fee="*error while uploading file";$c=1;
			}

			if ((($sp == "image/gif") || ($sp== "image/jpeg") || ($sp== "image/pjpeg")|| ($sp== "image/png")) && ($ss < 900000))
			{
				if($se>0)
				{
					$see= "Error : ".$se;$c=1;
				}
				// else if(file_exists("C:/wamp64/www/Rough/".$spn))
				// {
				// 	echo "<script>alert(signature file already exist)</script>";$c=1;
				// }
				
			}
			else
			{	$c=1;
				$see="*error while uploading file";
			}
		if($c==0)
		{
			session_start();
			$con=mysqli_connect("localhost","root","","student");
			$uid1=$_SESSION['uid1'];
			$sql="UPDATE profile set pic='$fpn',sign='$spn' where aid='$uid1'";
			if(mysqli_query($con,$sql))
			{
				move_uploaded_file($ft,"C:/wamp64/www/Rough/".$fpn);
				move_uploaded_file($st,"C:/wamp64/www/Rough/".$spn);
				header("location: books.php");
				//echo "<script>alert('profile updated successfully');</script>";
			}	
			else
				echo "<script>alert('coudnnnnnnnt update profile');</script>";
		}
		else
		{
			$con=mysqli_connect("localhost","root","","student");
			$uid1=$_SESSION['uid1'];
			$sql="UPDATE profile set pic='profilepic.jpg',sign='sign.png' where aid='$uid1'";
			echo "<script>alert('coudnt update profile')</script>";
			header("location: books.php");
		}
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
 	<title>update profile</title>
 </head>
<body>
	<form action="" method="post" enctype="multipart/form-data" class="uppro">
		<center>
		<table class="insertTable" cellspacing="25px">
 		<tr>
 			<td>Passport Photo : </td>
 			<td><input type="file" name="pic" id="pic"><?php echo $fee?></td>
 		</tr>
 		<tr>
 			<td>Signature : </td>
 			<td><input type="file" name="sign" id="sign"><?php echo $see?></td>
 		</tr>
 		<tr colspan="2">
 			<td><input type="submit" name="save" value="save" class="insertButton1"></td>
 		</tr>
 	</table>
 	</center>
	</form>
</body>
</html>