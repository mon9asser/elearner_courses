<?php 
ob_start();
if(session_id() =='')
session_start () ; 

    $access_file = dirname(__FILE__)."/../privates/protected_access.php";
    if(is_file($access_file)) require_once $access_file ;
    if(!isset($_GET['courseId']))
    {
        header('location: toutorials.php');
        exit(1);
    }
     if($_GET['courseId'] == ''){
        header('location: toutorials.php');
        exit(1);
     }
     
     // check if this category exists 
     $file_categ = dirname(__FILE__)."/../modular/apis/course_tutorial_key_apis.php";
     if(is_file($file_categ )) require_once $file_categ  ;
     
     
     $category_apis = new course_tutorial_title();
     $cat = $category_apis->coursetutkey_application_check_exist([
         'id'=>trim($_GET['courseId'])
     ]);
     if($cat == NULL )
     {
          header('location: toutorials.php');
        exit(1);
     }
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
      
        <link href="../css/jquery.filer.css" type="text/css" rel="stylesheet" />
        <link href="../css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
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
                  
                    <div class="header-block">
                        <h4 style="color: #46a546;"> <a href="toutorials.php"> Category Name </a> > <a href="toutorials.php">course name </a></h4>
                    </div>
                   
                    <div class="header-block">
                          <h3>Add more than one lesson in one time</h3>
                          <p class="help-block">
                              You must rename Video of file before uploading to know it after uploading and to allow you rename and Describe it
                          </p>
                          <div class="add_new_video">
                              <!-- 
                              <form action="controler/upload_modular/upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="files[]" id="filer_input" multiple="multiple">
                                    <input type="submit" value="Submit">
                              </form>
                              -->
                              <div id="content">
                                    <input type="file" course-name="<?php echo $_GET['courseId'];?>" name="files[]" id="filer_input2" multiple="multiple">
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
<script src="../js/jquery.form.js"></script>
  <!--jQuery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../js/jquery.filer.min.js?v=1.0.5"></script>
	<script type="text/javascript" src="../js/custom.js?v=1.0.5"></script>
<?php
 ob_end_flush();
?>
 