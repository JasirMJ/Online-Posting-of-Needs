<?php require_once('../Connections/need.php'); ?>
<?php include ('../connection.php'); ?>

<?php 

	if(isset($_POST["btnsub"]))
	{	
		
		$select=$_POST["selectid"];
		$title=$_POST["txttitle"];
		$desc=$_POST["txtdesc"];
		$url=$_POST["txturl"];
		$adsvar=$_FILES['fileimg']['name'];
	move_uploaded_file($_FILES['fileimg']['tmp_name'],"ads/".$adsvar);
			//echo $profile;
	mysql_query("update  ADS set title='$title',description='$desc',domain='$url',image='$adsvar' where adsid='$select' ")or die(mysql_error());
	
 

?> 
 <script type="text/javascript">
alert("Value updated")
window.location="manageads.php"
  </script>
  <?php }?>

<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
}
else
{
	header("location:error.php");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<?php include("adminpanel.php"); ?>
<form  method="POST" enctype="multipart/form-data" >

<table class="table" width="50">

<tr><td>Change</td><td><select name="selectid" id="selectid" >
<option value="0" name="0">Select Ads Id</option>
<option value="1" name="1">1</option>
<option value="2" name="2">2</option>
<option value="3" name="3">3</option>
<option value="4" name="4">4</option>
<option value="5" name="5">5</option>
</select>
</td></tr>
<tr><td>Title</td><td><input type="text" name="txttitle" placeholder="Title"/></td></tr>

<tr><td>Description</td><td><textarea name="txtdesc" ></textarea></td></tr>

<tr><td>URL</td><td><input type="text" name="txturl" placeholder="Url"/></td></tr>

<tr><td>Choose Ads</td><td><label for="fileimg"></label>
    <input type="file" name="fileimg" id="fileimg"></td></tr>

<tr><td></td><td><input type="submit" name="btnsub" value="Add" /></td></tr>
</table>

</form>


<?php include("../user/footer.php"); ?>
</body>
</html>