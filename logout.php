 
<?php
      ob_start();
 if(session_id() =='')
 session_start () ;
 
 session_destroy() ;
 
 header('location: index.php');
 
 session_write_close() ;
 ob_end_flush();
?>
