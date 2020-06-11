<?php include("../connection.php"); ?>
<?php
/*
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
}
else
{
	header("location:error.php");
}
if(isset($_REQUEST['button']))
{
	$_SESSION['id']=null;
	unset($_SESSION['id']);
	header("location:index.php");
}*/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<title>OPN</title>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Onile Posting Of Needs</a>
            </div>

            <div class="header-right">

               <!-- <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>-->
                <a href="../index.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="#">
                            

                            <div class="inner-text">
                                <img src="../LOGO.png" width="700"  height="20" class="img-thumbnail" />
                            </div>
                           
                        </div>

                    </li>


                    <li>
                        <a href="adminhome.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                    
                    <li>
                        <a href="Needs Verification.php"><i class="fa fa-photo"></i>Needs Verification</a>
                    </li>
                    <li>
                        <a href="Admin Needs History.php"><i class="fa fa-history"></i>Needs History</a>
                    </li> 
                    <!-- <li>
                        <a href="Admin Add gallery.php"><i class="fa fa-camera"></i>Add Gallery</a>
                    </li>
                     <li>
                        <a href="Update Location.php"><i class="fa fa-newspaper-o"></i>Update location</a>
                    </li>-->
                     <li>
                        <a href="manageads.php"><i class="fa fa-newspaper-o"></i>Manage Adverticement</a>
                    </li>
                     <li>
                        <a href="feedback.php"><i class="fa fa-chain"></i>Feedbacks</a>
                    </li>
                     <li>
                        <a href="manageuser.php"><i class="fa fa-chain"></i>Registered Users</a>
                    </li>
                    <li>
                        <a href="changepass.php"><i class="fa fa-lock"></i>Change Password</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

               <div class="row">
                    <div class="col-md-12">
                       
