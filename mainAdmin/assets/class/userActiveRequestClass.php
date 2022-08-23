<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userActiveRequestClass
 *
 * @author Shahidul Islam
 */
class UserActiveRequestClass {
    protected $connection;
    
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $user_pass = '';
        $db_name = 'cash';
                
        $this->connection = mysqli_connect($host_name, $user_name, $user_pass, $db_name);
        if (!$this->connection){
            //die('Connection Failed'.mysqli_error($connection));
            die('Connection Failed'.mysqli_error($this->connection));
        }
    }
    
     function select_all_request() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from user_active_request order BY  id DESC";
        //$sql = "Select * from user_active_request  where login_id = $id";
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
    
    
    
      public function delete_by_id($id){
        $login_id = $_SESSION['admin_id'];
        $sql = "DELETE FROM user_active_request WHERE login_id='$id'";
//        print_r($sql);        exit();
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            
//            session_start();
//            $_SESSION['message'] = 'Data Deleted Succesfully';
//            
//            header('Location: contactManage.php');
            $message = 'Data Deleted Succesfully';
            return $message;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
            public function update_active($data) {
          $login_id = $_SESSION['admin_id'];
//          print_r($data);
//          exit();
         $sql = "update user_active_request set active_status='1' where login_id='$data'";
         
//         for balance db
      
  //      $sql = "insert into user_balance (login_id) values ($data)";
//         print_r($sql);
//         exit();
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            //header('Location: userActiveRequest.php');
            //session_start();
            $_SESSION['message'] = 'Account Activated Succesfully';
            
            return $query_result;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
            public function id_suspend($data) {
          $login_id = $_SESSION['admin_id'];
//          print_r($data);
//          exit();
         $sql = "update user_active_request set active_status='2' where login_id='$data'";
//         print_r($sql);
//         exit();
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            //header('Location: userActiveRequest.php');
            //session_start();
            $_SESSION['message'] = 'Account Activated Succesfully';
            
            return $query_result;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
    
          public function make_balance($data) {
          //$login_id = $_SESSION['admin_id'];
//          print_r($data);
//          exit();
//         for balance db
      
        $sql = "INSERT INTO user_total_balance (login_id) VALUES ('$data')";
  
//         print_r($sql);
//         exit();
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            //header('Location: userActiveRequest.php');
            //session_start();
            $_SESSION['message'] = 'Balance Activated Succesfully';
            
            return $query_result;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
}
