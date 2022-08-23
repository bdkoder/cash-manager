<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userActiveRequest
 *
 * @author Shahidul_Islam
 */
class UserWithdrawActiveRequest {
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
    
           function select_all_totalwithdrawuser() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from totalwithdrawuser order by id desc";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;

        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
    function update_all_totalwithdrawuser($data) {
      //  print_r($data);
//        exit();
         $row_id = $data['id'];
     
         $sql = "update totalwithdrawuser set amount='$data[amount]', success_amount='$data[success_amount]', ac_details='$data[ac_details]',status='$data[status]' where id='$row_id'";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            //header('Location: userWithdrawActiveRequestAccept.php');
            
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    
    }
    
    
}
