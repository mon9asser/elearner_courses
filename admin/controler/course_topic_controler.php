<?php
    if(!isset($_POST['access_type']))
        return false ;
    $all_fileds = [] ;
  $webSettingFiles = dirname(__FILE__)."/../../modular/config/elearner_courses_db.php";
  if(is_file($webSettingFiles))  require_once $webSettingFiles ;
  $connection = new database() ;
     
    if($_POST['access_type'] =='add')
    {
       
         $file_get = dirname(__FILE__)."/../../modular/apis/course_tutorial_key_apis.php";
        if(is_file($file_get )) require_once $file_get  ;
        
       
        
        if(!isset($_FILES['image_cover']))
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
        $course_apis = new course_tutorial_title();
       $check_exist = $course_apis ->coursetutkey_application_check_exist([
           'category_id'=> mysqli_real_escape_string($connection->open_connection() , trim($_POST['category_name'])) ,
           'course_name'=>mysqli_real_escape_string ($connection->open_connection () ,$_POST['course_name'])
       ]);
       
        if($check_exist != NULL )
        {
           echo "This course exist in out databases ... ";
            return false ;
        }
         if($_FILES['image_cover'] =='' || $_POST['category_name'] =='' || $_POST['price_ofcourse'] ==''|| $_POST['course_will_learn'] ==''|| $_POST['course_for'] =='' || $_POST['course_name'] ==''|| $_POST['course_description']=='')
            return false ;
       
        if($_FILES['image_cover']['size'] >= 50000 )
        {
            echo "image cover must be less than 50 kb";
            return false ;
        }
        
       $file = "courses_covers/" .rand(1000 , 2000000).$_FILES['image_cover']['name'] ;
         $dirImage = dirname(__FILE__)."/../../".$file ;
         move_uploaded_file($_FILES['image_cover']['tmp_name'],$dirImage ); 
        $cover_image = $file ;
        
        $course_name = mysqli_real_escape_string ($connection->open_connection () ,$_POST['course_name']) ;
        $course_desription = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_description'] ) ;
        $price_ofcourse = mysqli_real_escape_string ($connection->open_connection (),$_POST['price_ofcourse']) ;
        $course_for = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_for']) ; 
        $course_will_learn = mysqli_real_escape_string ($connection->open_connection (),$_POST['course_will_learn']) ;
        $connection->close_connection();
        
         
        $arrList = [
            'category_id'=>mysqli_real_escape_string($connection->open_connection() , trim($_POST['category_name'])) ,
            'course_intro_image'=> $cover_image,
            'course_name'=> $course_name,
            'course_description'=> $course_desription,
            'course_price'=> $price_ofcourse,
            'course_for'=> $course_for,
            'course_will_learn'=> $course_will_learn  
        ];
       
    
      $add_values =  $course_apis->coursetutkey_application_add_new_field($arrList); 
      if ($add_values ) 
          echo "Your data Added Success ... ";
    }
    
    
    
    
    
?>


    