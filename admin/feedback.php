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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$stat="unsolved";
mysql_select_db($database_need, $need);
$query_Recordset1 = "Select * from feedback where status='$stat'";
$Recordset1 = mysql_query($query_Recordset1, $need) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php include("../connection.php"); ?>
<?php include("adminpanel.php"); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>"  name="form" method="POST" >
  <table  class="table" cellpadding="2" cellspacing="2">
      <tr>
        <th>user_id</th>
        <th>feedback</th>
        <th>status</th>
        <th></th>
    </tr>
      <?php $a=1; do {
		  if ((isset($_POST['solved'.$a]))) {
			  $ck="solved";
  $updateSQL = sprintf("UPDATE feedback SET status='$ck' WHERE user_id=".$row_Recordset1['user_id'],$con);

  $Result1 = mysql_query($updateSQL, $need) or die(mysql_error());
   header("location:".$_SERVER['PHP_SELF']);
}
		   /* if(isset($_POST['solved'.$a]))
	
   { echo "sda";
		$ck="solved";
	 mysql_query("update feedback set status='$cd' where user_id=".$row_Recordset3['user_id'],$con);
		 header("location:".$_SERVER['PHP_SELF']);
   }*/
    
		  
		   ?>
        <tr>
          <td><?php echo $row_Recordset1['user_id']; ?></td>
          <td><?php echo $row_Recordset1['feedback']; ?></td>
          <td><?php echo $row_Recordset1['status']; ?></td><td><input type="submit" value="solved" name="solved<?php echo $a;?>"/>
        </tr>
        <?php $a++;
		 } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>

</form>


<?php
include("../user/footer.php"); 
mysql_free_result($Recordset1);
?>
