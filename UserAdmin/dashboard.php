 <?php 
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}


?> 
            
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Earn Money | User Dashboard </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <?php require_once 'headerlinks.php';?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue sidebar-mini">

<?php require_once 'header.php';?>

<?php require_once 'sidebarMenu.php';?>
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php
      require_once './assets/class/userProfileClass.php';
      $aobj = new UserProfileClass();
      $result = $aobj->select_total();
      $totalres = mysqli_fetch_assoc($result);
//      print_r($res);
      ?>
      
      
      
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> <?php 
                                  if(isset($totalres['total_balance'])){
                                      if($totalres['total_balance']>='0'){
                                          echo '<strong>$ '.$totalres['total_balance'].'</strong>';
                                      } else {
                                          echo '$ 0';
                                      }
                    
                } 
                
                  ?></h3>

              <p>Total Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                                  if(isset($totalres['total_ref'])){
                     if($totalres['total_ref']>='0'){
                                          echo '<strong> '.$totalres['total_ref'].'</strong>';
                                      } else {
                                          echo ' 0';
                                      }
                }
                
                  ?></h3>

              <p>Total Reference</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
                <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php 
                                  if(isset($totalres['total_withdraw'])){
                     if($totalres['total_withdraw']>='0'){
                                          echo '<strong> '.'$ '.$totalres['total_withdraw'].'</strong>';
                                      } else {
                                          echo ' 0';
                                      }
                }
                
                  ?></h3>

              <p>Total Withdraw</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
                     <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php 
                                  if(isset($totalres['total_current_balance'])){
                     if($totalres['total_current_balance']>='0'){
                                          echo '<strong> '.'$ '.$totalres['total_current_balance'].'</strong>';
                                      } else {
                                          echo ' 0';
                                      }
                }
                
                  ?></h3>

              <p>Current Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        
        
                <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>12155</h3>

              <p>Our Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        
                <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$ 12155</h3>

              <p>Today's Total Withdraw</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        
       
      </div>
      <!-- /.row -->





      <!-- Main row -->
     
      <!-- /.row (main row) -->














<!--


<h2 class="page-header">Social Widgets</h2>
<div class="row">
-->


<!--            /.col 
        <div class="col-md-4">
           Widget: user widget style 1 
          <div class="box box-widget widget-user">
             Add the bg color to the header using any of the bg-* classes 
            <div class="widget-user-header bg-black" style="background: url('dist/img/photo1.png') center center;">
              <h3 class="widget-user-username">Elizabeth Pierce</h3>
              <h5 class="widget-user-desc">Web Designer</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/user3-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">SALES</span>
                  </div>
                   /.description-block 
                </div>
                 /.col 
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                   /.description-block 
                </div>
                 /.col 
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
                  </div>
                   /.description-block 
                </div>
                 /.col 
              </div>
               /.row 
            </div>
          </div>
           /.widget-user 
        </div>-->
        <!-- /.col -->
      </div>










<!--  -->












    </section>
    <!-- /.content -->
  








<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->




<?php require_once './footer.php';?>
<?php require_once './footerLinks.php';?>
</body>
</html>
