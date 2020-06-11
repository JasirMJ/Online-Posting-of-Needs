 
<?php include("../connection.php"); ?>
<?php /*
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

*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update location</title>
</head>
<body>
<?php include("adminpanel.php"); ?>
<form method="post">
<table cellpadding="20%" cellspacing="20%">
<tr><td>State</td><td><input type="text" name="state" /></td></tr>
<tr><td>State Id</td><td><input type="text" name="stateid" /></td></tr>
<tr>
  <td>Registered states</td><td><input type="submit" name="state" value="view" /></td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>
<tr>
  <td>District</td>
  <td><input type="text" name="state" /></td>
  
</tr>
<tr>
  <td>District Id</td>
  <td><input type="text" name="state" /></td>
</tr>
<tr>
  <td>Registered District</td><td><input type="submit" name="state" value="view"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td></td>
</tr>
<tr>
  <td>City</td>
  <td><input type="text" name="state" /></td>
</tr>
<tr>
  <td>City Id</td>
  <td><input type="text" name="state" /></td>
  <tr>
  <td>Registered City</td><td><input type="submit" name="state" value="view"/></td>
</tr>
</tr>

</table>


</form>
<body>
</body>
</html>