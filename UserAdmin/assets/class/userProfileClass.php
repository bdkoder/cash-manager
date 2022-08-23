<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userProfileClass
 *
 * @author Shahidul Islam
 */
class UserProfileClass {
    //put your code here
    
    
     protected $connection;
    
    public function __construct() {
        //        echo '<pre>';
//        print_r($data);
//        exit();
        
        $host_name = 'localhost';
        $user_name = 'root';
        $user_pass = '';
        $db_name = 'cash';
                
        $this->connection = mysqli_connect($host_name, $user_name, $user_pass, $db_name);
//        $connection = mysqli_connect($host_name, $user_name, $user_pass, $db_name);
//        echo'<pre>';
//        print_r($connecttion);
//        exit();
//        if (!$connection){
        if (!$this->connection){
            //die('Connection Failed'.mysqli_error($connection));
            die('Connection Failed'.mysqli_error($this->connection));
        }
    }
    
       function select_user_proile() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from login  where login_id = $id";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
            //$student_info = mysqli_fetch_array($query_result);
            //while ($student_info = mysqli_fetch_array($query_result)){
//            while ($student_info = mysqli_fetch_assoc($query_result)){
//                echo '<pre>';
//                print_r($student_info);
//            }
////            echo '<pre>';
//           // print_r($query_result);
////            print_r($student_info);
//            exit();
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
     public function select_user_proile_by_id(){
        $login_id = $_SESSION['admin_id'];
        $sql = "Select * from login where login_id = $login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
            public function update_profie($data) {
          $login_id = $_SESSION['admin_id'];;
         $sql = "update login set fullName='$data[name]', phone='$data[phone]', profession='$data[profession]'  where login_id=$login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            
            $msg = 'Profile Updated Succesfully';
            
            return $msg;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
    
//    for total balance and ref
    
          function select_total() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from user_total_balance  where login_id = $id";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
            //$student_info = mysqli_fetch_array($query_result);
            //while ($student_info = mysqli_fetch_array($query_result)){
//            while ($student_info = mysqli_fetch_assoc($query_result)){
//                echo '<pre>';
//                print_r($student_info);
//            }
////            echo '<pre>';
//           // print_r($query_result);
////            print_r($student_info);
//            exit();
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
    
   function per_user_total_ref() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from login  where  reference_id=$id";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
            //$student_info = mysqli_fetch_array($query_result);
            //while ($student_info = mysqli_fetch_array($query_result)){
//            while ($student_info = mysqli_fetch_assoc($query_result)){
//                echo '<pre>';
//                print_r($student_info);
//            }
////            echo '<pre>';
//           // print_r($query_result);
////            print_r($student_info);
//            exit();
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
//    update ref in table
    public function update_ref($data) {
          $login_id = $_SESSION['admin_id'];
         $sql = "update user_total_balance set total_ref='$data' where login_id=$login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            
            $msg = 'Profile Updated Succesfully';
            
            return $msg;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
//    update ref in table
    
}
