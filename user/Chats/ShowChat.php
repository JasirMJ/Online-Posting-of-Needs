
<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['user_id']))
{
	$frmid=$_SESSION['user_id'];
}
else
{
	header("location:error.php");
}
$UNAME="";
if(isset($_SESSION['UNAME']))
{
	$tid=$_SESSION['UNAME'];
	echo $UNAME;
}

//echo "From id ".$id." <br>";
?>
<?php
    
	include("../../connection.php");
   	//$frmid=2;
  	//$tid=3;
    $rs=mysql_query("select * from chat order by id ",$con);
 
    $html="<table id=tbl'' style='width: 500px;' >";//"<table border='2'><tr><td colspan=6 align='center'> Display Board</td></tr><tr><td> ID</td><td> NAME</td> <td> LOCATION</td> <td> PHONE</td> </tr>"
      while($r=mysql_fetch_array($rs))
      {
          $html.="<tr border=1><td>";
          $html.="<div  ";
          if(($r['fromid']==$frmid)&&($r['toid']==$tid))
              $html.="align='right' style=background-color:#CCFFCC>";
          else if(($r['fromid']==$tid)&&($r['toid']==$frmid))
             $html.="align='left' style=background-color:#FFFFCC>"; 
          $html.=$r['msg'];
          $html.="</div></td></tr>";
          
           /*html=html+"<tr border=1><td>";
           html=html+rs.getString(1);
           html=html+"</td><td>";
           html=html+rs.getString(2);
           html=html+"</td><td>";
           html=html+rs.getString(5);
           html=html+"</td><td>";
           html=html+rs.getString(8);
           html=html+"</td></tr>";*/
     }
    $html.="</Table>";
    
   // JOptionPane.showMessageDialog(null, "eeeeeeee");
    
    echo $html;
?>
