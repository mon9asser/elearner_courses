<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Hi <?php echo $_SESSION['user_info']['first_name'];?> , Welcome to admin panel </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        
                        <ul class="nav pull-right">
                            
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $_SESSION['user_info']['first_name'].' '.$_SESSION['user_info']['second_name'];?>
                                    <img src="../user_images/man_avatar.jpg" class="nav-avatar" />
                                
                                <ul class="dropdown-menu">
                                    <li><a href="#"></a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
</div>