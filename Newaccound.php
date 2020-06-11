<?php require_once('Connections/need.php'); ?>
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
$ign="no";
$regstatu="free";
$regdate=date('d-m-Y');
if(isset($_POST['button'])) {
  $insertSQL = sprintf("INSERT INTO user (contact, email, password,status,regdate,ign) VALUES (%s, %s, %s,'$regstatu','$regdate','$ign')",
                       GetSQLValueString($_POST['txtcontact'], "text"),
                       GetSQLValueString($_POST['useremail'], "text"),
                       GetSQLValueString($_POST['cpassword'], "text"));

  mysql_select_db($database_need, $need);
  $Result1 = mysql_query($insertSQL, $need) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<script type="text/javascript">
    function validate()
	
	{
		var password=document.getElementById("password").value;
		var cpassword=document.getElementById("cpassword").value;
		if (password != cpassword )
		{
			alert("Password Not Matched");
		}

    if(document.getElementById("txtcontact").value.length!=10)

     {

                alert("Your  contact number seems incorrect!");

               document.getElementById("txtcontact").focus();

               return false;

     }
if(isNaN(document.getElementById("txtcontact").value))

               {

          alert("Postal code must be Numeric!");

          document.getElementById("txtcontact").focus();

      return false;

               }
  
 return true;
   
}
</script>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OPN</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img height="100" width="300" src="LOGO.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                               
                                    <hr />
                                    <form name="form" action="<?php echo $editFormAction; ?>" method="POST">
                                    <h5>Enter Email and Password to register</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"  ></i></span>
                                    <input type="email" class="form-control" placeholder="Enter Your Email" id="useremail" alt="abc@xyz.com" name="useremail" required/>
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"   placeholder="Your Password" id="password" name="password"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-save"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Conform Your Password" id="cpassword" name="cpassword"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"  ></i></span>
                                            <input type="number" class="form-control"  placeholder="Your Contact Number" id="txtcontact" name="txtcontact" />
                                        </div>
                                 
                                  <!--<input  type="submit" name="btnlogin" id="btnlogin" value="Login Now" class="btn btn-primary onclick=" return validate();" >-->					<div align="right">
                                  <input type="submit" name="button" id="button" value="Sign up"  class="btn btn-primary" onclick=" return validate();" />						</div>
                                    <hr />
                                    Have An Accound ? <a href="login.php" >click here </a> or go to <a href="index.php">Home</a>
                                    <input type="hidden" name="MM_insert" value="form"> 
                                   
                            </div>
                           
                        </div>
                </form>
                
        </div>
    </div>

</body>
</html>
