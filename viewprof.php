<?php
	session_start();
	if(!isset($_SESSION['uid1']))
 	{		echo "<script>alert('login or register your self first')</script>";
 			header("location: index.php");
 			exit();
 	}
 	

 	include("newlogoutNav.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style type="text/css">
 		.wrapper
 		{
 			width:400px;
 			margin:0 auto;
 			color:purple;
 		}
 	</style>
<body>
				<div class="wrapper">

			<table border="5" border-color="purple" align="center" width="400">

			<?php 
			$con=mysqli_connect("localhost","root","","student");
			$s="SELECT * from profile where aid='$_SESSION[uid1]';";
			mysqli_query($con,$s);
			//echo "<script>prompt('enter id given on the form');</script>";
			?>
			<h2 style="text-align: center">My Profile</h2>
			<?php
				$fn=mysqli_fetch_assoc(mysqli_query($con,$s));

				foreach ($fn as $key => $value) {
					if($key=='fname' && $value=='')
					{
						header("location: insertprof.php");
						exit();
					}
			   		if($key=='pic')
							echo "<div style='text-align:center'>
						<img  class='profileImage' src='$value' width='110px' height='120px'>
						</div>";
					if($key=='sign')
							echo "<div style='text-align:center'> <b>Welcome</b> 
						<img  src='$value' width='110px' height='30px'>
						</div>";
							
				}
				foreach ($fn as $key => $value) {
				if($key!='pic' && $key!='sign' && $key!='PASSWORD'){
				?>		
					<tr>
					<td align="left" style="width:100px; font-size:20px;"><?php echo $key; ?></td>
					<td align="left" style="width:100px; font-size:20px;"><?php echo $value; ?></td>
					</tr>
			<?php
			}
		}
			?>
		</div>
		 </table>
</body>
</html>