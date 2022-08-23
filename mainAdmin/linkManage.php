   <?php
   
    
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}




?> 

<?php

require_once './assets/class/linkClass.php';

$appObj = new LinkClass();



if(isset($_GET['status'])){
//    echo 'Hello';
//    exit();
   
    $a = $_GET['id'];

    
     $message = $appObj->delete_link_by_id($a);
     
     
}
//session_start();



 



$query_result = $appObj->select_all_link();



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
        <title>Link and Manage Contact | Notebook </title>
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
          
            
            
            
            
        
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View and Manage Link
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="linkManage.php">View & Manage Link</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="center red"> <?php if(isset($message)){echo $message;}?> </h3>
                <h3 class="center green"> <?php if(isset($messageU)){echo $messageU;}?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl. No</th>
                  <th>Name</th>
                  <th>Link</th>
                  <th>Imergency </th>
                  <th>Date</th>
                  <th>Comments</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; while ($linkinfo = mysqli_fetch_assoc($query_result)){ ?>
                <tr>
                    <td><?php echo $i++;?></td>
                  <td><?php if(isset($linkinfo['name'])){echo $linkinfo['name']; }?></td>
                  <td> <a href="<?php if(isset($linkinfo['link'])){echo $linkinfo['link']; }?>" target="blink"> <?php if(isset($linkinfo['link'])){echo $linkinfo['link']; }?></a>
                  </td>
                  <td><?php if(isset($linkinfo['emergency'])){echo $linkinfo['emergency']; }?></td>
                  <td><?php if(isset($linkinfo['date'])){echo $linkinfo['date']; }?></td>
                  <td><?php if(isset($linkinfo['comments'])){echo $linkinfo['comments']; }?></td>
                  <td>
                      <a target="blink" href="linkViewById.php ?title=<?php echo $linkinfo['name']?> && id=<?php echo $linkinfo['link_id']?>"> <i class="fa fa-eye"> </i></a> || 
                            <a href="linkEdit.php ?title=<?php echo $linkinfo['name']?> &&id=<?php if(isset($linkinfo['link_id'])){echo $linkinfo['link_id']; }?>"><i class="fa fa-pencil"> </i></a>
                            <a href="?status=delete && id=<?php if(isset($linkinfo['link_id'])){echo $linkinfo['link_id']; }?>" onclick="return confirm('Are You Sure To Delete Student');"> <i class="fa fa-trash"> </i></a>
<!--                            <a href="" onclick="return checkDelete();"> <i class="fa fa-trash"> </i></a>-->
                  </td>
                </tr>
            
              
                    <?php }?>
              
             
          
                </tbody>
                <tfoot>
                <tr>
                    <th>Sl. No</th>
                  <th>Name</th>
                  <th>Link</th>
                  <th>Imergency </th>
                  <th>Date</th>
                  <th>Comments</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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
