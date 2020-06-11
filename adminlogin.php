
<?php include("connection.php");?>
<!--- START LOGIN  CODE ------->
<?php
if(isset($_POST['btnlogin']))
{
	$username=$_POST['txtuser'];
	$password=$_POST['txtpass'];
	$qur=mysql_query("select * from ADMIN where email='$username' and password='$password'")or die (mysql_error());
	if(mysql_num_rows($qur)>0)
	{
	$aaray=mysql_fetch_array($qur);
	$user_id=$aaray['id'];
	$email=$aaray['email'];
		session_start();
		$_SESSION["id"]=$user_id;
		$_SESSION["email"]=$email;
	header("location:admin/adminhome.php");
	}
	else
	{
		?>
		<script type="text/javascript">
alert("Incorrect Username or Password")
window.location="adminlogin.php"
</script>
	<?php }}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN LOGIN</title>
</head>

<body>
<form action="" method="post">
<table width="320" border="0" align="center">
  <tr>
    <td colspan="2" align="center">ADMIN LOGIN</td>
    </tr>
  <tr>
    <td width="123">&nbsp;</td>
    <td width="187">&nbsp;</td>
  </tr>
  <tr>
    <td>User Name</td>
    <td><label for="txtuser"></label>
      <input type="text" name="txtuser" id="txtuser"  required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" required="required" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnlogin" id="btnlogin" value="Submit" /></td>
  </tr>
</table>

</form>
</body>
</html>