<?php
 

/**
 * Description of elearner_courses_tbl
 *
 * @author Montasser Mossallem
 */
class elearner_courses_tbl {
    
   private static $table_paypal_setting = 'paypal_setting';
   protected function paypal_setting_tbl (){
        return elearner_courses_tbl::$table_paypal_setting;  
   }
   
   
   private static $table_category_setting = 'categories';
   protected function category_tbl (){
        return elearner_courses_tbl::$table_category_setting;  
   }
   
   private static $table_video = 'video_inprogress';
   protected function video_table (){
       return elearner_courses_tbl::$table_video;  
   }


   private static $table_video_tuts = 'video_tuts';
   protected function video_tuts_tbl (){
      return elearner_courses_tbl::$table_video_tuts;   
   }


   private static $table_course_tutorial = 'course_tutorial_key';
   protected function course_tutorial_key_tbl(){
       return elearner_courses_tbl::$table_course_tutorial;  
   }


   private static $table_course_transaction = 'user_course_transactions';
   protected function course_transaction_tbl(){
        return elearner_courses_tbl::$table_course_transaction;  
   }


   private static $table_coupon_code = 'coupon_codes';
   protected function coupon_code_tbl(){
     return elearner_courses_tbl::$table_coupon_code;  
   }


   private static $table_website_setting = 'website_setting'; 
   protected function website_setting_tbl (){
        return elearner_courses_tbl::$table_website_setting; 
   }
  
   private static $table_transactions = 'transaction';
   protected function transactions_tbl (){
        return elearner_courses_tbl::$table_transactions; 
   }


   private static $table_contact_info = 'contact_info';
   protected function contact_information_tbl (){
       return elearner_courses_tbl::$table_contact_info; 
   }
   
   private static $table_user_setting = 'user_setting';
   protected function user_setting_apps_tbl(){
       return elearner_courses_tbl::$table_user_setting; 
   }
   
   private static $table_users = 'user_apps';
   protected function user_application_tbl (){
       return elearner_courses_tbl::$table_users;
   }
   
   
 }

?>
