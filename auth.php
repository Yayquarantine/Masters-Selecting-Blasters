<?php
session_start();
//
$con = mysqli_connect("localhost","root","","demo");
//$res = mysqli_query($con, "SELECT * FROM 'users' WHERE username='$username'");
     //$_SESSION1 = mysqli_fetch_array($res,MYSQLI_NUM);
     
if(!isset($_SESSION["username"])){
	 
	
	header("Location: login.php");
exit(); }
?>

