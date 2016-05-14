<?php

 $db_file = dirname(__FILE__)."/../config/elearner_courses_db.php" ;
if(is_file($db_file))
    require_once $db_file ;

class add_application extends database {
    private function add_apps ($tableName , $fields=[]){
            // check if table exists in databases
       $tbl_query = mysqli_query($this->open_connection(), "SHOW TABLES LIKE '{$tableName}'")   ;
       $this->close_connection();
         if(mysqli_num_rows($tbl_query  )  == 0)
            {
                echo "This table does not exist ... ";
                return FALSE ;
            }
          
      $value_fields = NULL ;
      $index_fields = NULL ;
      $i = 0;
      foreach ($fields as $key => $value) {
          
                $value_fields .= "'".$value."'";
                if($i != (count($fields)-1))
                $value_fields .= " , ";
                
                $index_fields .= "".$key."";
                if($i != (count($fields)-1))
                $index_fields  .= " , ";
      
          $i++;
      }
      
      $queryString = "INSERT INTO `{$tableName}` ({$index_fields}) VALUE({$value_fields})";
     $Qresult = mysqli_query($this->open_connection() , $queryString );
     $this->close_connection();
     return $Qresult ;
    }
    public function add_new_fields ($tableName , $fields=[]){
        return $this->add_apps($tableName, $fields);
    }
}

 /*
$VAL = new add_application() ;
$VAL ->add_new_fields('user_apps',  [
    'first_name'=>"Seleem",
    'second_name'=>"Talat",
    'email'=>"seleem_talat@gmail.com",
    'mobile'=>"0154842112"
 ]); */
?>
