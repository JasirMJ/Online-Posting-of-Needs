<?php
$id=""; 
if ($_GET['id']);
$id=$_GET['id'];
$userid=""; 
if ($_GET['userid']);
$userid=$_GET['userid'];
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_user = 10;
$pageNum_user = 0;
if (isset($_GET['pageNum_user'])) {
  $pageNum_user = $_GET['pageNum_user'];
}
$startRow_user = $pageNum_user * $maxRows_user;

mysql_select_db($database_need, $need);
$query_user = "SELECT * FROM user WHERE user.user_id='$userid'";
$query_limit_user = sprintf("%s LIMIT %d, %d", $query_user, $startRow_user, $maxRows_user);
$user = mysql_query($query_limit_user, $need) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);

if (isset($_GET['totalRows_user'])) {
  $totalRows_user = $_GET['totalRows_user'];
} else {
  $all_user = mysql_query($query_user);
  $totalRows_user = mysql_num_rows($all_user);
}
$totalPages_user = ceil($totalRows_user/$maxRows_user)-1;

$maxRows_needdetiles = 10;
$pageNum_needdetiles = 0;
if (isset($_GET['pageNum_needdetiles'])) {
  $pageNum_needdetiles = $_GET['pageNum_needdetiles'];
}
$startRow_needdetiles = $pageNum_needdetiles * $maxRows_needdetiles;

mysql_select_db($database_need, $need);
$query_needdetiles = "SELECT * FROM need WHERE need.id='$id'";
$query_limit_needdetiles = sprintf("%s LIMIT %d, %d", $query_needdetiles, $startRow_needdetiles, $maxRows_needdetiles);
$needdetiles = mysql_query($query_limit_needdetiles, $need) or die(mysql_error());
$row_needdetiles = mysql_fetch_assoc($needdetiles);

if (isset($_GET['totalRows_needdetiles'])) {
  $totalRows_needdetiles = $_GET['totalRows_needdetiles'];
} else {
  $all_needdetiles = mysql_query($query_needdetiles);
  $totalRows_needdetiles = mysql_num_rows($all_needdetiles);
}
$totalPages_needdetiles = ceil($totalRows_needdetiles/$maxRows_needdetiles)-1;

$queryString_user = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_user") == false && 
        stristr($param, "totalRows_user") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_user = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_user = sprintf("&totalRows_user=%d%s", $totalRows_user, $queryString_user);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include ("adminpanel.php")?>
  
    <table border="1" cellpadding="4" cellspacing="4" align="center">
    <tr>
  <th colspan="11" align="center">NOTIFICATION DETILES</th>
  </tr>
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
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_needdetiles['id']; ?></td>
          <td><?php echo $row_needdetiles['user_id']; ?></td>
          <td><?php echo $row_needdetiles['category']; ?></td>
          <td><?php echo $row_needdetiles['p_name']; ?></td>
          <td><?php echo $row_needdetiles['Descriptions']; ?></td>
          <td><?php echo $row_needdetiles['district']; ?></td>
          <td><?php echo $row_needdetiles['city']; ?></td>
          <td><?php echo $row_needdetiles['post_date']; ?></td>
          <td><?php echo $row_needdetiles['with_date']; ?></td>
          <td><?php echo $row_needdetiles['owner_mail']; ?></td>
          <td><?php echo $row_needdetiles['status']; ?></td>
        </tr>
        <?php } while ($row_needdetiles = mysql_fetch_assoc($needdetiles)); ?>
    </table>
    <br>
    <table border="1" cellpadding="4" cellspacing="4" align="center">
     
  <tr>
  <th colspan="11" align="center">OWNER DETILES</th>
  </tr>
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
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_user['user_id']; ?></td>
      <td><?php echo $row_user['name']; ?></td>
      <td><?php echo $row_user['address']; ?></td>
      <td><?php echo $row_user['state']; ?></td>
      <td><?php echo $row_user['district']; ?></td>
      <td><?php echo $row_user['gender']; ?></td>
      <td><?php echo $row_user['contact']; ?></td>
      <td><?php echo $row_user['email']; ?></td>
      <td><img src="../user/profile/<?php echo $row_user['image']; ?>" width="40" height="40" /></td>
      <td><?php echo $row_user['password']; ?></td>
      <td><?php echo $row_user['dob']; ?></td>
    </tr>
    <tr>
    <td align="center" colspan="11"><a href="Needs Verification.php"><input name="" type="submit"  value="Back" style="background-color:#3F3"/></a></td>
    </tr>
    <?php } while ($row_user = mysql_fetch_assoc($user)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_user > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_user=%d%s", $currentPage, 0, $queryString_user); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_user > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_user=%d%s", $currentPage, max(0, $pageNum_user - 1), $queryString_user); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_user < $totalPages_user) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_user=%d%s", $currentPage, min($totalPages_user, $pageNum_user + 1), $queryString_user); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_user < $totalPages_user) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_user=%d%s", $currentPage, $totalPages_user, $queryString_user); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<?php include("../user/footer.php");?>
</body>
</html>
<?php
mysql_free_result($user);

mysql_free_result($needdetiles);
?>
