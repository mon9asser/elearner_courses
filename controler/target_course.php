<?php

    // for incs
        $file_coursr = dirname(__FILE__)."/../modular/apis/course_tutorial_key_apis.php";
        if(is_file($file_coursr)) require_once $file_coursr ;
                
        $file_category = dirname(__FILE__)."/../modular/apis/category_apis.php";
        if(is_file($file_category)) require_once $file_category ;
        
        
        $file_video_tuts_apis = dirname(__FILE__)."/../modular/apis/video_tuts_apis.php";
        if(is_file($file_video_tuts_apis)) require_once $file_video_tuts_apis ;
       
        $modul = new course_tutorial_title();
        
        
         $course_title =  $modul->coursetutkey_application_check_exist(['id'=>$ids ]);
        
         if($course_title == NULL  )
         {
            header('location: ../undefine_access.php');
            exit(1);
        } 
       
?>
