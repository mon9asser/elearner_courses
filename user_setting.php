
 <?php

            $fileAccss = dirname(__FILE__)."/privates/private_access.php";
            if(is_file($fileAccss ))    require_once $fileAccss  ;

      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link href="css/home.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      
      <!-- ----------------------------------------------------------------------------------- -->
      <!-- ------------------------------------- HEADER -------------------------------------- -->
      <!-- ----------------------------------------------------------------------------------- -->
      <?php
        $header_file = dirname(__FILE__)."/parts/header.php";
        if(is_file($header_file))   require_once $header_file ;
      ?>
      
      
      <?php
       // Get info about current user
         $userApps = dirname(__FILE__)."/modular/apis/user_apis.php";
            if(is_file($userApps )) require_once $userApps ;
            
         $userApps = new user_apis();
         $userInfo = $userApps->user_application_check_exist(['id'=>$_SESSION['user_info']['id']]);
      ?>
      <section style="min-height: 600px;" class="container-fluid testmonalisa tester">
         <div class="container-fluid" style="margin-top: -30px; margin-left: 100px;">
              <div class="row">
                  <div class="col-xs-12">
                      <h1 style="color: #e60d2d;" class="headlin-feature-course">
                     <span class="main-name">User setting</span>
                        <div class="search-block"></div>
                      </h1>
                  </div>
                </div> 
          </div>
         <div class="container">
             <div class="" style="overflow: hidden; height: auto;">
                
                 <div class="container">
                     <center>
                         <b id="loadingResultes"></b>
                     </center>
                     
                 </div>
                 <table class="table">
                      
                      <tr>
                          <td class="text-right"> <label class="labels">Profile Picture</label></td>
                          <td> <input id="profile_picture" class="item-input" type="file"  /></td>
                      </tr>
                      <tr>
                          <td class="text-right"> <label class="labels">First Name</label></td>
                          <td> <input id="first_name" class="item-input" type="text" placeholder="<?php if($userInfo->first_name != NULL) echo $userInfo->first_name;?>"/></td>
                      </tr>
                      
                      <tr>
                          <td class="text-right"> <label class="labels">Second Name</label></td>
                          <td> <input id="second_name" class="item-input" type="text" placeholder="<?php if($userInfo->second_name != NULL) echo $userInfo->second_name;?>" /></td>
                      </tr>
                      
                      <tr>
                          <td class="text-right"> <label class="labels">email</label></td>
                          <td> <input id="email" class="item-input" type="text" placeholder="<?php if($userInfo->email != NULL) echo $userInfo->email;?>" /></td>
                      </tr>
                      
                      <tr>
                          <td class="text-right"> <label class="labels">Old Password</label></td>
                          <td> <input id="old_password" class="item-input" type="text" placeholder="" /></td>
                      </tr>
                      
                      <tr>
                          <td class="text-right"> <label class="labels">New Password</label></td>
                          <td> <input id="new_password" class="item-input" type="text" placeholder="" /></td>
                      </tr>
                      
                       
                      
                      <tr>
                          <td class="text-right"> <label class="labels"> mobile</label></td>
                          <td> <input id="mobile" class="item-input" type="text" placeholder="<?php if($userInfo->mobile != NULL) echo $userInfo->mobile;?>" /></td>
                      </tr>
                      
                     <tr>
                          <td class="text-right">  </td>
                          <td> 
                              <div onclick="update_user_setting();" style="padding-right: 20px; padding-left: 20px; float: right;" class="btn btn-danger">Update</div>
                          </td>
                      </tr>
                  </table>
             </div>  
         </div>
          
     </section>
      
      <section class="feauture_skills">
           
      </section>
      
       <!-- -------------------------------------------------------------- -->
      <!-- ------------------------- Footer ----------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <?php
        $footer_file = dirname(__FILE__)."/parts/footer.php";
        if(is_file($footer_file )) require_once $footer_file  ;
      ?>
      
      
      
      
      
      
      
      
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/application.js"> </script>
    <script type="text/javascript">
        $(document).ready(function (){
             
            window.update_user_setting = function () {
                var profile_picture = document.getElementById('profile_picture');
                var first_name = document.getElementById('first_name');
                var second_name = document.getElementById('second_name');
                var email = document.getElementById('email');
                var old_password = document.getElementById('old_password');
                var new_password = document.getElementById('new_password');
                var mobile = document.getElementById('mobile');
                
                var result = document.getElementById('loadingResultes') ;
                
                
                  var forma = new FormData();
                 if(profile_picture.value != '' )
                     {
                         if(profile_picture.files[0].size > 40000) {
                            profile_picture.style.border = "1px solid tomato";
                             result.style.color = "tomato";
                            result.innerHTML = "This photo is too large please image must be less than 40 kb ";
                            return false ;
                        }else {
                           forma.append('profile_picture' , profile_picture.files[0]);
                           profile_picture.style.border = "1px solid #eee";
                             result.style.color = "green";
                            result.innerHTML = ""; 
                        }
                     }
                 
                
                  
                  forma.append('first_name',first_name.value);
                  forma.append('second_name',second_name.value);
                  forma.append('email',email.value);
                  forma.append('old_password',old_password.value);
                  forma.append('new_password',new_password.value);
                  forma.append('mobile',mobile.value);
                  
               
                  
             
            $.ajax({
                url:'controler/user_setting_controler.php',
                    type:'POST',
                    data : forma , 
                    processData: false,
                    contentType: false,
                    beforeSend : function  (){} ,
                    success : function (responsed) {
                      var htmlData  = $.trim (responsed);
                      $('#loadingResultes').html(responsed); 
                      console.log(htmlData);
                    }
            });
            }
            
        });
    </script>
  </body>
</html>
