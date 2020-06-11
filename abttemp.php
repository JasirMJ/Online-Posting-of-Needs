
<?php include("connection.php"); ?>
<?php
if(!isset($_SESSION))
{
	session_start();
}
$id="";
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
}
?>
<?php
$cot=0;
$query=mysql_query("SELECT COUNT(*) c FROM needregistration WHERE user_id='$id'");

$row = mysql_fetch_assoc($query);
$cot= $row['c'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Need|Home|</title>

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
                <a  href="index.html"><img class="navbar-brand" src="LOGO.png"></a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b><?php echo $cot?> </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="newaccound.php" class="btn btn-primary" title="New Registrations"><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.php" class="btn btn-danger" title="Login Accound"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
              <li>
                        <?php
						if(isset($_SESSION))
{
$qr=mysql_query("select * from userregistration where user_id='$id'") or die (mysql_erro());

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>
                        <div class="user-img-div">
                            <img src="LOGO.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $arra[1]?>
                            <br />
                                <small><?php echo $arra[7]?> </small>
                            </div>
                            <?php }}
							else 
							{
							?>
								
							<div class="user-img-div">
                           <!---<img src="assets/img/giphy.gif" width="700"  class="img-thumbnail" /> --->

                            <div class="inner-text">
                                
                            <br />
                                <small> </small>
                            </div>
							<?php }}
							?>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                  <!--  <li>
                        <a href="notification.html"><i class="fa fa-bell"></i>Notifications</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="invoice.html"><i class="fa fa-coffee"></i>Invoice</a>
                            </li>
                             <li>
                                <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                            </li>
                            
                           
                        </ul>
                    </li>-->
                    <li>
                        <a href="login.php"><i class="fa fa-pencil"></i>Login Now</a>
                    </li>
                    <li>
                        <a href="Newaccound.php"><i class="fa fa-sign-in "></i>New Registrations</a>
                    </li>
                    <li>
                        <a href="RecentNotification.php"><i class="fa fa-bell"></i>Recent Notifications</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-newspaper-o"></i>News</a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="fa fa-camera "></i>Gallery</a>
                    </li>
                     <li>
                        <a href="about.php"><i class="fa fa-map-marker"></i>About</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-map-marker"></i>Contact</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
          <div id="page-inner">
                <div class="row"></div>
                
                <div class="row">
      <div class="col-md-8">
                        <div class="row">
                            
                            
                          </div>
<P><h2> <b>About</b><br>WHAT IS OPN?</h2>&nbsp;</p>
OPN is the web application designed basically for fullfill the daily needs of public through this web application. This used most important developing languages such as HTML,PHP,javaScript and SQL.
<p>The web application derives its name from Online Posting of Needs(OPN). Its name revealing its concept of the web application.
<p>OPN was originally developed in 2016 from some colleague for their academic purpose.
<p><h2>EXPLANATORY</h2>Online Posting of Needs is the expanded form of the OPN. Its mainly focused on the fulfillment of daily needs of public. The registered users adds their needs to our web application and it will notify in the notification page. Public can view the notifications and select one of them if they can fulfill that needs. The later discusssion related to the price, benefit of the provider, transaction mode , place etc are involved in the view message page . The fulfillment of needs are done by here through an agreement .  
<p><h2>EASY USE</h2>The application is mainly focused on the user friendly concept. We used simple using techniques and we were not added a complex concepts in any pages of our application.So every one can use this application simply . The end users can simply handle our web application.
<p><h2>BASED ON NET CONNECTION</h2>
OPN is the web application is based on the internet connection. Its provide an online chating facility between the users. So it needs to an internet connection.
Its not complete a free developers resources. But it is very useful for the public.This Web application also provide current news, related images, variety of images , advertisements etc.
<p><h2>  
                            

                        </div>
                        <!-- /. ROW  -->


                        <div class="panel panel-default"></div>

                        <!-------------------------------start second    --------------------------><!-------------------------------end second--->
                    </div>
                    <!-- /.REVIEWS &  SLIDESHOW  -->
                    <!--/.Chat Panel End-->
          </div>
                <!-- /. ROW  -->


                <div class="row">
                </div>
                <!--/.Row-->
              
                
                <!--/.Row-->
                <!--/.ROW-->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
   </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
      <p><a href="adminlogin.php" target="_blank">Admin</a></p>
</div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
