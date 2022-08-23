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
class LinkClass {
           protected $connection;
    
    public function __construct() {
        //        echo '<pre>';
//        print_r($data);
//        exit();
        
        $host_name = 'localhost';
        $user_name = 'root';
        $user_pass = '';
        $db_name = 'notebookoop';
                
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
    
       public function save_link($data) {
           $login_id= $_SESSION['admin_id'];;

        $sql = "INSERT INTO link (name,link,emergency,comments,login_id) VALUES "
                . "('$data[name]','$data[link]','$data[emergency]','$data[comments]','$login_id')";
       // print_r($sql);
       // mysqli_query($connection, $sql);
        //if(mysqli_query($connection, $sql)){
        if(mysqli_query($this->connection, $sql)){
            $msg = 'Data Saved Succesfully';
            return $msg;
        }else{
            //die('Query Problem'.mysqli_error($connection));
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
       function select_all_link() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from link  where login_id = $id";
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
    
        public function delete_link_by_id($id){
        $login_id = $_SESSION['admin_id'];
        $sql = "DELETE FROM link WHERE link_id='$id' and login_id = '$login_id' ";
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
    
    public function select_link_by_id($link_id_by_url){
        $login_id = $_SESSION['admin_id'];
        $sql = "Select * from link where link_id='$link_id_by_url' and login_id='$login_id'";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
        public function update_link($data) {
         
          $login_id = $_SESSION['admin_id'];
         $sql = "update link set name='$data[name]', link='$data[link]', emergency='$data[emergency]',comments='$data[comments]' where link_id='$data[link_id_hidden]' and login_id=$login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            header('Location: linkManage.php');
            session_start();
            $_SESSION['message'] = 'Data Updated Succesfully';
            
            return $query_result;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
}
