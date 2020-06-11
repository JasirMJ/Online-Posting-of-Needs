
<?php
$dif="";
$lastdate="";
$date="";
$userid="";
$pid="";
if($_GET['userid'])
$userid=$_GET['userid'];
if($_GET['pid'])
$pid=($_GET['pid']);
//echo $pid."<br>";
//echo $userid;
?>
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
$query_userdetiles = "SELECT * FROM USER WHERE USER.user_id='$userid';";
$userdetiles = mysql_query($query_userdetiles, $need) or die(mysql_error());
$row_userdetiles = mysql_fetch_assoc($userdetiles);
$totalRows_userdetiles = mysql_num_rows($userdetiles);

mysql_select_db($database_need, $need);
$query_pdetiles = "SELECT * FROM NEED WHERE NEED.id='$pid';";
$pdetiles = mysql_query($query_pdetiles, $need) or die(mysql_error());
$row_pdetiles = mysql_fetch_assoc($pdetiles);
$totalRows_pdetiles = mysql_num_rows($pdetiles);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php include("userspannel.php")?>
<body>
<br />
<table border="1" cellpadding="4" cellspacing="4" align="center" class="table">
<tr>
<td colspan="11" align="center">USER DETAILS</td>
</tr>
  <tr>
    <td width="13%">User_id</td>
    <td width="11%">Name</td>
    <td width="14%">Address</td> 
    <td width="12%">Contact</td>
    <td width="11%">Email</td>
     <!--<td width="4%">Image</td>
   <td>password</td>
    <td>DOB</td>-->
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_userdetiles['user_id']; ?></td>
      <td><?php echo $row_userdetiles['name']; ?></td>
      <td><?php echo $row_userdetiles['address']; ?></td>
      <td><?php echo $row_userdetiles['contact']; ?></td>
      <td><?php echo $row_userdetiles['email']; ?></td>
      <!--<td><a href="profile/<?php echo $row_userdetiles['image']; ?>"></a></td>-->
      <!--<td><?php echo $row_userdetiles['password']; ?></td>-->
      <!--<td><?php echo $row_userdetiles['dob']; ?></td>-->
    </tr>
    <?php } while ($row_userdetiles = mysql_fetch_assoc($userdetiles)); ?>
</table>
<br />
<table border="1" cellpadding="4" cellspacing="4" align="center" class="table">
<tr><td colspan="11" align="center">MESSAGE DETAILS</td></tr>
  <tr>
    <td>Id</td>
   <!-- <td>user_id</td>-->
    <td>Category</td>
    <td>Product_name</td>
    <td>Descriptions</td>
    <td>District</td>
    <td>City</td>
    <td>Duration</td>
    <!-- <td>post_date</td>
    <td>with_date</td>
   <td>owner_mail</td>
    <td>status</td>-->
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_pdetiles['id']; ?></td>
      <!--<td><?php echo $row_pdetiles['user_id']; ?></td>-->
      <td><?php echo $row_pdetiles['category']; ?></td>
      <td><?php echo $row_pdetiles['p_name']; ?></td>
      <td><?php echo $row_pdetiles['Descriptions']; ?></td>
      <td><?php echo $row_pdetiles['district']; ?></td>
      <td><?php echo $row_pdetiles['city']; ?></td>
       <!-- <td><?php echo $row_pdetiles['post_date']; ?></td>
      <td><?php echo $row_pdetiles['with_date']; ?></td>
     <td><?php echo $row_pdetiles['owner_mail']; ?></td>
     <td><?php echo $row_pdetiles['status']; ?></td>-->
     <?php $lastdate= strtotime($row_pdetiles['with_date']);
	 $date=strtotime(date('Y-m-d'));
	        //$postdate=strtotime($row_pdetiles['post_date']);
			//echo $lastdate;
			//echo $postdate;
			$dif=abs($lastdate-$date)/86400;
			//echo $dif; ?>
			<td style="color:#C00"><?php echo $dif?>Days Remaining</td>
	 
     </tr>
     <tr>
     <td colspan="11" align="center"><a href="User Reply Needs.php">Back</a></td>
    </tr>
    <?php } while ($row_pdetiles = mysql_fetch_assoc($pdetiles)); ?>
</table>
<?php include("footer.php")?>
</body>
</html>
<?php
mysql_free_result($userdetiles);

mysql_free_result($pdetiles);
?>
