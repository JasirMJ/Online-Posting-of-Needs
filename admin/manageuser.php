<?php include("../connection.php"); ?>
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
<?php include("adminpanel.php"); ?>

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



$query_Recordset3 = "select *from USER";
$Recordset3 = mysql_query($query_Recordset3, $con) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Users</title>
</head>

<body>


<form id="form1" name="form1" method="post" action="manageuser.php">
  <table border="" class="table">
    <tr>
      <td>id</td>
      <td>fname</td>
      <td>address</td>
     
      <td>contact</td>
      <td>email</td>
      <td>Ignored</td>
    </tr>
    
    
    <?php  
	$a=1;
   do { 
    if(isset($_POST['Block'.$a]))
	
   { 
		$ignstate="yes";
	 mysql_query("update USER set ign='$ignstate' where user_id=".$row_Recordset3['user_id'],$con);
		 header("location:".$_SERVER['PHP_SELF']);
		 $ignstate="";
   }
    
	 if(isset($_POST['Unblock'.$a]))
	 {
		 $ignstate="no";
		 //header("location:edit.php?id=".$row_Recordset3['user_id']);
		 	 mysql_query("update USER set ign='$ignstate' where user_id=".$row_Recordset3['user_id'],$con);
		 header("location:".$_SERVER['PHP_SELF']);
		 $ignstate="";
	 }
   ?>
      <tr>
        <td><?php echo $row_Recordset3['user_id']; ?></td>
        <td><?php echo $row_Recordset3['name']; ?></td>
        <td><?php echo $row_Recordset3['address']; ?></td>
        
        <td><?php echo $row_Recordset3['contact']; ?></td>
        <td><?php echo $row_Recordset3['email']; ?></td>
        <td><?php echo $row_Recordset3['ign']; ?></td>
        <td><input name="Block<?php echo $a?>" type="submit" value="Block<?php echo $a?>" id="Block<?php echo $a?>" /></td>
        <td><input name="Unblock<?php echo $a?>" type="submit" value="Unblock <?php echo $a?>" id="Unblock<?php echo $a?>" /></td>
      </tr>
      <?php
	  $a ++;
	   } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset3);
?>
