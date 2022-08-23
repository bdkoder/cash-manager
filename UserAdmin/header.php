
                       <?php
        if (isset($_GET['logout'])){
           
    require_once './assets/class/login.php';
    $login = new Login();
    $login->admin_logout();
            
}

        
        ?>

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Earn</b>Money</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
<!--          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                 inner menu: contains the actual data 
                <ul class="menu">
                  <li> start message 
                    <a href="#">
                      <div class="pull-left">
                      
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                   end message 
                  
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>-->
          <!-- Notifications: style can be found in dropdown.less -->
<!--          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                 inner menu: contains the actual data 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>-->
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                                             <?php  
    require_once './imageSaveClass.php';
    $imgblog = new ImageSave();
    $img = $imgblog->selectAllImageInfo();
    
   
   while($resimg =  mysqli_fetch_assoc($img)){
       
   ?>

          <img src="<?php echo $resimg['img'];?>" class="user-image" alt="User Image">
          <?php    } 
?>
                
              
              <span class="hidden-xs"><?php echo $_SESSION['admin_name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  
                                  
                                             <?php  
    require_once './imageSaveClass.php';
    $imgblog = new ImageSave();
    $img = $imgblog->selectAllImageInfo();
    
   
   while($resimg =  mysqli_fetch_assoc($img)){
       
   ?>
<img src="<?php echo $resimg['img'];?>" class="img-circle" alt="User Image">
          <?php    } 
?>
                

                <p>
                  <?php echo $_SESSION['admin_name'];?> - <?php echo $_SESSION['admin_profession'];?>
                  <small>Member since <?php echo $_SESSION['admin_date'];?></small>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="userProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
         <div class="pull-right">
                  <a href="?logout=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
                  
                    

                  
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>