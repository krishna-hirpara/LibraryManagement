<?php
session_start(); 
if(!isset($_SESSION['uid1']))
{
	header("location: index.php");
	exit();
}

			$con=mysqli_connect("localhost","root","","student");
			if(!$con)
				echo "cant connect to database";
			$uid1=$_SESSION['uid1'];
			$s="SELECT pic,sign from profile where aid='$uid1'";
			$r=mysqli_query($con,$s);
			while($row=mysqli_fetch_row($r))
			{
				$pic=$row[0];
				$sign=$row[1];
				//echo $pic." ".$sign;
			}
			$sql="DELETE from profile where aid='$uid1'";
			if(mysqli_query($con,$sql))
			{
				// unlink("C:/wamp64/www/Rough/".$pic);
				// unlink("C:/wamp64/www/Rough/".$sign);
				echo "<script>alert('profile deleted successfully');</script>";

				unset($_SESSION['uid1']);
				session_destroy();
				header("location: index.php");
			}	
			else
				echo "<script>alert('cant execute query' 	);</script>";

?>
