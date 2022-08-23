 <?php 
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}


?> 



<?php
if (isset($_POST['btn'])) {
    require_once './assets/class/userIdActiveRequestClass.php';
    $appObj = new UserIdActiveRequestClass();
    $msg = $appObj->send_request($_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Active Request </title>
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
       User Active Request
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Link</li>
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
                  <label for="exampleInputEmail1">Enter Payment Description</label>
                  <textarea name="des"  class="form-control" rows="10"></textarea>
                </div>
                
                
                <div class="form-group">
                
                    <input name="btn" type="submit" class="form-control btn btn-success" id="exampleInputEmail1" value="Save">
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


<?php require_once './footerLinks.php';?>
</body>
</html>
