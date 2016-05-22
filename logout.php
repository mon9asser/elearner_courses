 
<?php

     ob_start();
 if(session_id() =='')
 session_start () ;
 
 session_destroy() ;
 
 session_write_close() ;
 ob_end_flush();
?>
