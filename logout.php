<?php 
session_start();
unset($_SESSION['uid1']);
session_destroy();
header("location: index.php");
 ?>