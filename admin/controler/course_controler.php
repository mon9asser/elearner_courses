<?php
    
    if (!isset($_POST))
        return FALSE ;
    
    
    
    
    if(!isset($_POST['proccess_type']))
        return false ;
    
    //
    if($_POST['proccess_type'] =='add')
    {
        if(!isset($_POST['category_name']))
            return FALSE ;
        $addlist = [] ;
        if($_POST['category_name'] != '')
        $addlist['category_name']= trim($_POST['category_name']);
        else 
            return false ;
        
          
          $category_module = dirname(__FILE__)."/../../modular/apis/category_apis.php";
          if(is_file($category_module ))  require_once  $category_module ;
         
          $category_apis = new category_apis();
          if(count($addlist) != 0 )
          { 
              $vv = $category_apis ->category_apis_add_new_field($addlist);
              if($vv)  echo "Added Success";
              else echo "Not Added...";
           }
          else 
              return FALSE ;
    }else if ($_POST['proccess_type'] =='delete')  
    {
        if(!isset($_POST['course_id']))
            return false ;
        if($_POST['course_id'] =='' )
            return false ;
        
          $course_module = dirname(__FILE__)."/../../modular/apis/course_tutorial_key_apis.php";
          if(is_file($course_module ))  require_once  $course_module ;
         
          $category_apis = new course_tutorial_title();
          $category_apis->coursetutkey_application_delete_fields(['id'=>trim($_POST['course_id'])]);
    }else if ($_POST['proccess_type']=='update') {
         if(!isset($_POST['course_id']))
            return false ;
        if($_POST['course_id'] =='' )
            return false ;
        
          $course_module = dirname(__FILE__)."/../../modular/apis/course_tutorial_key_apis.php";
          if(is_file($course_module ))  require_once  $course_module ;
         
          $category_apis = new course_tutorial_title();
          $target = [];
          if(!isset($_POST['target_value_updated']))
              return false ;
          if($_POST['target_value_updated'] =='')
              return false ;
          
          $target ['course_name'] = $_POST['target_value_updated'] ;
          $category_apis->coursetutkey_application_update_fields(['id'=>trim($_POST['course_id'])], $target);
    }else if ($_POST['proccess_type']=='update2') {
         if(!isset($_POST['course_id']))
            return false ;
        if($_POST['course_id'] =='' )
            return false ;
        
          $course_module = dirname(__FILE__)."/../../modular/apis/course_tutorial_key_apis.php";
          if(is_file($course_module ))  require_once  $course_module ;
         
          $category_apis = new course_tutorial_title();
          $target = [];
          if(!isset($_POST['elementVal']))
              return false ;
          if($_POST['elementVal'] =='')
              return false ;
          
          $target ['is_feature'] = $_POST['elementVal'] ;
          $category_apis->coursetutkey_application_update_fields(['id'=>trim($_POST['course_id'])], $target);
    }
    
    
    
    
    
?>