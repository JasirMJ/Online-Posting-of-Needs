<?php include("../connection.php"); ?>
<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
}
else
{
	header("location:error.php");
}
?>
<?php

	$_SESSION['user_id']=null;
	unset($_SESSION['user_id']);
	header("location:index.php");
?>