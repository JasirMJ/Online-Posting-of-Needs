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
//echo $id;
include("userspannel.php");
?>
<title>OPN Home</title>


<form action="" method="post">
<?php
$qr=mysql_query("select * from USER where user_id='$id'") or die (mysql_error());

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>
<table width="315" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><img src="profile/<?php echo $arra[8]?>" class="img-thumbnail" width="90" height="90" /></td>
    </tr>
  <tr>
    <td width="168">&nbsp;</td>
    <td width="47">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><?php echo $arra[1]?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $arra[2]?></td>
  </tr>


  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $arra[6]?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $arra[7]?></td>
  </tr>
  <?php }}?>
</table>

</form>

<?php include("footer.php")?>


