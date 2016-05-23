<?php
    if(!isset($_POST['access_type']))
        return false ;
    $all_fileds = [] ;
  $webSettingFiles = dirname(__FILE__)."/../../modular/config/elearner_courses_db.php";
  if(is_file($webSettingFiles))  require_once $webSettingFiles ;
  $connection = new database() ;
     
    if($_POST['access_type'] =='add')
    {
        
         $file_get = dirname(__FILE__)."/../../mdular/apis/video_tuts_apis.php";
        if(is_file($file_get )) require_once $file_get  ;
        else return false ;
        
        
        if(!isset($_FILES['image_cover']))
        return false ;
    
        if(!isset($_FILES['video_cover']))
        return false ;
       
        if(!isset($_POST['course_name']))
        return false ;
        
        if(!isset($_POST['course_description']))
        return false ;
        
        if(!isset($_POST['price_ofcourse']))
        return false ;
        
        if(!isset($_POST['course_for']))
        return false ;
        
        if(!isset($_POST['course_will_learn']))
        return false ;
        
        if(!isset($_POST['category_name']))
            return false ;
        
        // check if this course is null or not 
        $course_apis = new course_tuts_apis() ;
       $check_exist = $course_apis ->videotuts_application_check_exist([
           'category_id'=> mysqli_real_escape_string($connection->open_connection() , time($_POST['category_name'])) ,
           'course_name'=>mysqli_real_escape_string ($connection->open_connection () ,$_POST['course_name'])
       ]);
       
        if($check_exist != NULL )
        {
           echo "This course exist in out databases ... ";
            return false ;
        }
        
        if($_FILES['image_cover'] =='' || $_POST['category_name'] =='' || $_POST['price_ofcourse'] ==''|| $_POST['course_will_learn'] ==''|| $_POST['course_for'] ==''|| $_FILES['video_cover'] ==''|| $_POST['course_name'] ==''|| $_POST['course_description']=='')
            return false ;
       
        if($_FILES['image_cover']['size'] < 50000 )
        {
            echo "image cover must be less than 50 kb";
            return false ;
        }
        
        if($_FILES['video_cover']['size'] < 110000 )
        {
            echo "image cover must be less than ";
            return false ;
        }
        
        
        $cover_video = file_get_contents(addcslashes($_FILES['video_cover']));
        $cover_image= file_get_contents(addcslashes($_FILES['image_cover']));
        $course_name = mysqli_real_escape_string ($connection->open_connection () ,$_POST['course_name']) ;
        $course_desription = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_description'] ) ;
        $price_ofcourse = mysqli_real_escape_string ($connection->open_connection (),$_POST['price_ofcourse']) ;
        $course_for = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_for']) ; 
        $course_will_learn = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_will_learn']) ;
        $connection->close_connection();
        
        
       
       
       
           
        
        
        
        
    }
    
    
    
    
    
?>


    