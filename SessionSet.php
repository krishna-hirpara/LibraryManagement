<?php 
	session_start();
	$uid=$_POST['uid'];
	$psw=$_POST['psw'];
	$con=mysqli_connect("localhost","root","","student");
		$s="SELECT aid from profile where UID='$uid' AND PASSWORD='$psw'";
		$r=mysqli_query($con,$s);
		while($row=mysqli_fetch_row($r))
			{
				$uid1=$row[0];
			}
			$_SESSION['uid1']="$uid1";
			
	
 ?>