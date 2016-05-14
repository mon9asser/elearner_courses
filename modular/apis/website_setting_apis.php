<?php

 
/**
 * Description of user_apis
 *
 * @author Montasser Mossallem
 */

$tbl_applications = dirname(__FILE__)."/../config/elearner_courses_tbl.php";
if(is_file($tbl_applications ))    require_once $tbl_applications ;

$application_file = dirname(__FILE__)."/../apps/application_autoload.php";
if(is_file($application_file))    require_once $application_file ;
        
class user_apis extends elearner_courses_tbl  {
    // TABLE
    private function table(){ return $this->website_setting_tbl();}
   
    // Functions
    
    /******************************************************************************************/
    /******************************** Retrive Functions ***************************************/
    /******************************************************************************************/
    public function websitesetting_application_apis_get_all ($args = NULL ){
       $getApps = new get_applications();
       return $getApps->get_all_rows ( $this->table() ,$args);   
    }
    public function websitesetting_application_search_apis( $args, $operatorType /*Or - and */){
       $getApps = new get_applications();
       return $getApps->get_data_according_to_array($this->table(), $args, '%', $operatorType);
    }
    public function websitesetting_application_get_by_values ($args, $type /*OR-AND*/, $operatorType = NULL ){
       $getApps = new get_applications();
       return $getApps->get_data_according_to_array($this->table(), $args, $type, $operatorType);
    }
    public function websitesetting_application_check_exist ($args, $type = NULL){
       $getApps = new get_applications();
       return $getApps->get_data_according_to_array($this->table(), $args, $type, $operatorType= NULL); 
    }
   
   
    /******************************************************************************************/
    /******************************** Add Functions *******************************************/
    /******************************************************************************************/
    
    public function websitesetting_application_add_new_field ($args = []){
               // Add Module Apis
              $Add_module = new add_application();
              return $Add_module->add_new_fields($this->table() , $args );
    }
    
    /******************************************************************************************/
    /******************************** Update Functions *******************************************/
    /******************************************************************************************/
    public function websitesetting_application_update_fields ($column_args =[] , $value_args = []){
        $update_module = new update_application() ;
        return $update_module->Module_Update($this->table() , $column_args, $value_args) ;
    }
   /******************************************************************************************/
    /******************************** Delte Functions *******************************************/
    /******************************************************************************************/   
    public function websitesetting_application_delete_fields ($args=[]){
        $delete_module = new delete_application() ;
        return $delete_module->Module_Delete($this->table() , $args);
    }
}
  
?>
