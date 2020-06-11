<?php require_once('../Connections/need.php'); ?>
<?php include("../connection.php"); ?>
<?php
$edate="";
$day="";
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
}

//include("userspannel.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#6BD18C">
<div align="center">
<h1>Renew accound</h1>
<form  name="form" method="POST">
<table border="10" bgcolor="#FFFFFF" bordercolor="#FF00FF" >
<tr >
<td>
<input type="radio" name="days" value="30" required=""/>30 Days Rs 50<br />
<input type="radio" name="days" value="60" required=""/>60 Days Rs 90<br />
<input type="radio" name="days" value="90" required=""/>90 Days Rs 130<br />
<input type="radio" name="days" value="180" required=""/>180 Days Rs 230<br />
<input type="radio" name="days" value="360" required=""/>360 Days Rs 360<br />
<input type="submit" name="btnpay" value="Pay" />
<input type="hidden" name="MM_insert" value="form" />
</td>
</tr>
</table>

</form>

<!--<form method="post">
Update balance <input type="text" name="txtbal"  /><br />
<input type="submit" name="btnupdate"  /><br />


</form>-->
</div>
</body>
</html>
<?php
$ext="";
/*if(isset($_POST['btnupdate']))
{
	$bal=$_POST['textbal'];
	}*/
	 $cur=date('Y-m-d');
	$date=date_create($cur);
	/*date_add($date,date_interval_create_from_date_string('10days'));
	echo date_format($date,"Y-m-d");*/


if(isset($_POST['btnpay']))
{
	$ext=$_POST['days'];
	//echo $cur	
	
	if($ext=='30')
	 {//addtodb();
		date_add($date,date_interval_create_from_date_string('30days'));
	    $edate=date_format($date,"Y-m-d");
		mysql_query("update  user set extdate='$edate' ,status='extended' where user_id='$id' ")or die(mysql_error());

		
	 }
	 if($ext=='60')
	 {	
		date_add($date,date_interval_create_from_date_string('60days'));
	    $edate=date_format($date,"Y-m-d");
		
		mysql_query("update  user set extdate='$edate' ,status='extended' where user_id='$id' ")or die(mysql_error());
	 }
	 if($ext=='90')
	 {	
		date_add($date,date_interval_create_from_date_string('90days'));
	    $edate=date_format($date,"Y-m-d");
		mysql_query("update  user set extdate='$edate' ,status='extended' where user_id='$id' ")or die(mysql_error());
	 }
	 if($ext=='180')
	 {	
		date_add($date,date_interval_create_from_date_string('180days'));
	    $edate=date_format($date,"Y-m-d");
		mysql_query("update  user set extdate='$edate' ,status='extended' where user_id='$id' ")or die(mysql_error());
	 }
	 if($ext=='360')
	 {	
		date_add($date,date_interval_create_from_date_string('360days'));
	    $edate=date_format($date,"Y-m-d");
		mysql_query("update  user set extdate='$edate' ,status='extended' where user_id='$id' ")or die(mysql_error());
	 }
	
	 
	/*if($ext=='60')
	if($ext=='90')
	if($ext=='180')
	if($ext=='360')

	$ext=$_POST['days'];
	if($ext=='30')
	{if($bal>=30)
		$bal-=30;
	 else
	 	echo "You dont have Sufficient bank balance";
	}
	else if($ext=='60')
	{if($bal>=30)
			$bal-=60;
	 else
	 	echo "You dont have Sufficient bank balance";
	}
	else if($ext=='90')
	{if($bal>=30)
			$bal-=90;
	 else
	 	echo "You dont have Sufficient bank balance";}
	else if($ext=='180')
	{if($bal>=30)
			$bal-=180;
	 else
	 	echo "You dont have Sufficient bank balance";}	
	else if($ext=='360')
	{if($bal>=30)
		$bal-=360;
	 else
	 	echo "You dont have Sufficient bank balance";
		}
		*/
		
		
		
		header("location:usersnhome.php");
}
?>
