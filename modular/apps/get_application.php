<?php
 

/**
 * Description of applications
 *
 * @author Montasser Mossallem
 */
$db_file = dirname(__FILE__)."/../config/elearner_courses_db.php" ;
if(is_file($db_file))
    require_once $db_file ;

class get_applications extends database {
    
    private function get_apps ($tableName , $data = NULL){
         // check if table exists in databases
       $tbl_query = mysqli_query($this->open_connection(), "SHOW TABLES LIKE '{$tableName}'")   ;
       $this->close_connection();
         if(mysqli_num_rows($tbl_query  )  == 0)
            {
                echo "This table does not exist ... ";
                return FALSE ;
            }
      
         
         $qString = sprintf("SELECT * FROM `{$tableName}` %s",$data);
        $query = mysqli_query($this->open_connection(), $qString );
        $this->close_connection();
        if(!$query)
            return NULL ;
        
        if(mysqli_num_rows($query) == 0)
            return NULL  ; 
        
       $arrList = [];
       for ($i=0; $i < mysqli_num_rows($query) ;$i++)
        $arrList[@count($arrList)] = mysqli_fetch_object ($query);
       $this->close_connection();
       return $arrList ;
     }
    
     /*     CASES :
      *         NULL => check exists
      *         and =>`and`
      *         or => `or`
      *         %=> `LIKE %value%`
      *         
      */
     public function get_data_according_to_array( $tableName ,$args = [] , $type = NULL , $operatorType = NULL /*case ' % ' */  ){
       if(!is_array($args ))
        {
            echo "There are an errors " ;
            return false ;
        }
        
       if (count($args) == 0 )
       {
           echo "There are no fields ";
           return false ;
       }
       
         $arguments ="WHERE";
        $i=0;
        
        switch ($type) {
              case '%':
                  
                   foreach ($args as $key => $value) {
                            $arguments .=" {$key} LIKE '%".$value ."%'";
                           if($i != (count($args)-1))
                               $arguments .= " ".$operatorType." ";
                          $i++ ;
                       }
                 break;
              
              case 'and':
                   foreach ($args as $key => $value) {
                            $arguments .=  " `".$key."`='{$value}'";
                           if($i != (count($args)-1))
                               $arguments .= " AND";
                          $i++ ;
                       }
                 break;
              
              case 'or':
                   foreach ($args as $key => $value) {
                            $arguments .=  " `".$key."`='{$value}'";
                           if($i != (count($args)-1))
                               $arguments .= " OR";
                          $i++ ;
                       }
                 break;
              
            default: // mean type is NULL exist
                 foreach ($args as $key => $value) {
                             $arguments .=  " `".$key."`='{$value}'";
                           if($i != (count($args)-1))
                               $arguments .= "AND";
                          $i++ ;
                       }
                break;
        }
         
         // check if table exists in databases
       $tbl_query = mysqli_query($this->open_connection(), "SHOW TABLES LIKE '{$tableName}'")   ;
       $this->close_connection();
         if(mysqli_num_rows($tbl_query  )  == 0)
            {
                echo "This table does not exist ... ";
                return FALSE ;
            }
            
        $results = $this->get_apps($tableName, $arguments) ;
        if($type == NULL )
        {
            if( $results != NULL )
                return $results[0];
                else 
                    return NULL ;
                
        } else {
            return $results ;
        }
    }
 
     // get all rows
     public function get_all_rows ($tableName , $data = NULL){
         return $this->get_apps($tableName, $data);
     }
     
    
   
     
}
/*
$ob = new get_applications();
$dataO = $ob->get_data_according_to_array(
    [
        'first_name'=>'Montasserd'
     ]
       ,
        'user_apps'
        ,NULL,'and');
if($dataO != NULL )
    echo "In database";
else 
    echo "Not exists .. ";
 */
?>
