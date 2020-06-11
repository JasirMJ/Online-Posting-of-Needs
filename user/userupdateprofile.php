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
?>
<?php 
	if(isset($_POST["btnsubmit"]))
	{
		$name=$_POST["txtname"];
		$address=$_POST["txtaddress"];
		//$gender=$_POST["radiogender"];
		//$dob=$_POST["txtdob"];
		//$state=$_POST["select"];
		//$district=$_POST["c"];
		$contact=$_POST["txtcontact"];
		$email=$_POST["txtemail"];
		
		$profile=$_FILES['profile']['name'];
	move_uploaded_file($_FILES['profile']['tmp_name'],"profile/".$profile);
			//echo $profile;
	mysql_query("update  USER set name='$name',address='$address',contact='$contact',email='$email',image='$profile' where user_id='$id' ")or die(mysql_error());
?>
 <script type="text/javascript">
alert("Value updated")
window.location="usersnhome.php"
  </script>
  <?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="../SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
            var xmlHttp;
            function showname(to){
				//alert(to)
                if (typeof XMLHttpRequest != "undefined"){
                xmlHttp= new XMLHttpRequest();
                }
                else if (window.ActiveXObject){
                    xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (xmlHttp==null){
                    alert("Browser does not support XMLHTTP Request")
                    return;
                }
                var url="showreg.php";
                url +="?idofs=" +to
                xmlHttp.onreadystatechange = stateChange;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }
            
            
            function stateChange(){
                if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
					//alert(xmlHttp.responseText)
                    document.getElementById("c").innerHTML=xmlHttp.responseText   
                }
			}
</script>
<link href="../SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include("userspannel.php");
?>

<?php 
include("../connection.php");
?>
<form action="" method="post" enctype="multipart/form-data">
<?php
$qr=mysql_query("select * from USER where user_id='$id'") or die (mysql_error());

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>
<table  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><b>Update Profile</b></td>
    </tr>
  <tr>
    <td width="133">&nbsp;</td>
    <td width="304">&nbsp;</td>
  </tr>
  <tr>
    <td>Profile Pic</td>
    <td><label for="profile"></label>
      <input type="file" name="profile" id="profile" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Name</td>
    <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" required value="<?php echo $arra[1]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" ></textarea></td>
  </tr>

  <tr>
   <!-- <td>Gender</td>
    <td><br><br><p><span id="spryradio1">
      <label>
        <input type="radio" name="radiogender" value="Male" id="radiogender" required />
        Male</label><br />
      <label>
        <input type="radio" name="radiogender" value="Female" id="radiogender" />
        Female</label><br />
      <span class="radioRequiredMsg">Please make a selection</span></span><br />
    </p>      <label for="rdiogender"></label></td>
  </tr>
 
    <!--<td>Date Of Birth (DD/MM/YYYY)</td>
    <td><label for="txtdob"></label>
      <input type="date" name="txtdob" id="txtdob" required/></td>-->
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <!-- <td>State</td>
      <td>
        <select name="select" id="select" onChange="showname(this.value)" required="required">
	   <option value="">Select State</option>
	  <?php 
	   $re=mysql_query("select * from STATE");
	  	while($row=mysql_fetch_array($re)){
	  ?>
	  <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
	  <?php }?>
      </select></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>District</td>
      <td>
        <select name="c" id="c" required="required">
        <option>Select District</option>
        <option><?php echo $arra[4]?></option>
      </select></td>
      
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> -->
  <tr>
    <td>Contact</td>
    <td><label for="txtcontact"></label>
      <input type="number" name="txtcontact" id="txtcontact" required value="<?php echo $arra[6]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" required value="<?php echo $arra[7]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Update" /></td>
  </tr>
</table>
<?php }} ?>
</form>
<?php include("footer.php")?>
<script type="text/javascript">
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
</script>
</body>
</html>

