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
                    <div id="user-data-info" class="content usercontrole">
                         <!-- Load all users -->
                         <div class="titles">Web site setting</div>
                         <div class="container-websetting">
                             <div class="form-vertical">
                                 <div class="form-control">
                                     <label class="name-name">Website Name</label>
                                     <input id="website-setting-name" style="" class=" input-form" />
                                 </div>
                                 
                                 <div class="form-control">
                                     <label class="name-name">Website <br />Description</label>
                                     <textarea id="website-setting-description" style="" class=" input-form"></textarea>
                                 </div>
                                 
                                 <div class="form-control">
                                     <label class="name-name">Website Keywords</label>
                                     <input id="website-setting-keywords" placeholder="Example:- programming course , italian course , design , etc" style="" class=" input-form" />
                                 </div>
                                 
                                 <div class="form-control">
                                     <label class="name-name">Website <br /> Availability</label>
                                     <select onchange="website_available(this);" id="website-setting-availability" class="input-form data-indding">
                                         <option value="0">Online</option>
                                         <option value="1">Offline</option>
                                      </select>
                                 </div>
                                 <div class="form-control"> 
                                     <!-- receiving success -->
                                     <div class="loading-results"> </div>
                                     <button onclick="save_website_setting_data();" class="btn btn-primary input-innary">
                                         Save Data
                                     </button>
                                 </div>
                              </div>
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             <div class="form-vertical">
                                 <h3>Paypal Settings</h3>
                                 <div class="form-control">
                                     <label class="name-name">Client Id</label>
                                     <input id="website-paypal-client-id" style="" class=" input-form" />
                                 </div>
                                 
                                 <div class="form-control">
                                     <label class="name-name">Secret Id</label>
                                     <textarea id="website-paypal-secret-id" style="" class=" input-form"></textarea>
                                 </div>
                                 
                                 <div class="form-control">
                                     <label class="name-name">Paypal Mode</label>
                                     <input id="website-paypal-mode" placeholder="Example:- programming course , italian course , design , etc" style="" class=" input-form" />
                                 </div>
                                  
                                 <div class="form-control"> 
                                     <!-- receiving success -->
                                     <div class="loading-results"> </div>
                                     <button onclick="save_paypal_website_setting_data();" class="btn btn-primary input-innary">
                                         Save Data
                                     </button>
                                 </div>
                              </div>
                         </div>
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
        
        
        
        window.website_available = function (data){
            
           var dataString = {
               'website_availbility':data.value 
           }
           
           $.ajax({
                     url : 'controler/website_setting_controler.php'  ,
                     type : 'POST' , 
                     data : dataString ,
                     beforeSend : function (){
                         $('.loading-results').css('color','tomato');
                         $('.loading-results').html('Saving Data, please wait ...');
                     } ,
                     success: function (responsed){
                         $('.loading-results').css('color','Green');
                         $('.loading-results').html(responsed);
                      }
                    });  
                    
                    
        }
        window.save_website_setting_data = function (){
                var dataString ;
                
        
                     dataString = {
                          'website_name':document.getElementById('website-setting-name').value ,
                         'website_description':document.getElementById('website-setting-description').value ,
                         'website_keywords': document.getElementById('website-setting-keywords').value  
                      };
                     
                     
               $.ajax({
                     url : 'controler/website_setting_controler.php'  ,
                     type : 'POST' , 
                     data : dataString ,
                     beforeSend : function (){
                         $('.loading-results').css('color','tomato');
                         $('.loading-results').html('Saving Data, please wait ...');
                     } ,
                     success: function (responsed){
                         $('.loading-results').css('color','Green');
                         $('.loading-results').html(responsed);
                      }
                    });  
        }
        
        
        window.save_paypal_website_setting_data = function (){
               var dataString ;
                dataString = {
                          'website-paypal-client-id':document.getElementById('website-paypal-client-id').value ,
                         'website-paypal-secret-id':document.getElementById('website-paypal-secret-id').value ,
                         'website-paypal-mode': document.getElementById('website-paypal-mode').value  
                      };
                     
                     
               $.ajax({
                     url : 'controler/paypal_settings.php'  ,
                     type : 'POST' , 
                     data : dataString ,
                     beforeSend : function (){
                         $('.loading-results').css('color','tomato');
                         $('.loading-results').html('Saving Data, please wait ...');
                     } ,
                     success: function (responsed){
                         $('.loading-results').css('color','Green');
                         $('.loading-results').html(responsed);
                      }
                    });  
        }
  
    });
</script>
<?php
 