<?php include("../connection.php"); ?>
<?php
$datet="";
$date=date('Y-m-d');
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
//if(isset($_REQUEST['button']))
//{
//	$_SESSION['id']=null;
//	unset($_SESSION['id']);
//	header("location:index.php");
//}
?>
<?php
$cot=0;
$query=mysql_query("SELECT COUNT(*) c FROM NEED WHERE user_id!='$id' and NEED.with_date >='$date' ");

$row = mysql_fetch_assoc($query);
$cot= $row['c'];
?>

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
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="userspannel.php">Online Posting of Needs</a>
            </div>

            <div class="header-right">

                <a href="User Reply Needs.php" class="btn btn-info" title="New Message"><b><?php echo $cot;?> </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <!--<a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>-->
                <a href="../logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <?php
$qr=mysql_query("select * from USER where user_id='$id'") or die (mysql_error());

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>
                        <div class="user-img-div">
                            <img src="profile/<?php echo $arra[8]?>" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $arra[1]?>
                            <br />
                                <small><?php echo $arra[7]?> </small>
                            </div>
                            <?php }}?>
                        </div>

                    </li>


                    <li>
                        <a href="usersnhome.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="userupdateprofile.php"><i class="fa fa-photo"></i>Update Profile</a>
                    </li>
                    <li>
                        <a href="usercreateneeds.php"><i class="fa fa-newspaper-o"></i>Post Needs</a>
                    </li> 
                    <li>
                        <a href="user need status.php"><i class="fa fa-star"></i>Need Status</a>
                    </li> 
                    <li>
                        <a href="User Reply Needs.php"><i class="glyphicon glyphicon-eye-open"></i>View Users Needs </a>
                    </li> 
                    <li>
                        <a href="usersreplychats.php"><i class="fa fa-reply"></i>Messages </a>
                    </li> 
                     <li>
                        <a href="User feedback.php"><i class="fa fa-comment"></i>Post Your Feed Back</a>
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
                       
                   