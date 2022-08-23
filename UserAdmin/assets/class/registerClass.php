<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linkClass
 *
 * @author Shahidul Islam
 */
class Register {
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
    
       public function register_user($data) {
//           print_r($data);
//           exit();
           $pass = md5($data['password']);
        $sql = "INSERT INTO login (fullName,profession,phone,country,package,email,password,repassword,reference_id) VALUES "
                . "('$data[fullName]','$data[profession]','$data[phone]','$data[country]','$data[package]','$data[email]','$pass','$data[rePassword]','$data[reference_id]')";
       // print_r($sql);
       // mysqli_query($connection, $sql);
        //if(mysqli_query($connection, $sql)){
        if(mysqli_query($this->connection, $sql)){
            $msg = 'Registration Succesfull<a href="index.php"> Login from here </a>';
            return $msg;
        }else{
            //die('Query Problem'.mysqli_error($connection));
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
}
