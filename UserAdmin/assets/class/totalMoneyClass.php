<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of totalMoney
 *
 * @author Shahidul_Islam
 */
class TotalMoney {
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
    
       function select_user_balance() {
//           session_start();
           $id = $_SESSION['admin_id'];

        $sql = "Select * from user_total_balance  where login_id = $id";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
       public function save_money_request($data) {
           $login_id= $_SESSION['admin_id'];;

        $sql = "INSERT INTO totalwithdrawuser (login_id,amount,ac_details) VALUES "
                . "('$data[login_id]','$data[amount]','$data[acdetails]')";
       // print_r($sql);
       // mysqli_query($connection, $sql);
        //if(mysqli_query($connection, $sql)){
        if(mysqli_query($this->connection, $sql)){
            $msg = 'Withdraw Request Succesfully';
            return $msg;
        }else{
            //die('Query Problem'.mysqli_error($connection));
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
          function select_all_my_request() {
//           session_start();
           $id = $_SESSION['admin_id'];

        $sql = "Select * from totalwithdrawuser  where login_id = $id order by id desc";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
          
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
//    total withdrwa 
           function select_total_withdraw() {
//           session_start();
           $id = $_SESSION['admin_id'];

        $sql = "Select * from totalwithdrawuser  where login_id = $id";
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    // updateWihdraw
    
       function updateWihdraw($data) {
//           session_start();
           $id = $_SESSION['admin_id'];
//           print_r($data);
//           print_r($tb);
//           exit();
        $sql = "update user_total_balance set total_withdraw= '$data'  where login_id = $id";
        
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
//   updateTotalBalance 
           function updateTotalBalance($data) {
//           session_start();
           $id = $_SESSION['admin_id'];
//           print_r($data);
//           print_r($tb);
//           exit();
        $sql = "update user_total_balance set total_current_balance= '$data'  where login_id = $id";
        
        //--$sql = "Select * from products  where login_id = $id order BY  id DESC";
        //$sql = "Select * from products order BY  id DESC where login_id = $id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
   
}
