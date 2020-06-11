<?php include("connection.php");?>
<?php
$lastdate="";
$datet="";
$dif="";
$cdate=date('Y-m-d');

if(isset($_POST['login']))
{
	$uname=$_POST['username'];
	$pswd=$_POST['password'];	
	$ign="no";
	$qry=mysql_query("select * from USER where email='$uname' and password='$pswd' and ign='$ign'")or die (mysql_error());
	if(mysql_num_rows($qry)>0)
	{
		$arra=mysql_fetch_array($qry);
		$id=$arra['user_id'];	
		$email=$arra['email'];
		$crdate=$arra['regdate'];
		$extdate= $arra['extdate'];
		
	    $lastdate= strtotime($arra['regdate']);//$lastdate= strtotime($row_viewneed['with_date']);
	    $datet=strtotime(date('d-m-Y'));//current date
	        //$postdate=strtotime($row_pdetiles['post_date']);
			//echo $lastdate;
			//echo $postdate;
	    $dif=abs($lastdate+$extdate-$datet)/86400;//remaning days
		
		
			 
		
		session_start();
		$_SESSION["user_id"]=$id;
		$_SESSION["email"]=$email;
		
		
		
	
		//*******************************************
		if($arra['status']=='extended') 
		{
			if($cdate<=$extdate)
			{
				
				header("location:user/usersnhome.php");
			}
			else
				//header("location:user/renew.php");
				echo "null";
		}
		
		//***********************************
		else if($arra['status']=='free')
		{
			if($dif<=30)
			{
				header("location:user/usersnhome.php");	
			}
		
		 	else if($dif>=30)	
		 	{
				header("location:user/renew.php");
		    }
		}
		//******************************************* 
	}
	else
	{
?>
<script type="text/javascript">
alert("Incorrect Username or Password or you have been blocked contact team opn to recover your account")
window.location="login.php"
</script>
<?php } }?>
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
                                <form  method="post">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username " name="username" id="username" required="" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" id="password" name="password" class="form-control"  placeholder="Your Password" required="" />
                                        </div>
                                   <!-- <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="index.html" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                   <a href="index.html" class="btn btn-primary ">Login Now</a>-->
                                   <div align="right" >
                                     <input name="login" type="submit" class="btn btn-primary " id="login" value="Log In">
                                     </div>
                                  <hr />
                                    New User ? <a href="Newaccound.php" >click here </a> or go to <a href="index.php">Home</a> 
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
