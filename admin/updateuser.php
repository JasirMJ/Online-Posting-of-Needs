<?php require_once('../Connections/need.php'); ?>
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
$query_Recordset1 = "SELECT * FROM `user`";
$Recordset1 = mysql_query($query_Recordset1, $need) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 

$con=mysql_connect("localhost","root","");
mysql_select_db("need",$con);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>user_id</td>
    <td>name</td>
    <td>address</td>
    <td>state</td>
    <td>district</td>
    <td>gender</td>
    <td>contact</td>
    <td>email</td>
    <td>image</td>
    <td>password</td>
    <td>dob</td>
    <td>status</td>
    <td>regdate</td>
    <td>extdate</td>
    <td>ign</td>
  </tr>
      <?php  
	$a=1;
   do { 
    if(isset($_POST['delete'.$a]))
	
   { 
	echo("delete");
	 mysql_query("delete from USER where user_id=".$row_Recordset1['user_id'],$con);
		 header("location:".$_SERVER['PHP_SELF']);
   }
    
	 if(isset($_POST['update'.$a]))
	 {
		 echo("update");
		 header("location:edit.php?id=".$row_Recordset1['user_id']);
	 }
   ?>
    <tr>
      <td><?php echo $row_Recordset1['user_id']; ?></td>
      <td><?php echo $row_Recordset1['name']; ?></td>
      <td><?php echo $row_Recordset1['address']; ?></td>
      <td><?php echo $row_Recordset1['state']; ?></td>
      <td><?php echo $row_Recordset1['district']; ?></td>
      <td><?php echo $row_Recordset1['gender']; ?></td>
      <td><?php echo $row_Recordset1['contact']; ?></td>
      <td><?php echo $row_Recordset1['email']; ?></td>
      <td><?php echo $row_Recordset1['image']; ?></td>
      <td><?php echo $row_Recordset1['password']; ?></td>
      <td><?php echo $row_Recordset1['dob']; ?></td>
      <td><?php echo $row_Recordset1['status']; ?></td>
      <td><?php echo $row_Recordset1['regdate']; ?></td>
      <td><?php echo $row_Recordset1['extdate']; ?></td>
      <td><?php echo $row_Recordset1['ign']; ?></td>
     <td><input name="delete<?php echo $a?>" type="submit" value="delete<?php echo $a?>" id="delete<?php echo $a?>" /></td>
        <td><input name="update<?php echo $a?>" type="submit" value="update <?php echo $a?>" id="update<?php echo $a?>" /></td>
      </tr>
      <?php
	  $a ++;
	   } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  </form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
