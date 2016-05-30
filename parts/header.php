 
 
      <div class="loadin-page">
          <div style="margin-top: 20%;" class="windows8">
                    <div class="wBall" id="wBall_1">
                            <div class="wInnerBall"></div>
                    </div>
                    <div class="wBall" id="wBall_2">
                            <div class="wInnerBall"></div>
                    </div>
                    <div class="wBall" id="wBall_3">
                            <div class="wInnerBall"></div>
                    </div>
                    <div class="wBall" id="wBall_4">
                            <div class="wInnerBall"></div>
                    </div>
                    <div class="wBall" id="wBall_5">
                            <div class="wInnerBall"></div>
                    </div>
            </div>
      </div>
   
      <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#">
                    <img style="width: 100px;  border-radius: 2px; position: relative;z-index: 50;margin-top: -7px; " class="img-responsive " src="images/logo.png" />
                </a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                  
                 
                  
                  <?php
                    if(isset($_SESSION['user_info'])){
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="courses.php"> Courses</a></li>
                            <li><a href="transactions.php">  Transactions</a></li>
                            <li><a href="user_setting.php"><?php echo $_SESSION['user_info']['first_name']; ?></a></li>
                            <li><a href="logout.php">  Logout</a></li> 
                         </ul>
                        <?php
                    }else {
                        ?>
                         <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="courses.php">COURSES</a></li>
                            <li><a id="sign-upevent" href="#">SIGN UP</a></li>
                            <li><a id="login-event" href="#">LOG IN</a></li>
                            <li><a href="#">ABOUT US</a></li>
                        </ul>
                        <?php
                    }
                  ?>
                  
              </div>
          </div>
      </nav>
 
 
 
 
 <!-- LOGIN PART -->
      <section id="login-section" class="log-section">
          <div class="close login-section-close-login" id="login-section-close"></div>
          <div class="log-block"> 
               <!-- Errors -->
            
              <div class="log-headline-in"></div>
              
              <div class="log-body">
                  <div class="log-body spanner">
                      <span>Email</span>
                  </div>
                  <input id="user_mail_login" class="input" type="email" name="user-mail" placeholder="username@example.com" />
                 <div class="clearfix"></div>
                 <div class="log-body spanner">
                      <span>Password</span>
                  </div>
                 <input id="user_password_login" class="input" type="password" name="user-password" placeholder="Your password" />
               </div>
              <div class="log-body">
                  <div class="forget-password">
                      <a class="forgetPassword" href="#">forget password ?</a>
                  </div>
              </div>
              <div class="log-body">
                  <div onclick="login_user(this);" class="login-btn">
                      Login
                  </div>
              </div>
              <div class="log-body footer-logs">
                  <div class="forget-password sign-s">
                      <span class="ask-about-account" href=""> Don’t have an account? </span>
                      <button class="btn btn-danger btn-sign sign-up-fromlogin">Sign up</button>
                   </div>
               </div>
          </div>
      </section>
      
      
      
      
      
      
      
     
      
      
      
      <!-- Sign up PART -->
      <section id="sign-up-section" class="log-section" redirect-page="">
          <div class="close login-section-close-signup" id="login-section-close"></div>
          <div class="log-block signup-block"> 
               <!-- Errors -->
               
              <div class="log-headline"></div>
               
              <div class="log-body">
                  <div class="log-body spanner">
                      <span>First Name</span>
                  </div>
                  <input id="co_first_name" class="input" type="text" name="fname-mail" placeholder="Your first name" />
                 
                 <div class="clearfix"></div>
                 <div class="log-body spanner">
                      <span>Second Name</span>
                  </div>
                 <input class="input" id="co_second_name" type="natextme" name="sname" placeholder="Your second name" />
                 
                 
                 <div class="clearfix"></div>
                 <div class="log-body spanner">
                      <span>Email</span>
                  </div>
                 <input class="input" id="co_email_name" type="email" name="euser" placeholder="your name@example.com" />
                 
                 <div class="clearfix"></div>
                 <div class="log-body spanner">
                      <span>Password</span>
                  </div>
                 <input class="input" id="co_password_name" type="password" name="puser" placeholder="Your password" />
                 
                 <div class="clearfix"></div>
                 <div class="log-body spanner">
                      <span>Mobile</span>
                  </div>
                 <input class="input" id="co_mobile_number_name" type="text" name="muser" placeholder="Mobile Number" />
                 
               </div>
               
              <div class="log-body">
                  <div class="login-btn" onclick="return signup_new_user(this);">
                      Sign up
                  </div>
              </div>
              <div class="log-body footer-logs">
                  <div class="forget-password sign-s">
                      <span class="ask-about-account" href=""> Don you have an account? </span>
                      <button class="btn btn-danger btn-sign login-from-sign-up">Login</button>
                   </div>
               </div>
          </div>
      </section>
      
      
 