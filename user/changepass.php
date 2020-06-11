<?php require_once('../Connections/need.php'); ?>
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

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_need, $need);
$query_Recordset1 = "SELECT * FROM `user` where  user_id='$id' ";
$Recordset1 = mysql_query($query_Recordset1, $need) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />




<form method="post" >

<table border="1" cellpadding="2" cellspacing="2">
    <tr>
        
      
      </tr>
      <?php do { ?>
        <tr>
          
         
		  				

        </tr>
        <?php
		
		
			if(isset($_POST['btn']))
{
	$op=$_POST['oldp'];
	$np=$_POST['newp'];
	$cp=$_POST['conp'];
	
		if($op==$row_Recordset1['password'])
		{
			if($np==$cp)
	  		{

			mysql_query("update user set password='$np' where user_id='$id' ");
			//mysql_query("UPDATE `need`.`user` SET `password` = '12345' WHERE `user`.`user_id` =21");	
			echo "Password changed Sucessfully";
			
			}
			else
			{ echo "Your password do not match";
			}
		}
		else
		{
		echo "Old Password Doesnt match";
		}
	
	
	

}
		
		
		 } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
    
    <table>
    <tr><td>Old Password</td><td><input type="text" id="oldp" name="oldp"  /></td></tr>
        <tr><td>New Password</td><td><input type="text" id="newp" name="newp"  /></td></tr>
            <tr><td>Conform Password</td><td><input type="text" id="conp" name="conp"  /></td></tr>
            
</table>
            <input type="submit" value="Ok" name="btn" id="btn"/>
            </form>
    <?php
	
	

	

mysql_free_result($Recordset1);
?>
<script>
function changed()
{alert("Password changed sucessfully");
	}

</script>
<?php include("footer.php")?>