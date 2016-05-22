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
                                    <div class="module-option clearfix usercontrole">
                                             
                                              <div style="width: 300px;" class="input-append pull-left">
                                                  <input id="searchByEmail" type="text" style="width: 100%;" class="span3" placeholder="Filter by email (Write email then hit enter) ">
                                             </div>
                                            
                                            <div class="btn-group pull-right" data-toggle="buttons-radio">
                                                <button id="all" onclick="get_page('all');" type="button" class="btn">
                                                    All</button>
                                                <button id="admins" onclick="get_page('admins');" type="button" class="btn">
                                                    Admins</button>
                                                <button id="users" type="button" onclick="get_page('users');" class="btn">
                                                    Users</button>
                                            </div>
                                        </div>
                    <!-- Start container of home admin -->
                    <div id="user-data-info" class="content usercontrole">
                         <!-- Load all users -->
                          <?php
                            $all_users = dirname(__FILE__)."/user_types/all.php";
                            if(is_file($all_users)) require_once $all_users ;
                          ?>
                     </div>
                   
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

<script src="scripts/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        window.get_page = function (page){
           
               $.ajax({
                     url : 'user_types/'+page+'.php'  ,
                     type : 'POST' , 
                     beforeSend : function (){
                          $('#user-data-info').html("<center><img src='images/chart_loading.gif' /></center>");
                     } ,
                     success: function (responsed){
                         $('#user-data-info').html(responsed);
                         
                     }
                    });  
        }
        
        $('#searchByEmail').keyup(function(e){
            if(e.keyCode == 13)
                {
                    var values = $(this).val();
                    if(values  != ''){
                        $.ajax({
                            url : 'user_types/get_by_email.php'  ,
                            type : 'POST' , 
                            data : {'email':$.trim(values)} , 
                            success: function (responsed){
                                $('#user-data-info').html(responsed);
                            }
                        });
                    }
                        
                }
        });
    });
</script>
 