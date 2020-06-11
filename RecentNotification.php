
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
$date=date('d-m-Y');
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
    <title>Recent Notification</title>

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
                <a  href="index.html"><img class="navbar-brand" src="LOGO.png"/></a>
            </div>

            <div class="header-right">

    
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
                           <h1>Welcome</h1>

                             <div class="inner-text">
                                
                            <br />
                                <small> </small>
                            </div>
							<?php }}
							?>
                        </div>

                    </li>


                    <li>
                        <a  href="index.php"><i class="fa fa-home"></i>Home</a>
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
                        <a href="#"><i class="fa fa-bell"></i>Recent Notifications</a>
                    </li>
                     <li>
                        <a href="about.php"><i class="fa fa-map-marker"></i>About</a>
                    </li>
                     
                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row"></div>
                
               <!--- <div class="col-md-4">-->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Recent Notifications
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="chat-widget-main">
 <?php
$qr=mysql_query("select * from needregistration where status=' Admin Aproved'") or die (mysql_error());
/*SELECT * FROM needregistration WHERE needregistration.user_id!='$id' and needregistration.with_date >='$date*/

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>

                                    <div class="chat-widget-right">
                                        I Wanted A <?php echo $arra[2].$arra[3].$arra[3] ?>.
                                    </div>
                                    <div class="chat-widget-name-right">
                                        <h4><?php echo $arra[9]?> </h4>
                                    </div>
 <?php }}?>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                      <!---  </div>-->


                
              <div class="row"><!-- /.REVIEWS &  SLIDESHOW  -->

                    <!--/.Chat Panel End-->
              </div>
              
                <!-- /. ROW  -->


             <div id="carousel-example" class="carousel slide" data-ride="carousel" style="border: 5px solid #000;">

                                <div class="carousel-inner">
                                    <div class="item active">

                                        <a href="https://www.flipkart.com"><img src="assets/img/slideshow/1a.jpg" alt="" /></a>

                                    </div>
                                    <div class="item">
                                        <a href="www.amazon.in"><img src="assets/img/slideshow/2b.jpg" alt="" /></a>

                                    </div>
                                    <div class="item">
                                       <a href="https://www.snapdeal.com"> <img src="assets/img/slideshow/3a.jpg" alt="" /></a>

                                    </div>
                                </div>
                                <!--INDICATORS-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                </ol>
                                <!--PREVIUS-NEXT BUTTONS-->
                                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
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
