<?php
    $file_websitesetting = dirname(__FILE__)."/../../modular/apis/website_setting_apis.php";
    if(is_file($file_websitesetting ))  require_once  $file_websitesetting ;
   
    $websetting_apis = new website_setting_apis() ;
    
    
    if(isset($_POST))
        {
            $web_setting = array() ;
            if(isset($_POST['website_name'])) {
               
             if($_POST['website_name'] != ''){
                 $web_setting['website_name'] = $_POST['website_name'] ;
             } 
            }
            if(isset($_POST['website_description'])) {
                 if($_POST['website_description'] != ''){
                  $web_setting['website_description'] = $_POST['website_description'] ;
             }
            }
            if(isset($_POST['website_keywords'])) {
                 if($_POST['website_keywords'] != ''){
                  $web_setting['website_keywords'] = $_POST['website_keywords'] ;
             }
            }
            if(isset($_POST['website_availbility'])) {
                if($_POST['website_availbility'] != ''){
                  $web_setting['is_offline'] = $_POST['website_availbility'] ;
             }
            }
            
             
             if(count($web_setting) != 0 )
             {   $setting = NULL ;
                 $setting_get = $websetting_apis->websitesetting_application_apis_get_all();
                 if(count($setting_get) != 0)
                 $setting =  $websetting_apis->websitesetting_application_update_fields(['id'=>$setting_get[count($setting_get)-1]->id], $web_setting);
                 else 
                    $setting = $websetting_apis->websitesetting_application_add_new_field ($web_setting)  ;
                 if($setting)
                 {
                     echo "Website setting saved success ... ";
                     return false ;
                 }else 
                     echo "There are an errors , please try later";
             }
        }
        
        
        
?>