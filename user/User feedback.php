<?php require_once('../Connections/need.php'); ?>
<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
$date="";
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
}
else
{
	header("location:error.php");
}
//echo "From id ".$id." <br>";
$date=date("Y-m-d");
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$sta="unsolved";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO FEEDBACK (user_id,FEEDBACK,date,status) VALUES ('$id',%s,'$date','$sta')",
                       GetSQLValueString($_POST['txtacommend'], "text"));

  mysql_select_db($database_need, $need);
  $Result1 = mysql_query($insertSQL, $need) or die(mysql_error());

  $insertGoTo = "usersnhome.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<?php include ("userspannel.php")?>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="468" border="0" align="center">
    <tr>
      <td colspan="2" align="center">POST YOUR COMENDS</td>
    </tr>
    <tr>
      <td width="170">&nbsp;</td>
      <td width="288">&nbsp;</td>
    </tr>
    <tr>
      <td>Enter Message</td>
      <td><label for="txtacommend"></label>
      <textarea name="txtacommend" id="txtacommend" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="btnsend" id="btnsend" value="Post" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<?php include("../user/footer.php");?>
</body>
</html>