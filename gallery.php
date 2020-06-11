
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
    <title>Gallery</title>

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
                            <h1>Welcome</h1>

                            <div class="inner-text">
                                
                            <br />
                                <small> </small>
                            </div>
							<?php }}
							?>
                        </div>

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
                </ul
                 
                ></ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Gallery</h1>
                        <h1 class="page-subhead-line">Our Gallery </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div id="port-folio">
                      <div class="row " >
                          <ul id="filters" >
						<li><span class="filter active" data-filter="landscape nature awesome">All </span></li>
						<li><span class="filter active">/</span></li>
						<li><span class="filter" data-filter="landscape">Landscape</span></li>
						<li><span class="filter">/</span></li>
						<li><span class="filter" data-filter="nature">Nature</span></li>
						<li><span class="filter">/</span></li>
						<li><span class="filter" data-filter="awesome">Awesome</span></li>
					</ul>
                    <?php
$qr=mysql_query("select * from gallery ") or die (mysql_erro());

if(mysql_num_rows($qr)>0)
{
	while($arra=mysql_fetch_array($qr))
	{
 
?>
                <div class="col-md-4 ">

                    <div class="portfolio-item awesome mix_all" data-cat="awesome" >


                        <img src="admin/news/<?php echo $arra[2]?>" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                <?php echo $arra[1]?>
                                </span>
                                On : <?php echo $arra[3] ?>
                            </p>
                            <a class="preview btn btn-info " title="<?php echo $arra[1]?>" href="admin/news/<?php echo $arra[2]?>"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                <?php }} ?>
               <!--
               <div class="col-md-4 ">

                    <div class="portfolio-item landscape mix_all" data-cat="landscape" >


                        <img src="assets/img/portfolio/b.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/b.jpg"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                
                <!--<div class="col-md-4 ">

                    <div class="portfolio-item nature mix_all" data-cat="nature" >


                        <img src="assets/img/portfolio/c.png" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/c.png"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row " style="padding-top: 50px;">
                <div class="col-md-4 ">

                    <div  class="portfolio-item nature mix_all" data-cat="nature" >


                        <img src="assets/img/portfolio/d.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                           <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info " title="Image Title Here" href="assets/img/portfolio/d.jpg"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div  class="portfolio-item nature mix_all" data-cat="nature" >


                        <img src="assets/img/portfolio/e.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/e.jpg"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div  class="portfolio-item nature mix_all" data-cat="nature" >


                        <img src="assets/img/portfolio/h.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/h.jpg"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>

            </div>
                    <div class="row "  style="padding-top: 50px;" >
                <div class="col-md-4 ">

                    <div  class="portfolio-item nature mix_all" data-cat="nature" >


                        <img src="assets/img/portfolio/g.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview  btn btn-info" title="Image Title Here" href="assets/img/portfolio/g.jpg"> <i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div  class="portfolio-item awesome mix_all" data-cat="awesome" >


                        <img src="assets/img/portfolio/b.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/b.jpg"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div  class="portfolio-item nature landscape mix_all" data-cat="nature landscape" >


                        <img src="assets/img/portfolio/c.png" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                                <span>
                                Image Orinagal Size: 750x500
                                </span>
                               
                                PROJECT TITLE HERE
                            </p>
                            <a class="preview btn btn-info" title="Image Title Here" href="assets/img/portfolio/c.png"><i class="fa fa-plus fa-2x"></i></a>

                        </div>
                    </div>
                </div>
-->
            </div>
                </div>
               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  --><!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <!-- CUSTOM Gallery Call SCRIPTS -->
    <script src="assets/js/galleryCustom.js"></script>
    <?php include('footer.php') ?>
</body>
</html>
