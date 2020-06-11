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

$maxRows_needhistory = 10;
$pageNum_needhistory = 0;
if (isset($_GET['pageNum_needhistory'])) {
  $pageNum_needhistory = $_GET['pageNum_needhistory'];
}
$startRow_needhistory = $pageNum_needhistory * $maxRows_needhistory;

mysql_select_db($database_need, $need);
$query_needhistory = "SELECT * FROM needregistration";
$query_limit_needhistory = sprintf("%s LIMIT %d, %d", $query_needhistory, $startRow_needhistory, $maxRows_needhistory);
$needhistory = mysql_query($query_limit_needhistory, $need) or die(mysql_error());
$row_needhistory = mysql_fetch_assoc($needhistory);

if (isset($_GET['totalRows_needhistory'])) {
  $totalRows_needhistory = $_GET['totalRows_needhistory'];
} else {
  $all_needhistory = mysql_query($query_needhistory);
  $totalRows_needhistory = mysql_num_rows($all_needhistory);
}
$totalPages_needhistory = ceil($totalRows_needhistory/$maxRows_needhistory)-1;

$queryString_needhistory = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_needhistory") == false && 
        stristr($param, "totalRows_needhistory") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_needhistory = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_needhistory = sprintf("&totalRows_needhistory=%d%s", $totalRows_needhistory, $queryString_needhistory);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php include("adminpanel.php")?>
<table border="0">
  <tr>
    <td><?php if ($pageNum_needhistory > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needhistory=%d%s", $currentPage, 0, $queryString_needhistory); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needhistory > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_needhistory=%d%s", $currentPage, max(0, $pageNum_needhistory - 1), $queryString_needhistory); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_needhistory < $totalPages_needhistory) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needhistory=%d%s", $currentPage, min($totalPages_needhistory, $pageNum_needhistory + 1), $queryString_needhistory); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_needhistory < $totalPages_needhistory) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_needhistory=%d%s", $currentPage, $totalPages_needhistory, $queryString_needhistory); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<form method="post">
<table border="1" cellpadding="4" cellspacing="4">
  <tr>
    <td>id</td>
    <td>user_id</td>
    <td>category</td>
    <td>p_name</td>
    <td>Descriptions</td>
    <td>district</td>
    <td>city</td>
    <td>post_date</td>
    <td>with_date</td>
    <td>owner_mail</td>
    <td>status</td>
    <td>Delete</td>
  </tr>
<?php
  $a=1;
   do { 
    if(isset($_POST['delete'.$a]))
   { 
   
	 mysql_query("delete from needregistration where id=".$row_needhistory['id'],$need);
		 header("location:".$_SERVER['PHP_SELF']);
		 echo "ffff";
   }
   ?>
       <tr>
      <td><?php echo $row_needhistory['id']; ?></td>
      <td><?php echo $row_needhistory['user_id']; ?></td>
      <td><?php echo $row_needhistory['category']; ?></td>
      <td><?php echo $row_needhistory['p_name']; ?></td>
      <td><?php echo $row_needhistory['Descriptions']; ?></td>
      <td><?php echo $row_needhistory['district']; ?></td>
      <td><?php echo $row_needhistory['city']; ?></td>
      <td><?php echo $row_needhistory['post_date']; ?></td>
      <td><?php echo $row_needhistory['with_date']; ?></td>
      <td><?php echo $row_needhistory['owner_mail']; ?></td>
      <td><?php echo $row_needhistory['status']; ?></td>
      <td><input name="delete<?php echo$a?>" type="submit" id="delete<?php echo$a?>" value="Delete" /></td>
    </tr>
    <?php
	$a++;
	 } while ($row_needhistory = mysql_fetch_assoc($needhistory)); ?>
</table>
</form>
<?php include("../user/footer.php");?>
</body>
</html>
<?php
mysql_free_result($needhistory);
?>
