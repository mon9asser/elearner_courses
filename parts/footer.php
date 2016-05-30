<section class="container-fluid footer">
          <div class="container">
              <ul class="nav navbar-nav navbar-left">
                  <li><a href="#"> 2015 . All Rights Reserved</a></li>
              </ul>
               <?php
                  if(isset($_SESSION['user_info'])){
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="courses.php"> Courses</a></li>
                            <?php
                              if($_SESSION['user_info']['is_admin'] == 1 ) {
                                 ?>
                                 <li><a href="admin/index.php"> Go to Admin Panel</a></li>    
                                 <?php 
                              }
                            ?>
                            
                         </ul>
                        <?php
                    }else {
                        ?>
                         <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="courses.php">COURSES</a></li>
                             <li><a href="#">ABOUT US</a></li>
                        </ul>
                        <?php
                    }
                  ?>
             
          </div>
      </section>