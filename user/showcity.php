<?php
$id=$_GET["name"];
include("../connection.php");
$qu="<select name='select2' id='c'> ";
$re=mysql_query("select  city_name from city where district_id='$id'");
if(mysql_num_rows($re)>0)
{
while($row=mysql_fetch_array($re))
{
$qu=$qu."<option>".$row[0]."</option>";
}
$qu=$qu."</select>";
}
echo $qu;
?>