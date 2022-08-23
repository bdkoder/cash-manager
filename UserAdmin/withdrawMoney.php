   <?php
   
    
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}




?> 


 <?php
                    //totalwithdrawuse theke `user_total_balance update debar jonno
                    require_once './assets/class/totalMoneyClass.php';
                    $wObj = new TotalMoney();
                   $query_result =  $wObj->select_total_withdraw();
                   $a = 0;
                   while ($wres = mysqli_fetch_assoc($query_result)){
                     $amount = $wres['success_amount'];
                  $a += $amount;
                  
                
                   }
                     // echo $a;
                    $wObj->updateWihdraw($a);
                    ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Withdraw Money | Earn Money </title>
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
        View and Manage Withdraw
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">View & Manage Withdraw</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<?php
    
require_once './assets/class/totalMoneyClass.php';
$obj = new TotalMoney();
$result = $obj->select_user_balance();
$res = mysqli_fetch_assoc($result);
//print_r($res);
?>
          
          <!-- 2nd table -->
          
                <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="center blue"> Total Earn</h3>
                <h3 class="center green"> <?php if(isset($messageU)){echo $messageU;}?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="examplea1" class="table table-bordered table-striped">
                  
                <thead>
                <tr>
                  <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Total Income</th>
                  <th>Total Reference</th>
                  <th>Total Withdraw</th>
                  <th>Current Balance</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    if(isset($res['total_balance'])){
                        $tb = $res['total_balance']-$a;
                         $tb;
                         
                         require_once './assets/class/totalMoneyClass.php';
                         $utb = new TotalMoney();
                         $utb->updateTotalBalance($tb);
                         
                         
                    }
                    
                    ?>
                    <?php $i=1; //while ($request_info = mysqli_fetch_assoc($query_result)){ ?>
               
                    
                   
                    <tr>
                    
                    
             
                    
                    
                    <td>1</td>
                    <td><?php
                    if(isset($res['login_id'])){
                        echo $res['login_id'];
                    }
                    ?></td>
                    <td><?php
                    if(isset($res['total_balance'])){
                        echo '$ '.$res['total_balance'];
                    }
                    ?></td>
                    <td><?php
                    if(isset($res['total_ref'])){
                        echo $res['total_ref'];
                    }
                    ?></td>
                    <td><?php
                    if(isset($res['total_withdraw'])){
                        echo '$ '.$res['total_withdraw'];
                    }
                    ?></td>
                    <td><?php
                    if(isset($res['total_current_balance'])){
                        echo '$ '.$res['total_current_balance'];
                    }
                    ?></td>
                </tr>
            
              
                    <?php //}?>
              
             
          
                </tbody>
                <tfoot>
                 <tr>
               <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Total Income</th>
                  <th>Total Reference</th>
                  <th>Total Withdraw</th>
                  <th>Current Balance</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          
          
          <!-- 2nd table -->
          
          
          
          
          
          
                  <!-- 3rd table -->
          
                <div class="col-xs-12">

          <!-- /.box -->
<?php
                    if(isset($_POST['withdraw'])){
                        require_once './assets/class/totalMoneyClass.php';
                    
                    $objT = new TotalMoney();
                    $msgSave = $objT->save_money_request($_POST);
                    
                    }
                    ?>
          <div class="box">
            <div class="box-header">
              <h3 class="center blue"> Withdraw From</h3>
                <h3 class="center green"> <?php if(isset($msgSave)){echo $msgSave;}?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="examplea1" class="table table-bordered table-striped">
                  
                <thead>
                <tr>
                  <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Amount</th>
                  <th>Account Details</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                    
                <form action="" method="POST">
                    <?php $i=1; //while ($request_info = mysqli_fetch_assoc($query_result)){ ?>
                <tr>
                    
                    <td>1</td>
                    <td><input readonly="readonly" name="login_id" type="number" value="<?php
                    if(isset($res['login_id'])){
                        echo $res['login_id'];
                    }
                    ?>" placeholder="Your Login Id" required="required"></td>
                    <td><input  type="number" name="amount" placeholder="Your Amount" required="required"></td>
                    <td><textarea  name="acdetails">
                            
                        </textarea>
                    
                    </td>
                    <td><a href="#"><input type="submit" name="withdraw" class=" btn btn-danger " value="Withdraw"></a></td>
             </form>
          
                </tbody>
                <tfoot>
                 <tr>
                 <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Amount</th>
                  <th>Account Details</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          
          
          <!-- 3rd table -->
          
          
          
          
          
                  <!-- 4th table -->
          
                <div class="col-xs-12">

          <!-- /.box -->
<?php
                    require_once './assets/class/totalMoneyClass.php';
                    $moneyObj = new TotalMoney();
                    $result = $moneyObj->select_all_my_request();
                    
?>
          <div class="box">
            <div class="box-header">
              <h3 class="center blue"> Total Withdraw Details</h3>
                <h3 class="center green"> <?php if(isset($messageU)){echo $messageU;}?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  
                <thead>
                <tr>
                  <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Amount</th>
                  <th>Account Details</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; //while ($request_info = mysqli_fetch_assoc($query_result)){ ?>
               
                    <?php 
                    while ($res = mysqli_fetch_assoc($result)){
                        
                    
                    ?>
                    <tr>
                    
                    <td>1</td>
                    <td><input readonly="readonly" type="number" value="<?php
                        if(isset($res['login_id'])){
                            echo $res['login_id'];
                        }
                    
                    ?>"></td>
                    <td><input readonly="readonly" type="number" value="<?php
                        if(isset($res['amount'])){
                            echo $res['amount'];
                        }
                    
                    ?>"></td>
                    <td><textarea readonly="readonly"><?php
                        if(isset($res['ac_details'])){
                            echo $res['ac_details'];
                        }
                    
                    ?>
                        </textarea>
                        
                        
                    </td>
                    
                    <td><?php
                        if(isset($res['date'])){
                            echo $res['date'];
                        }
                    
                    ?></td>
                    
                    
                    <td> <label style="color:red;">
                        <?php
                        if(isset($res['status'])){
                            $st =  $res['status'];
                            if($st<='0'){
                                echo 'Processing';
                            }elseif ($st=='1') {
                            echo 'Paid';
                        }elseif ($st=='2') {
                            echo 'Suspend';
                        }
                        }
                    
                    ?>
                        </label>
                        
                    </td>
                    
                </tr>
          <?php }?>
                </tbody>
                <tfoot>
                 <tr>
                 <th>Sl. No</th>
                  <th>Login Id</th>
                  <th>Amount</th>
                  <th>Account Details</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          
          
          <!-- 4th table -->
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
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

