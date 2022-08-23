   <?php
   
    
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}




?> 

<?php

require_once './assets/class/userProfileClass.php';

$userObj = new UserProfileClass();




//session_start();



 



$query_result = $userObj->select_user_proile();

$userInfo = mysqli_fetch_assoc($query_result);

?>

           <?php

require_once './assets/class/contactClass.php';
//session_start();
//        $message = '';
        if(isset($_SESSION['message'])){
            $messageU = $_SESSION['message'];
            unset($_SESSION['message']);
        }

?>
            
   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View and Manage Profile | Earn Money </title>
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

        <?php require_once 'header.php'; ?>

        <?php require_once 'sidebarMenu.php'; ?>
        <div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
                    User Profile 
                   
                </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="userProfile.php">My Account</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-8 col md-8">


          <!-- Profile Image -->
          <div class="box box-primary" style=" margin: 0px auto;">
            <div class="box-body box-profile">
                
                                 <?php  
    require_once './imageSaveClass.php';
    $imgblog = new ImageSave();
    $img = $imgblog->selectAllImageInfo();
    
   
   while($resimg =  mysqli_fetch_assoc($img)){
       
   ?>

          
                
              <img class="hhUp img-responsive img-circle" src="<?php echo $resimg['img'];?>" alt="User profile picture">
          <?php    } 
?>
              <style>
                  .hhUp{
                  
    height: 164px;
    width: 166px;
    margin: 0px auto;
    border: 5px solid #ddd;
    padding: 3px;
                  }
              </style>
              
              
              <h3 class="profile-username text-center"><?php if(isset($userInfo['fullName'])){echo $userInfo['fullName'];}?></h3>

              <p class="text-muted text-center"><?php if(isset($userInfo['profession'])){echo $userInfo['profession'];}?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Package</b> <a class="pull-right text-red text-bold"><?php if(isset($userInfo['package'])){
                      $packageNmuber =  $userInfo['package'];
                      if($packageNmuber == '1'){
                          echo 'Silver $25';
                      } elseif ($packageNmuber == '2') {
                          echo 'Gold $50';
                      } elseif ($packageNmuber == '3') {
                          echo 'Diamond $100';
                      }else{
                          echo 'Envaild';
                      }
                      
                  }?></a>
                </li>
                <li class="list-group-item">
                    <b>Status</b> 
                    <?php 
                    require_once './assets/class/userIdActiveRequestClass.php';
                    $obj = new UserIdActiveRequestClass();
                    $query_result = $obj->select_request();
                    $res = mysqli_fetch_assoc($query_result);
                    
                    $active_status = $res['active_status'];
//                    echo $active_status;
//                    exit();
                    ?>
                    <?php 
                        if($active_status =='0'){
                           
                               echo '<a class="pull-right text-blue text-bold">
                        Activation Pending 
                    </a> ';
                              
                        }elseif ($active_status == '1') {
                           echo '<a class="pull-right text-green text-bold">
                          Activated Successful.
                    </a> ';
                        }elseif ($active_status == '2') {
                           echo '<a class="pull-right text-red text-bold">
                          Account Suspended.
                    </a> ';
                        }else{
                          
                             
                             
                              echo '<a class="pull-right text-red text-bold">
                         Not Active
                    </a> ';
                              
                               echo '<a  href="userActiveRequest.php">
                        <input style="margin-left: 25px;" type="button" value="Active" name="activebtn" />
                    </a>';
                              	
                  
                              
                        }
                    
                    ?>
    
                </li>
                				
		<?php
                require_once './assets/class/userProfileClass.php';
                
                $totalobj = new UserProfileClass();
               $totalresult =  $totalobj->select_total();
                
                $totalres = mysqli_fetch_assoc($totalresult);
                

                ?>
                
                
                 <li class="list-group-item">
                  <b>Your ID</b> <a class="pull-right"> <?php 
                                  if(isset($totalres['login_id'])){
                                      if($totalres['login_id']>='0'){
                                          echo '<strong>'.$totalres['login_id'].'</strong>';
                                      } else {
                                          echo 'After Activated';
                                      }
                    
                } 
                
                  ?></a>
                </li>
                
                
                
                
                <li class="list-group-item">
                  <b>Total Earn</b> <a class="pull-right"> <?php 
                                  if(isset($totalres['total_balance'])){
                                      if($totalres['total_balance']>='0'){
                                          echo '<strong>$ '.$totalres['total_balance'].'</strong>';
                                      } else {
                                          echo '$ 0';
                                      }
                    
                } 
                
                  ?></a>
                </li>
                
                <?php
                require_once './assets/class/userProfileClass.php';
                $ttOb = new UserProfileClass();
                $ttresult = $ttOb->per_user_total_ref();
               $refcount ='0';
                while( $ttres = mysqli_fetch_assoc($ttresult)){
                    //echo $ttres['reference_id'];;
                $refcount ++;
                }
           
                ?>
                
                <li class="list-group-item">
                    <?php
                    require_once './assets/class/userProfileClass.php';
                    
                    $updateRef = new UserProfileClass();
                    $updateRef->update_ref($refcount);
                    
                    
                    ?>
                    
                  <b>Total Reference</b>
                  
<!--                  <a  href="userActiveRequest.php">
                        <input style="margin-left: 25px;" type="button" value="Update" name="activebtn" />
                    </a>-->
                  
                  <a class="pull-right"><?php 
                                  if(isset($refcount)){
                     if($refcount>='0'){
                                          echo '<strong> '.$refcount.'</strong>';
                                      } else {
                                          echo ' 0';
                                      }
                }
                
                  ?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Referenced By</b> <a class="pull-right"><?php if(isset($userInfo['reference_id'])){echo $userInfo['reference_id'];}?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Your Email</b> <a class="pull-right"><?php if(isset($userInfo['email'])){echo $userInfo['email'];}?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Your Country</b> <a class="pull-right"><?php if(isset($userInfo['country'])){echo $userInfo['country'];}?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Account Created Date</b> <a class="pull-right"><?php if(isset($userInfo['date'])){echo $userInfo['date'];}?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Password</b> <a class="pull-right">**********</a>
                </li>
                
              </ul>

              <a href="userProfileEdit.php?title =<?php if(isset($userInfo['fullName'])){echo $userInfo['fullName'];}?> " class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

           
          <!-- /.box -->
      
     
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
            
            
            
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

    
    
    

<?php require_once './footerLinks.php';?>
<!-- jQuery 2.2.3 -->

</body>
</html>


