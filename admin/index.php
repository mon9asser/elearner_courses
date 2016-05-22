<?php 
    $access_file = dirname(__FILE__)."/../privates/protected_access.php";
    if(is_file($access_file)) require_once $access_file ;
    
?>
﻿<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/admin.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    <head>
    	<!-- -------------------------------------------------------------------------------- -->
    	<!-- ------------------------------------ Header ------------------------------------ -->
    	<!-- -------------------------------------------------------------------------------- -->
    	<?php
    		$header_file = dirname(__FILE__). "/admin_includes/header.php";
    		if(is_file($header_file)) require_once $header_file ;
    	?>

       <body>  
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <!-- Menu bar item -->
                    <div class="sidebar">
                         <!-- Menu Side Bar -->
                        <?php
                            $menu_bar = dirname(__FILE__)."/admin_includes/side_menu.php";
                            if(is_file($menu_bar)) require_once $menu_bar ;
                        ?>
                    </div>
                    <!-- End Menu bar item -->
                </div>
                <div class="span9">
                    <!-- Start container of home admin -->
                    <div class="content">
                        <div class="btn-controls">
                            <div class="btn-box-row row-fluid">
                                <a href="#" class="btn-box big span4"><i class="icon-user"></i><b>15</b>
                                        <p class="text-muted">
                                              Users</p>
                                </a>
                                <a href="#" class="btn-box big span4">
                                    <i class=" icon-inbox"></i>
                                    <b>65</b>
                                     <p class="text-muted">
                                        Tutorials
                                     </p>
                                </a>
                                
                                <a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                        <p class="text-muted">
                                            Profit
                                        </p>
                                </a>
                            </div>
                            <div class="btn-box-row row-fluid">
                                <div class="span12">
                                   <div class="row-fluid">
                                        <div class="span12">
                                                <a href="#" class="btn-box small span4">
                                                    <i class="icon-envelope"></i>
                                                     <b>65</b>
                                                     <p class="text-muted">
                                                        Messages
                                                     </p>
                                                </a>
                                               
                                            <a href="#" class="btn-box small span4">
                                                    <i class="menu-icon icon-user-md"></i>
                                                     <b>65</b>
                                                     <p class="text-muted">
                                                        Admins
                                                     </p>
                                                </a>
                                             <a href="#" class="btn-box small span4">
                                                    <i class="icon-menu-icon icon-trophy"></i>
                                                     <b>65</b>
                                                     <p class="text-muted">
                                                        Transactions 
                                                     </p>
                                                </a>
                                        </div>
                                    </div>
                                      <div class="row-fluid">
                                        <div class="span12 user-info">
                                            <b>Current login info.</b>
                                            <div class="clearfix"></div>
                                            <div class="user-data">
                                                <div class="span2">
                                                    <center>
                                                     <img class="avat" src="../user_images/man_avatar.jpg" />
                                                        </center>
                                                 </div>
                                               <div class="span10">
                                                 <div class="some-info">
                                                     <div class="userss"><strong>Montasser Mossallem</strong></div>
                                                     <div class="userss"><font><strong>Email </strong> moun2030@gmail.com</font></div>
                                                       <div class="userss">
                                                           <strong> Admin permission </strong> That can manage anything in website Like transactions , funds , users , website settings etc. 
                                                       </div>
                                                 </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                             
                                 
                                
                            </div>
                        </div>
                    </div>
                    <!-- End container of home admin -->
                </div>
            </div>
        </div>
    </div>
        
        
    	<?php
            $footer_file = dirname(__FILE__)."/admin_includes/footer.php";
            if(is_file($footer_file )) require_once $footer_file  ;
        ?>
   

    </body>
</html>