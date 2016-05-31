<?php 
ob_start();
if(session_id() =='')
session_start () ; 
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
                  
                    <div class="header-block">
                        <h1>Manage Courses</h1>
                    </div>
                   
                    <div class="header-block">
                          <h3>Categories</h3>
                          <b style="color: teal;">Add Category</b>
                        <table class="table">
                            <tr>
                                <td>
                                      <input placeholder="Category Name" id="categoryName" />
                                      <div id="addCategory" onclick="return addCategory();" class="btn btn-primary">Save Category</div>
                                </td>
                             </tr>
                        </table>
                         <b style="color: teal;">List Of Categories</b>
                                    <table class="table">
                                        <tr class="success">
                                             
                                            <td class="tbColumn">Categories</td>
                                            <td class="tbColumn">Count Of Courses</td>
                                            <td class="tbColumn">Add new Course</td>
                                             <td class="tbColumn">Edit</td>
                                            <td class="tbColumn">
                                                Delete 
                                            </td>
                                        </tr>
                                        
                                        <?php
                                              $category_module = dirname(__FILE__)."/../modular/apis/category_apis.php";
                                                if(is_file($category_module ))  require_once  $category_module ;
                                                $apis_categories = new category_apis() ;
                                                if(count($apis_categories) == 0 )
                                                    return false ;
                                                
                                                $cat = $apis_categories->category_apis_apis_get_all() ;
                                        ?>
                                        <?php for($i=0; $i<count($cat ); $i++){ ?>
                                        
                                          <tr>
                                            
                                              
                                          
                                            <td><input style="background: transparent; border: 0px;" class="catId<?php echo $cat[$i]->id ; ?>" value="<?php echo $cat[$i]->category_name ; ?>" type="text" /></td>
                                            <td></td>
                                            <td class="">
                                                <center>
                                                    <a href="add_new_course.php?categoryId=<?php echo $cat[$i]->id ; ?>" class="btn btn-success">Add New </a>
                                                </center>
                                            </td>
                                            <td> <span class="btn btn-info" onclick="update_category(<?php echo $cat[$i]->id ; ?>,'catId<?php echo $cat[$i]->id ; ?>');">Save Edits </span></td>
                                            <td>
                                                <span onclick="delete_category(<?php echo $cat[$i]->id ; ?>)" class="btn btn-danger">Delete</span>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                    </div>
                     
                    
                    <div class="header-block">
                          <h3>
                        List Of Courses
                        </h3>
                        <table class="table">
                                        <tr class="success">
                                             
                                            <td class="tbColumn">Course Name</td>
                                             <td class="tbColumn">Add new Lesson</td>
                                             <td class="tbColumn">Edit</td>
                                            <td class="tbColumn">
                                                Delete 
                                            </td>
                                            <td class="tbColumn">
                                                Type 
                                            </td>
                                        </tr>
                                        
                                        <?php
                                               
                                            $course_key_file = dirname(__FILE__)."/../modular/apis/course_tutorial_key_apis.php"; 
                                               if(is_file($course_key_file)) require_once  $course_key_file ;
                                              
                                               $course_apis = new course_tutorial_title();
                                               $cou =  $course_apis->coursetutkey_application_apis_get_all();
                                               if(count($cou) == 0 )
                                                    return false ;
                                                
                                                
                                        ?>
                                        <?php for($i=0; $i<count($cou ); $i++){ ?>
                                        
                                          <tr>
                                            
                                              
                                          
                                            <td><input style="background: transparent; border: 0px;" class="courseId<?php echo $cou[$i]->id ; ?>" value="<?php echo $cou[$i]->course_name ; ?>" type="text" /></td>
                                            
                                            <td class="">
                                                <center>
                                                    <a href="add_new_lesson.php?courseId=<?php echo $cou[$i]->id ; ?>" class="btn btn-success">Add New </a>
                                                </center>
                                            </td>
                                            <td> <span class="btn btn-info" onclick="update_course(<?php echo $cou[$i]->id ; ?>,'courseId<?php echo $cou[$i]->id ; ?>');">Save Edits </span></td>
                                            <td>
                                                <span onclick="delete_course(<?php echo $cou[$i]->id ; ?>)" class="btn btn-danger">Delete</span>
                                            </td>
                                            <td>
                                                <select onchange="update_course_type(<?php echo $cou[$i]->id ; ?>,'selectId<?php echo $cou[$i]->id ; ?>',this);">
                                                   <?php if($cou[$i]->is_feature == 0){ ?>
                                                    <option value="0">Normal courses</option>
                                                    <option value="1">Feature courses </option>
                                                    <?php }else if($cou[$i]->is_feature == 1){ ?>
                                                     <option value="1">Feature courses </option>
                                                     <option value="0">Normal courses</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript">
    
    
     // Add new Category
       function  addCategory    (){
             var category_name = $('#categoryName') ;
            if(category_name.val() == '' ){
                $('#categoryName').css('border','1px solid tomato');
                return false ;
            }
             else 
                $('#categoryName').css('border','1px solid #dfdfdf'); 
            
            var dataString = {
                'proccess_type':'add',
                'category_name':category_name.val()
            }
            $.ajax({
                url : 'controler/category_controler.php' ,
                type : 'POST' ,
                data : dataString  ,
                beforeSend : function (){
                    $('#addCategory').html('Saving Data');
                } ,
                success : function (data){
                     $('#addCategory').html(data);
                     window.location.href = "toutorials.php";
                }
            });
        }  // ADD new data fielsa 
        
        
        
    $(document).ready(function(){
        window.update_course_type  = function (courseId , elementId, elementValue){
           var dataStrings = {
                'proccess_type':'update2',
                'course_id': courseId ,
                'elementVal' : elementValue.value
            }
              $.ajax({
                url : 'controler/course_controler.php' ,
                type : 'POST' ,
                data : dataStrings  ,
                 success : function (data){
                      window.location.href = "toutorials.php";
                }
            }); 
        }
       
        
        //Delete Courses
        window.delete_course = function (id){
            var dataString = {
                'proccess_type':'delete',
                'course_id': id
            }
            $.ajax({
                url : 'controler/course_controler.php' ,
                type : 'POST' ,
                data : dataString  ,
                 success : function (data){
                      window.location.href = "toutorials.php";
                }
            }); 
        }
         // Update Course
        window.update_course = function (id , class_id) {
            var dataStrings = {
                'proccess_type':'update',
                'course_id': id ,
                'target_value_updated' : $('.'+class_id).val()
            }
              $.ajax({
                url : 'controler/course_controler.php' ,
                type : 'POST' ,
                data : dataStrings  ,
                 success : function (data){
                      window.location.href = "toutorials.php";
                }
            }); 
        }
        
        //Delete Category
        window.delete_category = function (id){
            var dataString = {
                'proccess_type':'delete',
                'category_id': id
            }
            $.ajax({
                url : 'controler/category_controler.php' ,
                type : 'POST' ,
                data : dataString  ,
                 success : function (data){
                      window.location.href = "toutorials.php";
                }
            }); 
        }
        
       
        // Update Category
        window.update_category = function (id , class_id) {
            var dataString = {
                'proccess_type':'update',
                'category_id': id ,
                'target_value_updated' : $('.'+class_id).val()
            }
            
            $.ajax({
                url : 'controler/category_controler.php' ,
                type : 'POST' ,
                data : dataString  ,
                 success : function (data){
                      window.location.href = "toutorials.php";
                }
            }); 
        }
  
    });
</script>
 <?php
 ob_end_flush();
?>