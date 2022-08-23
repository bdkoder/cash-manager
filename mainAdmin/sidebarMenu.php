  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
        <li class="active treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
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
        
        
        <li class=" treeview">
            <a href="userTotal.php">
            <i class="fa fa-user-circle"></i> <span>Total User</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
        
        <li class=" treeview">
            <a href="userActiveRequest.php">
            <i class="fa fa-user-circle"></i> <span>User Active Request</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
        
           
         <li class=" treeview">
            <a href="userBalanceGive.php">
            <i class="fa fa-user-circle"></i> <span>User Balance Give</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
       
        
         <li class=" treeview">
            <a href="userWithdrawActiveRequestAccept.php">
            <i class="fa fa-user-circle"></i> <span>User Withdraw Request Accept</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li>
       
       
      
  
       
     
   
        
        
   
        
         <li class="header"> CSE</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
