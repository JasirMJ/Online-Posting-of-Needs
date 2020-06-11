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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_needverification = 10;
$pageNum_needverification = 0;
if (isset($_GET['pageNum_needverification'])) {
  $pageNum_needverification = $_GET['pageNum_needverification'];
}
$startRow_needverification = $pageNum_needverification * $maxRows_needverification;

mysql_select_db($database_need, $need);
$query_needverification = "SELECT * FROM NEED WHERE NEED.status='Under Admin Veryfications'";
$query_limit_needverification = sprintf("%s LIMIT %d, %d", $query_needverification, $startRow_needverification, $maxRows_needverification);
$needverification = mysql_query($query_limit_needverification, $need) or die(mysql_error());
$row_needverification = mysql_fetch_assoc($needverification);

if (isset($_GET['totalRows_needverification'])) {
  $totalRows_needverification = $_GET['totalRows_needverification'];
} else {
  $all_needverification = mysql_query($query_needverification);
  $totalRows_needverification = mysql_num_rows($all_needverification);
}
$totalPages_needverification = ceil($totalRows_needverification/$maxRows_needverification)-1;

$queryString_needverification = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_needverification") == false && 
        stristr($param, "totalRows_needverification") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_needverification = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_needverification = sprintf("&totalRows_needverification=%d%s", $totalRows_needverification, $queryString_needverification);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OPN</title>
</head>
<body>
<?php include("adminpanel.php");?>
<form method="post">
<div class="panel-body">
<div class="table-responsive" align="center" >
  <?php
  $a=1;
   do { 
    if(isset($_POST['Cancel'.$a]))
   { 
   	 //mysql_query("delete from NEED where id=".$row_needverification['id'],$need);
	 mysql_query("update NEED set status =' Cancelled ' where id=".$row_needverification['id'],$need);
	 header("location:".$_SERVER['PHP_SELF']);
	 
	 
   }
    
	 if(isset($_POST['More'.$a]))
	 {
		 //echo("bbnn");
		 header("location:adminneedsmoredetiles.php?id=".$row_needverification['id']."&userid=".$row_needverification['user_id']);
	 }
	  if(isset($_POST['Aprove'.$a]))
   { 
   
	 mysql_query("update NEED set status =' Admin Aproved' where id=".$row_needverification['id'],$need);
		 header("location:".$_SERVER['PHP_SELF']);
		  //echo("bbnn");
   }
   ?>
<table class="table" border="1" cellpadding="4" cellspacing="4" style="background-color:#ECECFD">
  <tr><td>Order No</td><td><?php echo $row_needverification['id']; ?></td></tr>
     <tr><td>Sender Id</td> <td><?php echo $row_needverification['user_id']; ?></td></tr>
     <tr><td>Category</td><td><?php echo $row_needverification['category']; ?></td></tr>
     <tr><td>Product Name</td> <td><?php echo $row_needverification['p_name']; ?></td></tr>
     <tr><td>Demands / Descriptions</td><td><?php echo $row_needverification['Descriptions']; ?></td></tr>
     <tr><td>District</td><td><?php echo $row_needverification['district']; ?></td></tr>
     <tr><td>City</td><td><?php echo $row_needverification['city']; ?></td></tr>
     <tr><td>Posting Date</td> <td><?php echo $row_needverification['post_date']; ?></td></tr>
     <tr><td>Expire Date</td> <td><?php echo $row_needverification['with_date']; ?></td></tr>
     <tr><td>Owner Mail</td><td><?php echo $row_needverification['owner_mail']; ?></td></tr>
     <tr><td>Current Status</td><td><?php echo $row_needverification['status']; ?></td></tr>
     
     </table>
     
     <input name="Aprove<?php echo$a ?>" type="submit" id="<?php echo$a ?>Aprove" value="Aprove" style="background-color:#0F3" />
     <input name="More<?php echo$a ?>" type="submit" id="<?php echo$a ?>More" value="More" style="background-color:#CC0" />
     <input name="Cancel<?php echo$a?>" type="submit" id="<?php echo$a ?>Cancel" value="Cancel" style="background-color:#F00" />
    <br>
<br>
    <?php
	$a++;
	 } while ($row_needverification = mysql_fetch_assoc($needverification)); ?>

</div>
</div>

</form>
<table border="0">
  <tr>
    <td><?php if ($pageNum_needverification > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needverification=%d%s", $currentPage, 0, $queryString_needverification); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needverification > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needverification=%d%s", $currentPage, max(0, $pageNum_needverification - 1), $queryString_needverification); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needverification < $totalPages_needverification) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needverification=%d%s", $currentPage, min($totalPages_needverification, $pageNum_needverification + 1), $queryString_needverification); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_needverification < $totalPages_needverification) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needverification=%d%s", $currentPage, $totalPages_needverification, $queryString_needverification); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<?php include("../user/footer.php");?>
</body>
</html>
<?php
mysql_free_result($needverification);
?>
