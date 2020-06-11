<?php require_once('../Connections/need.php'); ?>
<?php 

if(!isset($_SESSION))
{
	session_start();
}
$id="";
$email="";
$date=date('Y-m-d');
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
	$email=$_SESSION['email'];
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_needsatus = 10;
$pageNum_needsatus = 0;
if (isset($_GET['pageNum_needsatus'])) {
  $pageNum_needsatus = $_GET['pageNum_needsatus'];
}
$startRow_needsatus = $pageNum_needsatus * $maxRows_needsatus;

mysql_select_db($database_need, $need);
$query_needsatus = "SELECT * FROM NEED WHERE NEED.user_id='$id' AND NEED.owner_mail='$email'";
$query_limit_needsatus = sprintf("%s LIMIT %d, %d", $query_needsatus, $startRow_needsatus, $maxRows_needsatus);
$needsatus = mysql_query($query_limit_needsatus, $need) or die(mysql_error());
$row_needsatus = mysql_fetch_assoc($needsatus);

if (isset($_GET['totalRows_needsatus'])) {
  $totalRows_needsatus = $_GET['totalRows_needsatus'];
} else {
  $all_needsatus = mysql_query($query_needsatus);
  $totalRows_needsatus = mysql_num_rows($all_needsatus);
}
$totalPages_needsatus = ceil($totalRows_needsatus/$maxRows_needsatus)-1;

$queryString_needsatus = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_needsatus") == false && 
        stristr($param, "totalRows_needsatus") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_needsatus = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_needsatus = sprintf("&totalRows_needsatus=%d%s", $totalRows_needsatus, $queryString_needsatus);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OPN</title>
<style>
.register {
  	width: 500px;
  	margin: 10px auto;
  	padding: 10px;
  	border: 7px solid $green-border;
  	border-radius: 10px;
  	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	  color: #444;
  	background-color: $back-color;
  	box-shadow: 0 0 20px 0 #000000;
  	
  h3 {
	  	margin: 0 15px 20px;
	  	border-bottom: 2px solid $green-border;
	  	padding: 5px 10px 5px 0;
	  	font-size: 1.1em;
	}

	div{
		margin: 0 0 15px 0;
	  	border : none;
	}

	label {
	  	display: inline-block;
	  	width: 25%;
	  	text-align: right;
	  	margin: 10px
	}

	input[type=text], input[type=password]{
  		width: 99%; 
  		font-family: "Lucida Grande","Lucida Sans Unicode",Tahoma,Sans-Serif;
  		padding: 5px;
  		font-size: 0.9em;
  		border-radius: 5px;
  		background: rgba(0, 0, 0, 0.07);
	}
  
  input[type=text]:focus, input[type=password]:focus{
		background: #FFFFFF;
	}
</style>
</head>
<?php include ("userspannel.php")?>
<body>
<table border="0">
  <tr>
    <td><?php if ($pageNum_needsatus > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needsatus=%d%s", $currentPage, 0, $queryString_needsatus); ?>"><img src="First.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needsatus > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needsatus=%d%s", $currentPage, max(0, $pageNum_needsatus - 1), $queryString_needsatus); ?>"><img src="Previous.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needsatus < $totalPages_needsatus) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needsatus=%d%s", $currentPage, min($totalPages_needsatus, $pageNum_needsatus + 1), $queryString_needsatus); ?>"><img src="Next.gif" /></a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_needsatus < $totalPages_needsatus) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needsatus=%d%s", $currentPage, $totalPages_needsatus, $queryString_needsatus); ?>"><img src="Last.gif" /></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
<table class="table" border="0" cellpadding="4" cellspacing="4" >
      <?php do { ?>
     <tr bgcolor="#FFCCCC"><td align="right">Id</td><td><?php echo $row_needsatus['id']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">User Id</td><td><?php echo $row_needsatus['user_id']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">Category</td><td><?php echo $row_needsatus['category']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">Product Name</td><td><?php echo $row_needsatus['p_name']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">Descriptions</td><td><?php echo $row_needsatus['Descriptions']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">District</td><td><?php echo $row_needsatus['district']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">City</td><td><?php echo $row_needsatus['city']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">Post Date</td><td><?php echo $row_needsatus['post_date']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">With Date</td><td><?php echo $row_needsatus['with_date']; ?></td></tr>
     <tr bgcolor="#FFCCCC"><td align="right">Owner Mail</td><td><?php echo $row_needsatus['owner_mail']; ?></td></tr>
     <tr bgcolor="#99FF00"><td align="right">Status</td><td style="color:#C06"><?php echo $row_needsatus['status']; ?></td></tr>
     <tr>
       <td >&nbsp;</td>
       <td >&nbsp;</td>
     </tr>

    <tr>
      
    <?php } while ($row_needsatus = mysql_fetch_assoc($needsatus)); ?>
</table> 
</body>
<?php include("footer.php")?>

</html>
<?php
mysql_free_result($needsatus);
?>
