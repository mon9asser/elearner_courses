<?php

 $db_file = dirname(__FILE__)."/../config/elearner_courses_db.php" ;
if(is_file($db_file))
    require_once $db_file ; 

class update_application extends database  {
       private $columnsArr = [];
       private $targetValues = [] ;
       private function Update_api($table,$ArrColumns,$ArrTarget)
            {
                if(!is_array($ArrColumns) || !is_array($ArrTarget))
                   print ("That's Not Array , There are an Errors in System PLease Try Later");
                
                
                 $tbl_query = mysqli_query($this->open_connection(), "SHOW TABLES LIKE '{$table}'")   ;
                $this->close_connection();
                  if(mysqli_num_rows($tbl_query  )  == 0)
                     {
                         echo "This table does not exist ... ";
                         return FALSE ;
                     }
            
            
                // Store This Array as a private 
                $this->columnsArr = $ArrColumns ;
                $this->targetValues = $ArrTarget ;
                
                $columnsCompar = NULL ;
                if(count($this->columnsArr ) == 0 )
                   print("There is an Error, Please Add Columns of Table ");
                else if(count($this->columnsArr ) == 1 )
                    $columnsCompar  .= array_keys ($this->columnsArr)[0] . "='" . mysqli_real_escape_string($this->open_connection(),trim($this->columnsArr[array_keys ($this->columnsArr)[0]])) ."'";
                else if (count($this->columnsArr ) > 1 )
                    {   
                        $i=0;
                        foreach ($this->columnsArr as $key => $value) {
                            //if((int)$value  )  
                             $columnsCompar  .= "`{$key}`="."'" . mysqli_real_escape_string($this->open_connection(), trim($value)) ."'" ;
                            if($i != (count($this->columnsArr) - 1 ))
                                     $columnsCompar .= " AND ";
                            $i++ ;
                        }
                    }
                   
                 $targetVal = NULL ;// = "Good = Excellent" ;
                 if(count($this->targetValues) == 1)
                 $targetVal .= array_keys ($this->targetValues)[0] .  " = '"  . mysqli_real_escape_string($this->Open_Connection(),trim($this->targetValues[array_keys ($this->targetValues)[0]] ))."'";
                 else if(count($this->targetValues) > 1 )
                    {
                        $i=0;
                        foreach ($this->targetValues as $key => $value) {
                             $targetVal .= "`{$key}`="."'" . mysqli_real_escape_string($this->open_connection(), trim($value)) ."'" ;
                            if($i != (count($this->targetValues) - 1 ))
                                     $targetVal .= " , ";
                            $i++;
                        }
                    }
                     
                  // Update Query String 
                   $modifyQueryString = "Update `{$table}` SET {$targetVal} WHERE ".$columnsCompar;
                  $queryDo = mysqli_query($this->open_connection(), $modifyQueryString ) ;
                   ini_set('mysql.connect_timeout', 300);
                    ini_set('default_socket_timeout', 300);
                  if(!$queryDo )
                      throw new SW_Exception_Module ("Your Data Not updated Please Try Later".mysqli_error($this->Open_Connection()));
                  $this->close_connection();
                  return TRUE ;
            }
            public function Module_Update($__tabel ,$__columns__Array ,$__Target__Array){
                return $this->Update_api($__tabel ,$__columns__Array ,$__Target__Array);
            }
}

/*
$model = new update_application();
$model->Module_Update("user_apps", ['id'] , ['email'=>'montasser@gmail.com'])
 
 */
?>
