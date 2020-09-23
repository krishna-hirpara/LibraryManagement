<?php
	session_start();
	if(!isset($_SESSION['uid1']))
 	{		echo "<script>alert('login or register your self first')</script>";
 		header("location: index.php");
 		exit();
 	}	
 	include("logoutNav.php");

 // session_start();
 //include("navbar.php");
// if(!isset($_SESSION['uid1']))
// 	{		echo "<script>alert('login or register your self first')</script>";
// 		header("location: login.php");
// 		exit();
// 	}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>date</title>
 	<link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body class="hhh">
 	<div class="book">
 		<h1>Issue your book here!</h1>
 		<form class="bookForm" method="post" action="">
 			<div class="bookImage">
 				<center><img src="book8.jpg"></center>
 			</div>
 			<center><input class="issueButton" type="submit" name="ok" value="Issue Book">
 				<input class="issueButton" type="submit" name="ok1" value="Return Book"></center>

 		</form>
 	</div>
 </body>
 </html>
<?php
 if(isset($_POST['ok']))
{
//	echo "<script>alert('login successfully')</script>";
	$con=mysqli_connect("localhost","root","","student");
	if(!$con)
	{
		echo "<script>alert('cant connect to database');</script>";
		exit();
	}
	$f=0;
	$date=date('Y/m/d');
	$dater=date('Y/m/d',strtotime($date.'+15 days'));
	$uid1=$_SESSION['uid1'];
	$s="SELECT idate from profile where aid='$uid1'";
	$q=mysqli_fetch_assoc(mysqli_query($con,$s));
	foreach($q as $key=> $value)
	{
		if($key=='idate' &&  $value!='')
		{
		echo "<script>alert('You have already issue book please return that first');</script>";
		$f=1;
		}
	}
	if($f==0)
	{
	$sql="UPDATE profile set idate='$date',rdate='$dater' where aid='$uid1'";
	if(mysqli_query($con,$sql))
	{
		echo "<script>alert('You have to return book before $dater')</script>";
	}
	else
		echo "cant insert value into database";	
	}
}
if(isset($_POST['ok1']))
{

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
			$k=mysqli_query($con,$s);
		$fn=mysqli_fetch_assoc($k);
		$uid1=$_SESSION['uid1'];
				foreach ($fn as $key => $value) {
					if($key=='rdate')
					{
						if($value=='')
						{
							echo "<script>alert('cant return book as u dont have it');</script>";
							exit();
						}

					$date1=$value;
					}
				}
					$date=date('Y/m/d');
					$sdate=strtotime($date);
					$sdate1=strtotime($date1);
					if($sdate<$sdate1)
					{
						$sql="UPDATE profile set rdate=null,idate=null where aid='$uid1'";
						mysqli_query($con,$sql);
						echo "<script>alert('Congratulations................                                                  You have returned the book before time');</script>";
					}
					else
					{
						echo "<script>alert('You have to pay fine as returndate is $date1');</script>";
					}

}

?>