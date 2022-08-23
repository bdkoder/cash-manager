<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userIdActiveClass
 *
 * @author Shahidul Islam
 */
class UserIdActiveRequestClass {
    //put your code here
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
    
     public function send_request($data) {
           $login_id= $_SESSION['admin_id'];;

        $sql = "INSERT INTO user_active_request (login_id,des,active_status) VALUES ($login_id,'$data[des]','0')";
       // print_r($sql);
       // mysqli_query($connection, $sql);
        //if(mysqli_query($connection, $sql)){
        if(mysqli_query($this->connection, $sql)){
            $msg = 'Request Send Succesful.';
             header('Location: userProfile.php');
           // return $msg;
        }else{
            //die('Query Problem'.mysqli_error($connection));
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
     public function select_request() {
           $login_id= $_SESSION['admin_id'];

        $sql = "Select * from user_active_request  where login_id = $login_id";       // print_r($sql);
       // mysqli_query($connection, $sql);
        //if(mysqli_query($connection, $sql)){
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            //die('Query Problem'.mysqli_error($connection));
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
}
