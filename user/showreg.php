<?php
$id=$_GET["idofs"];// id?=
include("../connection.php");
$qu="<select name='select2' id='c'>";
$re=mysql_query("select  district_name from districtregistration where state_id='$id'");
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