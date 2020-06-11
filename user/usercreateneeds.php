
<?php include("../connection.php"); ?>
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
if(isset($_POST['btnsubmit']))
{
	$category=$_POST['selectitem'];
	$pname=$_POST['txtpname'];
	$discription=$_POST['txtademand'];
	$district=$_POST['select'];
	$city=$_POST['c'];
	$withdate=$_POST['txtdate'];
	$status="Under Admin Veryfications";
	$qry=mysql_query("insert into need(user_id,category,p_name,Descriptions,district,city,post_date,with_date,owner_mail,status) values('$id','$category','$pname','$discription','$district','$city','$date','$withdate','$email','$status')") or die(mysql_error());
	//$qry=mysql_query("insert into login(username,password,type) values('$email','$pswd','employee')") or die(mysql_error());
?>
<script type="text/javascript">
alert("Thanks....! Please Wait Admin Approval");
//window.location="admin employee reg.php";
</script>
<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript" type="text/javascript">
            var xmlHttp;
            function showname(to){
				//alert(to)
                if (typeof XMLHttpRequest != "undefined"){
                xmlHttp= new XMLHttpRequest();
                }
                else if (window.ActiveXObject){
                    xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (xmlHttp==null){
                    alert("Browser does not support XMLHTTP Request")
                    return;
                }
                var url="showcity.php";
                url +="?name=" +to
                xmlHttp.onreadystatechange = stateChange;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }
            
            
            function stateChange(){
                if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
					//alert(xmlHttp.responseText)
                    document.getElementById("c").innerHTML=xmlHttp.responseText   
                }
			}
</script>
</head>
<?php include("userspannel.php")?>
<body>
<form action="" method="post">
<table width="626" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><b>POST A NEW NEED ...!</b></td>
    </tr>
  <tr>
    <td width="277">&nbsp;</td>
    <td width="339">&nbsp;</td>
  </tr>
  <tr>
    <td>Select Your Category</td>
    <td><label for="txttitle"></label>
      <label for="selectitem"></label>
      <select name="selectitem" id="selectitem" required="required">
      <option value="">Select</option>
        <option value="Mobiles &amp; Tablets">Mobiles &amp; Tablets</option>
          <option value="Computers &amp; Laptops">Computers &amp; Laptops</option>
          <option value="Electronics">Electronics</option>
          <option value="Vehicles">Vehicles</option>
          <option value="Pets">Pets</option>
          <option value="Life Style">Life Style</option>
          <option value="Bags,Wallets &amp; Luggage">Bags,Wallets &amp; Luggage</option>
            <option value="Health and beauty">Health and beauty</option>
            <option value="Kitchen">Kitchen</option>
            <option value="Ttoys &amp; Baby Products">Ttoys &amp; Baby Products</option>
            <option value="Sports &amp; Fitness">Sports &amp; Fitness</option>
            <option value="Books">Books</option>
           <option value="Entertainment">Entertainment</option>
           <option value="Used &amp; Refurbished">Used &amp; Refurbished</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Product Name / Title</td>
    <td><label for="txtpname"></label>
      <input type="text" name="txtpname" id="txtpname" required="required" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Demands / Descriptions</td>
    <td><label for="txtademand"></label>
      <textarea name="txtademand" id="txtademand" cols="45" rows="5" required="required"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
 <td>District</td>
      <td>
        <select name="select" id="select" onChange="showname(this.value)" required="required">
	   <option value="">Select</option>
	  <?php 
	   $re=mysql_query("select * from district");
	  	while($row=mysql_fetch_array($re)){
	  ?>
	  <option value="<?php echo $row[0]?><?php echo $row[1]?>"><?php echo $row[1]?></option>
	  <?php }?>
      </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td>City</td>
      <td>
        <select name="c" id="c" required="required">
        <option>Select</option>
      </select></td>
      
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>With In Date(mm/dd/YYYY)</td>
    <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate" required="required" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
  </tr>
</table>
</form>
<?php include("footer.php")?>
</body>

</html>