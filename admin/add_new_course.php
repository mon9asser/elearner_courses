<?php 
ob_start();
if(session_id() =='')
session_start () ; 

    $access_file = dirname(__FILE__)."/../privates/protected_access.php";
    if(is_file($access_file)) require_once $access_file ;
    if(!isset($_GET['categoryId']))
    {
        header('location: toutorials.php');
        exit(1);
    }
     if($_GET['categoryId'] == ''){
        header('location: toutorials.php');
        exit(1);
     }
     
     // check if this category exists 
     $file_categ = dirname(__FILE__)."/../modular/apis/category_apis.php";
     if(is_file($file_categ )) require_once $file_categ  ;
     
     
     $category_apis = new category_apis();
     $cat = $category_apis->category_apis_check_exist([
         'id'=>trim($_GET['categoryId'])
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
                          <h3>Categories</h3>
                          <b style="color: teal; margin: 8px; display: block;">Add Category</b>
                          
                          <form id="add_new_course" action="controler/course_topic_controler.php" method="post"> 
                          <table class="table">
                              <tr>
                                <td>Course Name</td>
                                <td>
                                    <input placeholder="Course Title" name="course_name" id="course_name" class="input_s" type="text" />
                                </td>
                              </tr>
                              <tr>
                                <td>Course Description</td>
                                <td>
                                    <textarea placeholder="Be descreptive" name="course_description" id="course_description"></textarea>
                                </td>
                              </tr>
                             
                              <tr>
                                <td>Course Image Cover</td>
                                <td>
                                    <input name="image_cover" id="image_cover"  class="input_s" type="file" />
                                 </td>
                              </tr>
                              <tr>
                                <td>Course Price</td>
                                <td>
                                    <input placeholder="Price of Course" value="<?php echo $_GET{'categoryId'}; ?>" name="category_name" class="input_s" type="hidden" />
                                    <input placeholder="Price of Course" value="add" name="access_type" class="input_s" type="hidden" />
                                    <input placeholder="Price of Course" name="price_ofcourse" id="price_ofcourse" class="input_s" type="text" />
                                 </td>
                              </tr>
                              <tr>
                                <td>Course For</td>
                                <td>
                                    <textarea placeholder="Insert this char (&) between each line" name="course_for" id="course_for"></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td>Course Will Learn</td>
                               <td>
                                    <textarea placeholder="Insert this char (&) between each line" name="course_will_learn" id="course_will_learn"></textarea>
                                </td>
                              </tr>
                               
                           </table>
                           
                          
                              <div class="header-block">
                                     <div id="status"></div>
                               </div>
                              
                              <div class="header-block text-right">
                              <input type="submit" style="float: right;" class="btn btn-primary" value="Save course" />
                                <span style="float: right; padding-right: 20px; padding-top: 3px;" id="resultes"></span>
                          </div>
                           </form>
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
<script type="text/javascript">
    $(document).ready(function(){
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
     
       $('#add_new_course').ajaxForm({

            beforeSend: function() {
                
            var course_name = document.getElementById('course_name').value;
            var course_description = document.getElementById('course_description').value;
            var image_cover = document.getElementById('image_cover').value;
            var price_ofcourse = document.getElementById('price_ofcourse').value;
            var course_for = document.getElementById('course_for').value;
            var course_will_learn = document.getElementById('course_will_learn').value;
            
             if(
                 course_name =="" || course_description =="" || image_cover =="" || price_ofcourse ==""
                 || course_for =="" || course_will_learn ==""
                )    
            abort();
                 
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
             
            setTimeout(function (){
               window.location.href ="toutorials.php"; 
            }, 2000 );
                 
        }
       }); 
    });
</script>
<?php
 ob_end_flush();
?>
 