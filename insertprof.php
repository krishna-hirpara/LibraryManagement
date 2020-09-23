<?php 
	session_start();
	if(!isset($_SESSION['uid1']))
 	{		echo "<script>alert('login or register your self first')</script>";
 		header("location: index.php");
 		exit();
 	}	
 //	$_SESSION['ins']=0;
 	include("logoutNav.php");

 ?>

<!DOCTYPE html>
<html>
<head>
 	<title>profile</title>
 	<style>
 		span
 		{
 			color: white;
 		}
 	</style>
 	<script>
 		function checkform()
		{
			var fn1=document.getElementById("fname").value;
			var ln1=document.getElementById("lname").value;
			var id1=document.getElementById("id").value;
			var email1=document.getElementById("email").value;
			var mob1=document.getElementById("mob").value;
			
			if(fn1==''||ln1==''||id1==''||email1==''||mob1=='')
			{
				alert('All the field are must');
			}
			else 
			{
				var fn=document.getElementById("fname1").textContent;
				var ln=document.getElementById("lname1").textContent;
				var id=document.getElementById("id1").textContent;
				var email=document.getElementById("email1").textContent;
				var mob=document.getElementById("mob1").textContent;
					
				if(fn=='valid' && ln=='valid' && id=='valid' && email=='valid' && mob=='valid')
				{
					//alert('valid inserted data');
					//document.getElementById("myForm").submit();
					window.location="InsertData.php";
				}
				else
					alert('error while insereting data to database');
				}
 		}

 		function validate(field,query)
 		{
 			var x=new XMLHttpRequest();
 			x.onreadystatechange=function()
 			{
 				if(x.readyState!=4)
 					document.getElementById(field).innerHTML="validating...........";
 				else if(x.readyState==4 && x.status==200)
 				{
 						document.getElementById(field).innerHTML=x.responseText;
 						var b=document.getElementById('save');
 						const fname = document.getElementById('fname1').textContent;
 						const lname = document.getElementById('lname1').textContent;
 						const id = document.getElementById('id1').textContent;
 						const email = document.getElementById('email1').textContent;
 						const mob = document.getElementById('mob1').textContent;
 						console.log("validateprof.php?field="+field+"&query="+query);

 					if(fname=="valid" && lname=="valid" && id=="valid" && email=="valid" && mob=="valid")
 					{
 						b.removeAttribute('disabled');
 					}
 					else
 						b.setAttribute('disabled','disabled');
				}
 				else
 					document.getElementById(field).innerHTML="Error Occured <a href='index.php'>Reload Or Try Again</a>";
 			}

 			x.open("GET","validateprof.php?field="+field+"&query="+query,true);
 			x.send(); 		
 		 }		
 	</script>
 	
 </head>
<body >
	<div align="center" color="purple" class="insertBackground">
	<form action="InsertData.php" method="post" name="myform">
		<table class="insertTable" cellspacing="25px">
			<caption>Insert Profile</caption>
			<tr>
				<td>First Name :</td>
				<td><input type="text" id="fname" name="fname" onkeyup="validate('fname1',this.value)"></td>
				<td><div id='fname1'></div></td>
			</tr>
			<tr>
				<td>Last Name :</td>
				<td><input type="text" id="lname" name="lname" onkeyup="validate('lname1',this.value)" value=""></td>
				<td><div id="lname1"></div></td>
			</tr>
			<tr>
				<td>Id : </td>
				<td><input type="text" name="id" id="id" value="" onkeyup="validate('id1',this.value)"></td>
				<td><div id="id1"></div></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email" value="" onblur="validate('email1',this.value)"></td>
				<td><div id="email1"></td>
			</tr>
			<tr>
				<td>Mobile :</td>
				<td><input type="text" name="mob" id="mob" value="" onblur="validate('mob1',this.value)"></td>
				<td><div id="mob1"></div></td>
			</tr>
			<!-- <tr colspan="2">
				<td><input class="insertButton" type="submit" onclick="checkform()" disabled name="save" value="save"  id="save"></td>
			</tr> -->
 		</table>
 		<input class="insertButton" type="submit" onclick="checkform()" disabled name="save" value="Insert"  id="save">
	</form>
</div>
</body>
</html>
