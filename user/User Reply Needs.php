<?php
$dif="";
$lastdate="";
$datet="";
$date=date('Y-m-d');
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

$maxRows_viewneed = 10;
$pageNum_viewneed = 0;
if (isset($_GET['pageNum_viewneed'])) {
  $pageNum_viewneed = $_GET['pageNum_viewneed'];
}
$startRow_viewneed = $pageNum_viewneed * $maxRows_viewneed;
$uid=$id;
$uid -=1;
mysql_select_db($database_need, $need);
$query_viewneed = "SELECT * FROM NEED WHERE NEED.user_id!='$id' and NEED.with_date >='$date' ";
$query_limit_viewneed = sprintf("%s LIMIT %d, %d", $query_viewneed, $startRow_viewneed, $maxRows_viewneed);
$viewneed = mysql_query($query_limit_viewneed, $need) or die(mysql_error());
$row_viewneed = mysql_fetch_assoc($viewneed);

if (isset($_GET['totalRows_viewneed'])) {
  $totalRows_viewneed = $_GET['totalRows_viewneed'];
} else {
  $all_viewneed = mysql_query($query_viewneed);
  $totalRows_viewneed = mysql_num_rows($all_viewneed);
}
$totalPages_viewneed = ceil($totalRows_viewneed/$maxRows_viewneed)-1;

$queryString_viewneed = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_viewneed") == false && 
        stristr($param, "totalRows_viewneed") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_viewneed = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_viewneed = sprintf("&totalRows_viewneed=%d%s", $totalRows_viewneed, $queryString_viewneed);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OPN</title>
</head>
<?php include("userspannel.php")?>
<body>
<table border="0" class="teble">
  <tr>
    <td><?php if ($pageNum_viewneed > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_viewneed=%d%s", $currentPage, 0, $queryString_viewneed); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_viewneed > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_viewneed=%d%s", $currentPage, max(0, $pageNum_viewneed - 1), $queryString_viewneed); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_viewneed < $totalPages_viewneed) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_viewneed=%d%s", $currentPage, min($totalPages_viewneed, $pageNum_viewneed + 1), $queryString_viewneed); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_viewneed < $totalPages_viewneed) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_viewneed=%d%s", $currentPage, $totalPages_viewneed, $queryString_viewneed); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<form method="post">
<table border="0" cellpadding="4" cellspacing="4" class="table">
  <tr>

  <!--<td></td>
  <td></td>
    <td>category</td>
    <td>Product Name</td>
    <td>Demands</td>
    <td>District</td>
    <td>City</td>
    <td>post_date</td>
    <td>with_date</td>
    <td>From</td>
    <!--<td></td>-->
  </tr>
  <tr><th>Post By</th><th>Needs</th><th>Duration</th><th></th><th></th>
  <?php
  $a=1;
   do { 
    
	 if(isset($_POST['Replay'.$a]))
	 {
		
		 header("location:chats/chatform.php?pid=".$row_viewneed['id']."&userid=".$row_viewneed['user_id']);
	 }
	 if(isset($_POST['MoreDetiles'.$a]))
	 {
		
		 header("location:usermoredetiles.php?pid=".$row_viewneed['id']."&userid=".$row_viewneed['user_id']);
	 }
	  
   ?>
   
   </tr>
    <tr>
    <td><?php echo $row_viewneed['owner_mail']; ?></td>
      <!--<td><?php echo $row_viewneed['id']; ?></td>-->
     <!-- <td><?php echo $row_viewneed['user_id']; ?></td>-->
      <!--<td><?php echo $row_viewneed['category']; ?></td>-->
      <td><?php echo $row_viewneed['p_name']; ?><br>
      <?php echo $row_viewneed['Descriptions']; ?></td>
     <!-- <td><?php echo $row_viewneed['district']; ?></td>
      <td><?php echo $row_viewneed['city']; ?></td>
      <td><?php echo $row_viewneed['post_date']; ?></td>
      <td><?php echo $row_viewneed['with_date']; ?></td>
      <td><?php echo $row_viewneed['owner_mail']; ?></td>
      <!--<td><?php echo $row_viewneed['status']; ?></td>-->
      
      <?php $lastdate= strtotime($row_viewneed['with_date']);
	 $datet=strtotime(date('Y-m-d'));
	        //$postdate=strtotime($row_pdetiles['post_date']);
			//echo $lastdate;
			//echo $postdate;
			$dif=abs($lastdate-$datet)/86400;
			//echo $dif; ?>
            <td style="color:#00C"><?php echo $dif?> Days Remaining</td>
      <td><input  type="submit" value="More Details" id="MoreDetiles<?php echo$a?>" name="MoreDetiles<?php echo$a?>" class="btn-danger" /></td>
      <td><input  type="submit" value="Chat Now" id="Replay<?php echo$a?>" name="Replay<?php echo$a?>" class="btn btn-info active" /></td>
    </tr>
    <?php
	$a++;
	 } while ($row_viewneed = mysql_fetch_assoc($viewneed)); ?>
</table>
</form>
<?php include("footer.php")?>
</body>
</html>
<?php
mysql_free_result($viewneed);
?>
