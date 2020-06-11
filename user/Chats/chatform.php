
<?php
	$typ="1";
	$uid="";
if(isset($_GET['userid']))
{
	$uid=$_GET['userid'];
}

if(!isset($_SESSION))
{
	session_start();
}
$_SESSION['UNAME']=$uid;
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="newjavascript.js"></script>
<script>
 
  var xmlHttp;
            function shows(mid){
                var a=document.getElementById(mid).value;
                
                
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
                var url="formclick.php?c="+a;
                xmlHttp.onreadystatechange = stateChange;
               
                 xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
        
            }
            
         function stateChange(){
              if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
//                    document.getElementById("nm").innerHTML=xmlHttp.responseText 
//                    var x=xmlHttp.responseText;
//                    var a=x.split('#');
//                    document.getElementById("bcon").value=a[0];
//                    document.getElementById("badd").value=a[1];
                   document.getElementById("txt").innerHTML=xmlHttp.responseText; 
                  // alert("haii");
                }
            }
            
$(document).ready(function() {
 	 $("#chat").load("ShowChat.php");
   var refreshId = setInterval(function() 
   {
      $("#chat").load('ShowChat.php');
   }, 1000);
   $.ajaxSetup({ cache: false });
   
        var rowpos = $('#tbl tr:last').position();

        $('#chat').scrollTop(rowpos.top);
});

</script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>OPN</title>
    </head>
    <body>
       <div align="center"> 
       <?php include("userspannel.php") ?>
       <br>
    <form method="post">
        <div style="overflow: auto;height: 240px; width: 1000px;" id="chat">
            
        </div >  
        
            <table style="width:200px">
            <br>
                    <tr>
                      <td width="229"><input name="t1" id="mg" type="text"  size="40"/></td>
                      <td width="59"><input type="button" name="s1" onClick="shows('mg')"  value="Send" class="btn btn-info active"/></td><tr><td align="center"><a href="../User Reply Needs.php">Back</a></td></tr>
                    <div id="txt"></div>
                    </tr>
            </table>        
   </form>
   <?php include("../footer.php")?>
   </div>
    </body>
</html>
