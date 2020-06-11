

<?php require_once('../Connections/need.php'); ?>
<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
	//echo $id;
}
else
{
	header("location:error.php");
}
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
//select * from chattable where toid in(select toid from chattable order by  desc ) group by toid order by id desc  ;                                  
//select * from chattable group by toid order by attime
//select a.* from chattable a join (select toid, MAX(id) id from chattable b group by toid ) b on a.id=b.id and a.toid=b.toid
//$query_chatreply = "SELECT * FROM chattable WHERE chattable.toid='$id'";
//corect query
$query_chatreply="SELECT a.* FROM CHAT a join (select toid, MAX(id) id from CHAT b group by toid ) b on a.id=b.id and a.toid=b.toid where b.toid='$id'";
$chatreply = mysql_query($query_chatreply, $need) or die(mysql_error());
$row_chatreply = mysql_fetch_assoc($chatreply);
$totalRows_chatreply = mysql_num_rows($chatreply);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OPN</title>
</head>

<body>
<?php include("userspannel.php")?>
<form method="post">
<table border="0" cellpadding="4" cellspacing="4" align="center" class="table">
  <tr>
    <!--<td>id</td>-->
    <td>Message</td>
   <!--<td>From</td>
    <td>To</td>
     <td>status</td>-->
    <td>Time</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $a=1;
   do { 
    
	 if(isset($_POST['Replay'.$a]))
	 {
		
		 header("location:chats/chatform.php?userid=".$row_chatreply['fromid']);
	 }
	  
   ?>
    <tr>
     <!-- <td><?php echo $row_chatreply['id']; ?></td>-->
      <td><?php echo $row_chatreply['msg']; ?></td>
       <!--<td><?php echo $row_chatreply['fromid']; ?></td>
      <td><?php echo $row_chatreply['toid']; ?></td>
     <td><?php echo $row_chatreply['status']; ?></td>-->
      <td><?php echo $row_chatreply['attime']; ?></td>
      <td><input  type="submit" value="Replay Now" id="Replay<?php echo$a?>" name="Replay<?php echo$a?>" /></td>
    </tr>
    <?php
	$a++;
	 } while ($row_chatreply = mysql_fetch_assoc($chatreply)); ?>
</table>
</form>
<?php include("footer.php")?>
</body>
</html>
<?php
mysql_free_result($chatreply);
?>
