<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php
 $v1="";
 $v2="";
 $v3="";
 echo $v3;
 
if(isset($_Post["result"]))
{
 $v1=$_post["txt1"];
 $v2=$_post["txt2"];
 $v3=$v1+$v2;
 echo $v3;
}
if(isset($_Post['clr']))
{
 $v1="";
 $v2="";
 $v3="";
}
?>


<form method="post" name="form1">
<div align="center" >
<table >
<tr><td><label>Value 1</label></td><td><input type="text" name="txt1" id="txt1" value="<?php echo $v1; ?>" /></td></tr>
<tr><td><label>Value 2</label></td><td><input type="text" name="txt2" id="txt2" value="<?php echo $v2; ?>" /></td></tr>
<tr><td><label>Value 3</label></td><td><input type="text" name="txt3" id="txt3" value="<?php echo $v3; ?>" /></td></tr>	
</table>
<input type="submit" name="result" id="result" value="Result" />
<input type="submit" name="clr" id="clr" value="Clear" />
</div>

</form>


</body>
</html>