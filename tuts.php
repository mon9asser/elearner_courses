<?php
ob_start();
if(session_id() =='')
     session_start ();
 ?>

 <?php

            $fileAccss = dirname(__FILE__)."/privates/private_access.php";
            if(is_file($fileAccss ))    require_once $fileAccss  ;

      ?>

<?php
    ob_start() ;
    if(!isset($_GET['course_id']))
        {
            header ('location: page_not_found.php');
            exit(1);
        }
        
        $file_coursr = dirname(__FILE__)."/modular/apis/course_tutorial_key_apis.php";
        if(is_file($file_coursr)) require_once $file_coursr ;
                
        $file_category = dirname(__FILE__)."/modular/apis/category_apis.php";
        if(is_file($file_category)) require_once $file_category ;
        
        
        $file_video_tuts_apis = dirname(__FILE__)."/modular/apis/video_tuts_apis.php";
        if(is_file($file_video_tuts_apis)) require_once $file_video_tuts_apis ;
       
        $modul = new course_tutorial_title();
        $_tuts = new course_tuts_apis() ;
        $categ = new category_apis();
        
        $course_title =  $modul->coursetutkey_application_check_exist(['id'=>trim($_GET['course_id'])]);
        $course_tuts =   $_tuts->videotuts_application_check_exist(['course_id'=>trim($_GET['course_id'])])  ;  
    if($course_title == NULL || $course_tuts  == NULL )
        {
            header ('location: page_not_found.php');
            exit(1);
        }
        
    $all_tutorials =  $_tuts->videotuts_application_get_by_values(['course_id'=>trim($_GET['course_id'])], 'and');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link href="css/home.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       <script src="js/jquery.js"></script> 
    <script>
       
    </script>
  </head>
  <body>
      
      
      <!-- ----------------------------------------------------------------------------------- -->
      <!-- ------------------------------------- HEADER -------------------------------------- -->
      <!-- ----------------------------------------------------------------------------------- -->
      <?php
        $header_file = dirname(__FILE__)."/parts/header.php";
        if(is_file($header_file))   require_once $header_file ;
      ?>
      
       <?php

            $fileAccss = dirname(__FILE__)."/privates/private_access.php";
            if(is_file($fileAccss ))    require_once $fileAccss  ;

      ?>
      <section style="background-image: url(<?php echo $course_title->course_intro_image  ;?>);" class="container-fluid main-course-info">
          <div class="container-of-coursename"></div>
          <div class="container items">
              <h1 class="headline-course-name"> <?php echo $course_title->course_name ; ?> </h1>
              <div class="clear"></div>
              <p class="">
                  <span class="title-description">
                      <?php echo $course_title->course_description ; ?>
                  </span>
                  <span class="category-item">
                      <?php
                       $categ =  $categ->category_apis_check_exist(['id'=> $course_title->category_id ]);
                       echo $categ->category_name ;
                      ?>
                  </span>
              </p>
              <div class="clearfix"></div>
              
          </div>
          <div class="container items-video">
             <div class="imgVideo" style="text-align:center">
                
                 <video id="intoduction-video" controls>
                    <source src="videos/video_protected.php?lesson_id=<?php echo $course_tuts->id; ?>" type="video/mp4">
                    <source src="videos/video_ogg.php?lesson_id=<?php echo $course_tuts->id; ?>" type="video/ogg">
                  Your browser does not support the video tag.
                  </video> 
                 <!-- Video Controls 
                    <div id="video-controls">
                      <button type="button" id="play-pause">Play</button>
                      <input type="range" id="seek-bar" value="0">
                      <button type="button" id="mute">Mute</button>
                      <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
                      <button type="button" id="full-screen">Full-Screen</button>
                    </div>
                 -->
             </div>
              <div class="video-contr">
                  <span class="current-price " data-purpose="course-price-text">
                    $<?php echo $course_title->course_price ; ?>
                  </span>
                  <span class="take-this">
                      <a href="controler/paypal_controler.php?course_id=<?php echo (int) $_GET['course_id'];?>" style=" margin-top: 15px;margin-bottom: 45px;" class="btn-custome">
                      Take This Course
                      </a>
                  </span>
                  <!-- 
                  <span class="take-this video-contr--">
                      <div id="setCoupon" class="btn-custome">
                          <span id="setCoupon-tx"> Redeem a Coupon </span>
                      </div>
                  </span>
                  -->
                  <span class="take-this nitem">
                      <div class="content-course">
                          <b> Lectures </b>: <?php echo count($all_tutorials) ;?>
                      </div>
                      <div class="content-course">
                          <b> Who this course for ? </b>: <?php echo $course_title->course_for ; ?>
                      </div>
                      <div class="content-course">
                          <b> Category </b>: <?php echo $categ->category_name ; ?>
                      </div>
                  </span>
              </div>
          </div>
      </section>
      <section class="header-foooter container-fluid">
          <div class="container">
            <b class="desc"> Curriculum </b>
          </div>
      </section>
      <section class="container-fluid course-objective">
          <div class="container">
              <h3 class="courses-headline">About This Course</h3>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="">
                          <b>
                              What will I learn? 
                          </b>
                          <p>
                             <?php echo $course_title->course_description ; ?> 
                          </p>
                          <!-- 
                          <ul>
                              <li>
                                  Install and maintain their own Wordpress based website
                              </li>
                               <li>
                                  Save money by installing and maintaining your own website
                              </li>
                          </ul>
                          -->
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <div class="">
                          <b>
                               Who is this for? 
                          </b>
                           <p>
                             <?php echo $course_title->course_for ; ?> 
                          </p>
                          <!-- 
                          <ul>
                              <li>
                                    Anyone interested in creating a personal website
                               </li>
                                <li>
                                    Anyone interested in creating a personal website
                               </li>
                          </ul>
                          -->
                      </div>
                  </div>
              </div>
          </div>
          <div class="container">
              <h3 class="courses-headline">Curriculum</h3>
          </div>
          <div class="container">
            <table class="table">
                <?php
                
               $fileTransactions = dirname(__FILE__)."/modular/apis/transactions_apis.php";
                if(is_file($fileTransactions )) require_once $fileTransactions  ;
                
                $transCourses = new transactions_apis();
                $transaction_data = $transCourses->transactions_get_by_values([
                    'user_id' => $_SESSION['user_info']['id'] ,
                    'course_id'=>$_GET['course_id']
                ], 'and');
                
               
                    $lesson_no = 1 ;
                    for ($i=0; $i<count($all_tutorials);$i++)
                    {
                        if($i==0)
                        {
                            ?>
                              <tr id="intreduce" onclick="top_click()">
                            <td>
                                <a class="videos-link">
                                    <span class="lect_number">Lecture <?php echo $lesson_no ;?> </span>
                                    <span class="lect_name"><?php echo $all_tutorials[$i]->lesson_name ;?></span>
                                </a>
                            </td>
                           <td class="text-right">
                                <span class="lect_minutes">05:50 </span>
                              </td>
                        </tr>   
                                
                             <?php
                        }
                        ?>
                        <tr style="opacity: <?php if ($transaction_data == NULL ) echo ".5";else echo "1"; ?>" onclick="<?php if ($transaction_data != NULL ) echo 'video_tutorial('.$all_tutorials[$i]->id.')';   ?>">
                            <td>
                                <a class="videos-link">
                                    <span class="lect_number">Lecture <?php echo $lesson_no ;?> <?php if ($transaction_data == NULL ) { ?> <i style="padding-left: 15px; font-size: 14px;" class="fa fa-lock" aria-hidden="true"></i><?php } ?></span>
                                    <span class="lect_name"><?php echo $all_tutorials[$i]->lesson_name ;?></span>
                                    
                                </a>
                            </td>
                           <td class="text-right">
                                <span class="lect_minutes">05:50 </span>
                              </td>
                        </tr>
                       <?php
                            $lesson_no ++ ;
                  }
               ?> 
            </table>
          </div>
       </section>
       <!-- -------------------------------------------------------------- -->
      <!-- ------------------------- Footer ----------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <?php
        $footer_file = dirname(__FILE__)."/parts/footer.php";
        if(is_file($footer_file )) require_once $footer_file  ;
      ?>
      
      
      
      
      
      
      <!-- Loading Videos -->
      <div id="lecture" class="lecture videos"></div>
      
      
      
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/application.js"> </script>
    
    <script>
        
        $(document).ready(function (){
            
                window.top_click = function (){
                         $( "html" ).animate({
                      scrollTop : 0
                    }, 1000, function() {
                      // Animation complete.
                    });
                 }
                 
                 window.video_tutorial = function (video_id){
                    $('#lecture').fadeIn();
                    var videoId = video_id ;
                    var courseId = <?php echo trim($_GET['course_id']) ;?> ;
                    $('.lecture').css('display' , 'inline-flex');
                    $.ajax({
                        url : 'videos/video_tuts.php' , 
                        data : {'videoId':videoId,'courseId':courseId} , 
                        type : "post",
                        success : function (content){
                            $('#lecture').html(content);
                              $('#lecture > video').fadeIn();
                        }
                    });
                 }
            window.done_coupon = function (){
               document.getElementById('setCoupon').innerHTML ='Coupon: W1DS254SD' ; 
               document.getElementById('setCoupon').style.opacity ="0.3";
            }
           $('#setCoupon-tx').click(function(){
               document.getElementById('setCoupon').innerHTML = "<input id='coupon-value' type='text' /> <d onclick='done_coupon();' class='btna'> Done </button>";
           });   
           });
        /*
         window.onload = function() {
             
            // Video
            var video = document.getElementById("intoduction-video");

            // Buttons
            var playButton = document.getElementById("play-pause");
            var muteButton = document.getElementById("mute");
            var fullScreenButton = document.getElementById("full-screen");

            // Sliders
            var seekBar = document.getElementById("seek-bar");
            var volumeBar = document.getElementById("volume-bar");
            
         
                                    // Event listener for the play/pause button
               playButton.addEventListener("click", function() {
                 if (video.paused == true) {
                   // Play the video
                   video.play();

                   // Update the button text to 'Pause'
                   playButton.innerHTML = "Pause";
                 } else {
                   // Pause the video
                   video.pause();

                   // Update the button text to 'Play'
                   playButton.innerHTML = "Play";
                 }
               });
               
               
               // Event listener for the mute button
                muteButton.addEventListener("click", function() {
                  if (video.muted == false) {
                    // Mute the video
                    video.muted = true;

                    // Update the button text
                    muteButton.innerHTML = "Unmute";
                  } else {
                    // Unmute the video
                    video.muted = false;

                    // Update the button text
                    muteButton.innerHTML = "Mute";
                  }
                });
                
                // Event listener for the full-screen button
                fullScreenButton.addEventListener("click", function() {
                  if (video.requestFullscreen) {
                    video.requestFullscreen();
                  } else if (video.mozRequestFullScreen) {
                    video.mozRequestFullScreen(); // Firefox
                  } else if (video.webkitRequestFullscreen) {
                    video.webkitRequestFullscreen(); // Chrome and Safari
                  }
                });
                
                // Event listener for the seek bar
                seekBar.addEventListener("change", function() {
                  // Calculate the new time
                  var time = video.duration * (seekBar.value / 100);

                  // Update the video time
                  video.currentTime = time;
                });
                
                // Update the seek bar as the video plays
                video.addEventListener("timeupdate", function() {
                  // Calculate the slider value
                  var value = (100 / video.duration) * video.currentTime;

                  // Update the slider value
                  seekBar.value = value;
                });
                // Pause the video when the slider handle is being dragged
                seekBar.addEventListener("mousedown", function() {
                  video.pause();
                });

                // Play the video when the slider handle is dropped
                seekBar.addEventListener("mouseup", function() {
                  video.play();
                });
                // Event listener for the volume bar
                volumeBar.addEventListener("change", function() {
                  // Update the video volume
                  video.volume = volumeBar.value;
                });
            
          }

         
              });*/
            
            </script>
  </body>
</html>
 
<?php
ob_end_flush();
?>