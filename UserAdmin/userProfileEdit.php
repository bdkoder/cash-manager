 <?php 
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}


?> 


<?php


    require_once './assets/class/userProfileClass.php';
$appObj = new UserProfileClass();
$query_result = $appObj->select_user_proile_by_id();


$result = mysqli_fetch_assoc($query_result);


?>


<?php 
if (isset($_POST['uptadebtn'])) {
    require_once './assets/class/userProfileClass.php';
    $appObj = new UserProfileClass();
    $msg = $appObj->update_profie($_POST);
    
    //trim(stripslashes($_POST))
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> User Profile Edit </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <?php require_once 'headerlinks.php'; ?>

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
                    User Profile Edit
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">User Edit</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="box box-success">
                            <div class="box-header with-border">

                                <h4> <p class="login-box-msg green 600"> <?php if (isset($msg)){echo $msg;}?></p></h4> 

                            </div>
                            <div class="box-body">

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Name</label>
                                        <input value="<?php if (isset($result['fullName'])){echo $result['fullName'];}?>" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Profession</label>
                                        <input value="<?php if (isset($result['profession'])){echo $result['profession'];}?>"  type="text" name="profession" class="form-control" id="exampleInputEmail1" placeholder="Enter Profession" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Phone Number </label>
                                        <input  value="<?php if (isset($result['phone'])){echo $result['phone'];}?>"  type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Country</label>
                                        <input  value="<?php if (isset($result['country'])){echo $result['country'];}?>" type="text"class="form-control" placeholder="Your Country">
                                    <small> <strong>You can't change your Country.</strong> </small>
                                    </div>


                                    <div class="form-group">
                
          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
              
              <?php if (isset($result['package'])){$selpack = $result['package'];}?>
              
              
              
                  <option <?php
              if($selpack<='0'){
                  echo 'selected="selected"';
              }
              ?> >Select Package</option>
                  <option value="1" <?php
              if($selpack=='1'){
                  echo 'selected="selected"';
              }
              ?>>Silver</option>
                  <option value="2" <?php
              if($selpack=='2'){
                  echo 'selected="selected"';
              }
              ?>>Gold</option>
                  <option value="3" <?php
              if($selpack=='3'){
                  echo 'selected="selected"';
              }
              ?>>Diamond </option>
                </select>
                                        <small> <strong>You can't change your Package.</strong> </small>
              </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Email</label>
                                        <input  value="<?php if (isset($result['email'])){echo $result['email'];}?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                        <small> <strong>You can't change your email.</strong> </small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Password</label>
                                        <input  value="**********"  type="password" id="givenText" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
                                        <a href="forgotPassword.php"> <small> <strong>Click Here For Change Your Password.</strong> </small></a>
                                    </div>
                                    
                                    
                                    
                                    
                                    


                                    <div class="form-group">

                                        <input type="submit" name="uptadebtn" class="form-control btn btn-success" id="exampleInputEmail1" value="Update Profile">
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
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
    <?php require_once './footerLinks.php'; ?>
</body>
</html>
