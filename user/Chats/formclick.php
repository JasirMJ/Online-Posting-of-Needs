
<?php
include("../../connection.php");
?>
<?php
/*
 dbcon db=new dbcon();
 Connection con =db.getcon();
 String sno=request.getParameter("c");
 Statement s=con.createStatement();
 ResultSet rs=s.executeQuery("select * from register where sl_no='"+sno+"' ");
 
String html="<table border='2'><tr><td colspan=6 align='center'> Display Board</td></tr><tr><td> ID</td><td> NAME</td> <td> LOCATION</td> <td> PHONE</td> </tr>";

      while(rs.next())
      {
           html=html+"<tr border=1><td>";
           html=html+rs.getString(1);
           html=html+"</td><td>";
           html=html+rs.getString(2);
           html=html+"</td><td>";
           html=html+rs.getString(5);
           html=html+"</td><td>";
           html=html+rs.getString(8);
           html=html+"</td></tr>";
     }
    html=html+"</Table>";
    
   // JOptionPane.showMessageDialog(null, "eeeeeeee");
   */
   $s="";
   //$msg1="";
   
   try{
 		$msg1=$_GET['c'];
  
  
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
$UNAME="";
if(isset($_SESSION['UNAME']))
{
	$UNAME=$_SESSION['UNAME'];
	//echo $UNAME;
}

//echo "From id ".$id." <br>";
//$userid=2;
	$str="insert into CHAT(msg,fromid,toid,status,attime) values('$msg1','$id','$UNAME','off',now())";
	mysql_query($str);
	 $s="<label>send</label>";
 }
  catch(Exception $e)
  {
  $s="<label>notsend</label>";
  } 
echo $s;
   
?>
