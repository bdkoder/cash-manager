 <?php 
 session_start();

if($_SESSION['admin_id'] == NULL){
    header('Location: index.php');
}


?> 

<?php
if(isset($_GET['id'])){
    $url_id_contact_edit_page = $_GET['id'];
    require_once './assets/class/contactClass.php';
$appObj = new ContactClass();
$query_result = $appObj->select_contact_by_id($url_id_contact_edit_page);


$result = mysqli_fetch_assoc($query_result);

}else{
    exit();
}

        

if (isset($_POST['btnUpdate'])) {
    require_once './assets/class/contactClass.php';
    $appObj = new ContactClass();
    $appObj->update_contact($_POST);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Notebook | User Dashboard </title>
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
                    Add Contact Information
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Add Contact</li>
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
                                        <label for="exampleInputEmail1">Enter Name</label>
                                        <input type="hidden" name="contact_id_hidden" value="<?php if(isset($result['contact_id'])){echo $result['contact_id'];}?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required="required">
                                        <input type="text" name="name" value="<?php if(isset($result['name'])){echo $result['name'];}?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Phone Number # 1</label>
                                        <input type="number" value="<?php if(isset($result['phoneOne'])){echo $result['phoneOne'];}?>"  name="phoneOne" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Phone Number # 2</label>
                                        <input type="number" value="<?php if(isset($result['phoneTwo'])){echo $result['phoneTwo'];}?>"   name="phoneTwo" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Phone Number # 3</label>
                                        <input type="number" value="<?php if(isset($result['phoneThree'])){echo $result['phoneThree'];}?>"  name="phoneThree" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Email # 1</label>
                                        <input type="email" value="<?php if(isset($result['emailOne'])){echo $result['emailOne'];}?>"  name="emailOne" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Email # 2</label>
                                        <input type="email"value="<?php if(isset($result['emailTwo'])){echo $result['emailTwo'];}?>"  name="emailTwo" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Website URL # 1</label>
                                        <input type="text"value="<?php if(isset($result['websiteOne'])){echo $result['websiteOne'];}?>"  name="websiteOne" class="form-control" id="exampleInputEmail1" placeholder="Enter Website URL # 1">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Website URL # 2</label>
                                        <input type="text" value="<?php if(isset($result['websiteTwo'])){echo $result['websiteTwo'];}?>"  name="websiteTwo" class="form-control" id="exampleInputEmail1" placeholder="Enter Website URL # 2">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Relation</label>
                                        <input type="text" value="<?php if(isset($result['relation'])){echo $result['relation'];}?>"  name="relation" class="form-control" id="exampleInputEmail1" placeholder="Enter Relation">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Enter Address</label>
                                        <textarea name="address" class="form-control"><?php if(isset($result['address'])){echo $result['address'];}?></textarea>
                                    </div>


                                    <div class="form-group">

                                        <input type="submit" name="btnUpdate" class="form-control btn btn-success" id="exampleInputEmail1" value="Update">
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
    <!--
     jQuery 2.2.3 
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
     jQuery UI 1.11.4 
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
     Resolve conflict in jQuery UI tooltip with Bootstrap tooltip 
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
     Bootstrap 3.3.6 
    <script src="bootstrap/js/bootstrap.min.js"></script>
     Morris.js charts 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
     Sparkline 
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
     jvectormap 
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
     jQuery Knob Chart 
    <script src="plugins/knob/jquery.knob.js"></script>
     daterangepicker 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
     datepicker 
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
     Bootstrap WYSIHTML5 
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
     Slimscroll 
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
     FastClick 
    <script src="plugins/fastclick/fastclick.js"></script>
     AdminLTE App 
    <script src="dist/js/app.min.js"></script>
     AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="dist/js/pages/dashboard.js"></script>
     AdminLTE for demo purposes 
    <script src="dist/js/demo.js"></script>-->

    <?php require_once './footerLinks.php'; ?>
</body>
</html>
