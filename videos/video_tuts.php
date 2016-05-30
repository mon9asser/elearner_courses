
<style>
    #videov   {
     height: 80%;
     margin: 0px auto;
    margin-top: 15%;
    margin-bottom: 15%;
    cursor: pointer;
    position: relative ;
   z-index: 201; 
  }
 
  .masker {
      position: absolute;
      top: 0px;
      left: 0px;
      right: 0px;
      bottom: 0px;
      z-index: 200;
      background: transparent;
  } 
</style>

<?php
    $videoId = $_POST['videoId'];
    $courseId = $_POST['courseId'];
?>
<div id="masker" class="masker"></div>
 <video id="videov" controls>
  <source src="videos/video_protected.php?lesson_id=<?php echo $videoId ; ?>" type="video/mp4">
  <source src="videos/video_ogg.php?lesson_id=<?php echo $videoId ; ?>" type="video/ogg">
  Your browser does not support the video tag.
</video> 
 
 <script type="text/javascript">
     document.getElementById('masker').onclick = function (){
         document.getElementById('lecture').style.display = 'none';
     };
 </script>