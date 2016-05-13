<?php
 

/**
 * Description of elearner_courses_db
 *
 * @author Montasser Mossallem
 * database classes
 */
class database {
    private $db_connection =  NULL ;
    private static $HOST_NAME = "localhost";
    private static $DB_NAME = "elearner_courses";
    private static $DB_USER_NAME = "root";
    private static $DB_PASSWORD= "";
    
    

    
    private function database_open_conx (){
        $this->db_connection = @mysqli_connect(database::$HOST_NAME , database::$DB_USER_NAME, database::$DB_PASSWORD, database::$DB_NAME );
        if($this->db_connection )
        {
            @mysqli_set_charset( $this->db_connection,"utf8");
            return $this->db_connection ;
        }
        else 
        return false ;   
    }
    
    protected function open_connection(){
        return $this->database_open_conx();
    }
    
    protected function close_connection (){
        if($this->open_connection() == TRUE)
           return @mysqli_close ($this->db_connection);
    }
    
}

 
 
?>
