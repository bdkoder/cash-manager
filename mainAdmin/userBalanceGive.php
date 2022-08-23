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
        <title>User Balance Give || Main Admin </title>
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
       User Balance Give
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Balance Give</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->
         
          <div class="box">
            <div class="box-header">
              <h3 class="center red"> <?php //if(isset($message)){echo $message;}?> </h3>
                <h3 class="center green"> <?php if(isset($messageU)){echo $messageU;}?> </h3>
            </div>
            <!-- /.box-header -->

 <style>
              .boxin{
                  width: 55px;
              }
              select {
    height: 26px;
}
          </style>

            <div class="box-body">
              <table id="example12" class="table table-bordered table-striped table-responsive">
                <thead>
                      <?php
                     require_once './assets/class/userBalanceGiveClass.php';
                    $objUA = new UserBalanceGive();
                    $query_res = $objUA->select_all_totalBalance();
                    $i=1;
                    
//                    
//                ?>
                    
          <?php
                     if(isset($_POST['update'])){
                          require_once './assets/class/userBalanceGiveClass.php';
                    $objUA = new UserBalanceGive();
                       $objUA ->update_allUser_totalBalance($_POST);
                       
                    }
                    
                    ?>
             
                
                
                    
                   
                
                    
                <tr>
                  <th>Sl. No</th>
                  <th> id</th>
                  <th>login_id</th>
                  <th>total_balance</th>
                  <th>total_ref</th>
                  <th>total_withdraw </th>
                  <th>total_current_balance</th>
                  <th>Action</th>
                  
                </tr>
                   
                </thead>
                <tbody>
                    
              
                 <?php
                 $totalbalance='';
                 $bb='';
                         
                    while ($result = mysqli_fetch_assoc($query_res))
                    {
                        
                    
                    ?>
                   <form action="" method="POST">
                    
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><input type="text" name="id" value="<?php
                    if(isset($result['id'])){
                        echo $result['id'];
                    }
                    ?>"/> </td>
                    <td><?php
                    if(isset($result['login_id'])){
                        echo $result['login_id'];
                    }
                    ?></td>
                    <td><input type="text" name="total_balance" value="<?php
                    if(isset($result['total_balance'])){
                        echo $result['total_balance'];
                    }
                    ?>"/> </td>
                    <td><input type="text" name="total_ref" value="<?php
                    if(isset($result['total_ref'])){
                        echo $result['total_ref'];
                    }
                    ?>"/> </td>
                    <td> <?php
                    if(isset($result['total_withdraw'])){
                        echo $result['total_withdraw'];
                    }
                    ?></td>
                    <td> <?php
                    if(isset($result['total_current_balance'])){
                        echo $result['total_current_balance'];
                    }
                    ?></td>
                    
                    <td> <button class="btn btn-danger" name="update">Update</button> </td>
                   <?php
                    if(isset($result['total_balance'])){
                        $bb =  $result['total_balance'];
                        $totalbalance +=$bb;
                    }
                    ?>
                
                       
                </tr>
                 </form>  
                  <?php }?> 
                    
                     


                     

                </tbody>
                <tfoot>
                <tr>
                  <th>Sl. No</th>
                  <th> id</th>
                  <th>login_id</th>
                  <th>total_balance</th>
                  <th>total_ref</th>
                  <th>total_withdraw </th>
                  <th>total_current_balance</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
                
                <b>Total Give Balance = <?php echo $totalbalance;?>    </b>
                
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
