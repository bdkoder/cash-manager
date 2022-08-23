  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            
            <?php  
    require_once './imageSaveClass.php';
    $imgblog = new ImageSave();
    $img = $imgblog->selectAllImageInfo();
    
   
   while($resimg =  mysqli_fetch_assoc($img)){
       
   ?>

          
                  <img src="<?php echo $resimg['img'];?>" class="dkalsdla img-circle" alt="User Image">
          <?php    } 
?>
                  <style>
                      .dkalsdla{
/*                          height: 53px;
width: 51px;
border: 2px solid #ddd;
padding: 1px;*/
                      }
                  </style>
        
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['admin_name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
        
        <li class="active treeview">
          <a href="userProfile.php">
            <i class="fa fa-user-circle"></i> <span>My Profile</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
        
        <li class=" treeview">
          <a href="addUserImg.php">
            <i class="fa fa-file-image-o"></i> <span>My Profile Image</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
        
        <li class=" treeview">
          <a href="?logout=logout">
              <i class="fa fa-battery-1 "></i> <span>
                  Logout
              </span>
            <span class="pull-right-container">
              
            </span>
          </a>
         
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i>
            <span>Money Section</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><i class="fa fa-dollar"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="withdrawMoney.php"><i class="fa fa-dollar -square"></i> Withdraw Money</a></li>
            <li><a href="contactManage.php"><i class="fa fa-dollar "></i> Manage Withdraw</a></li>s
          </ul>
        </li>
        
        
   
       
     
       
     
   
   
        <li class="header">Earn Money By Video</li>
        
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o text-red"></i>
            <span> Watch Video</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">new</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Today's Video</a></li>
          </ul>
        </li>
        
   
        
        
   
        
         <li class="header"> CSE</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
