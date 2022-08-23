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
        <title>User Withdraw Active Request Accept || Main Admin </title>
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
       User Withdraw Active Request Accept
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Withdraw Active Request Accept</a></li>
      
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
                <tr>
                  <th>Sl. No</th>
                  <th> Id</th>
                  <th>Login Id</th>
                  <th>amount</th>
                  <th>success_amount</th>
                  <th>ac_details </th>
                  <th>status</th>
                  <th>date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                    




                    <?php
                    require_once './assets/class/userWithdrawActiveRequestClass.php';
                    $objU = new UserWithdrawActiveRequest();
                    $query_res = $objU->select_all_totalwithdrawuser();
                    $i=1;
                    
//                    
//                ?>
                    
          <?php
                     if(isset($_POST['update'])){
                          require_once './assets/class/userWithdrawActiveRequestClass.php';
                    $objUA = new UserWithdrawActiveRequest();
                       $objUA -> update_all_totalwithdrawuser($_POST);
                       
                    }
                    
                    ?>
             
                
                
                    
                    <?php
                    while ($result = mysqli_fetch_assoc($query_res))
                    {
                        
                    
                    ?>
                
                   <form action="" method="POST">
                    
       

                <tr>
                    <td><?php echo $i++;?></td>
                    <td><input class="boxin" type="text" value="<?php
                    if(isset($result['id'])){
                        echo $result['id'];
                    }
                    ?>" name="id" />
                    </td>
                    
                    
                    <td><?php
                    if(isset($result['login_id'])){
                        echo $result['login_id'];
                    }
                    ?></td>
                    
                    
                    <td><input class="boxin" type="text" value="<?php
                    if(isset($result['amount'])){
                        echo $result['amount'];
                    }
                    ?>" name="amount" /></td>
                    
                    
                    <td><input class="boxin" type="text" value="<?php
                    if(isset($result['success_amount'])){
                        echo $result['success_amount'];
                    }
                    ?>" name="success_amount" /></td>
                    

                    <td><input  type="text" value="<?php
                    if(isset($result['ac_details'])){
                        echo $result['ac_details'];
                    }
                    ?>" name="ac_details" /></td>
                    
                    
<!--                    <td><input class="boxin" type="text" value="" name="status" /></td>-->
                    
                    <td><?php
                    if(isset($result['status'])){
                        $status =  $result['status'];
                    }
//                    ?>
                        
                        <select name="status">
                            <option value="0"  <?php
                    if($status<= '0'){
                        echo 'selected="selected"';
                    }
                    ?>> Select </option>
                            <option value="1"  <?php
                    if($status=='1'){
                        echo 'selected="selected"';
                    }
                    ?> >Paid</option>
                            <option value="2"  <?php
                    if($status=='2'){
                        echo 'selected="selected"';
                    }
                    ?> >Suspend</option>
                        </select>
                    </td>
                    
                    <td><?php
                    if(isset($result['date'])){
                        echo $result['date'];
                    }
                    ?></td>
                    <td>
                    
                    
                    <button class="btn btn-danger" name="update">Update</button>
                    
                    
                    </td>

                </tr>
                        
                    
                   </form>     


              <?php }?>
             
                         

                </tbody>
                <tfoot>
                <tr>
                  <th>Sl. No</th>
                  <th> Id</th>
                  <th>Login Id</th>
                  <th>amount</th>
                  <th>success_amount</th>
                  <th>ac_details </th>
                  <th>status</th>
                  <th>date</th>
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
