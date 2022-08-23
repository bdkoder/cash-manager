<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author bdkod
 */
class Login {
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
    
    
    public function admin_login_chck($data) {
        $password = md5($data['password']);
//        echo '<pre>';
//        print_r($data);
//        echo $password;
        $sql = "select * from login where email ='$data[email]' and password ='$password'";
        //$sql = "INSERT INTO tbl_admin (email_address,password) VALUES ('$data[email]','$password')";
       
//        print_r($sql);
       $query_result =  mysqli_query($this->connection, $sql);
       $admin_info =  mysqli_fetch_assoc($query_result);
//       echo '<pre>';
//       print_r($admin_info);
       if($admin_info){
           session_start();
           $_SESSION['admin_id']   = $admin_info['login_id'];
           $_SESSION['admin_name'] = $admin_info['fullName'];
           $_SESSION['admin_profession'] = $admin_info['profession'];
           $_SESSION['admin_date'] = $admin_info['date'];
           
           
           header('Location: dashboard.php');
    }else {
//        for msg
//            session_start();
//            $_SESSION['login_wrong_msg'] = 'User Password Or Email Is Wrong';
        $login_wrong_msg = 'User Password Or Email Is Wrong';
       // header('Location: index.php');
        return $login_wrong_msg;
        
        
    }
}


public function admin_logout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_profession']);
    header('Location: index.php');
}

}
//
//
//   amazon , ebay, wplister,
//
//