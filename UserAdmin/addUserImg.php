   <?php
   
    
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}



if(isset($_POST['btn'])){
    require_once './imageSaveClass.php';
    $blog = new ImageSave();
    $msg = $blog->save_img($_POST);
    
    
}
?> 
        
   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View and Manage User Image | Earn Money </title>
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
                    User Image 
                   
      </h1><p style="color:red;">Image Size =  height:128px; width:128px; Max : 200KB</p>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="userProfile.php">My Account</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-8 col md-8">

<div class="box box-primary" style=" margin: 0px auto;">
            <div class="box-body box-profile">
                    <?php  
    require_once './imageSaveClass.php';
    $imgblog = new ImageSave();
    $img = $imgblog->selectAllImageInfo();
    
   
   while($resimg =  mysqli_fetch_assoc($img)){
       
   ?>

                <img class="upsyle img-responsive img-circle" src="<?php echo $resimg['img'];?>" alt="Update User profile picture">
                    <?php    } 
?>
                
                <style>
                    .upsyle{
                        margin: 0px auto;
                         width:253px; 
                         height:240px;
                         border: 5px solid #ddd;
                         padding: 5px;
                    }
                    .ba{
                        height: 29px;
                        margin: 25px 0px;
                    }
                </style>
            </div>
</div>
            <!-- /.box-body -->
         
        
        <form  action="" method="post" enctype="multipart/form-data">
                <div class="">
                    
                    <input type="file" class="ba" name="img" multiple accept="image/* ">
                  
                </div>
                <div class="form-group">
                    
                  
                   <input type="submit" class="btn btn-success" name="btn" value="Update Profile Picture" > 
                </div>
    
            </form>   
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


