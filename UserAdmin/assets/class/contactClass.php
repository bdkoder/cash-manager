<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of application
 *
 * @author Shahidul Islam
 */
class ContactClass {
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
    
       public function save_contact($data) {
           $login_id= $_SESSION['admin_id'];;

        $sql = "INSERT INTO contact (name,phoneOne,phoneTwo,phoneThree,emailOne,emailTwo,websiteOne,websiteTwo,relation,address,login_id) VALUES "
                . "('$data[name]','$data[phoneOne]','$data[phoneTwo]','$data[phoneThree]','$data[emailOne]','$data[emailTwo]','$data[websiteOne]','$data[websiteTwo]','$data[relation]','$data[address]','$login_id')";
        
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
    
    
       function select_all_contact() {
//           session_start();
           $id = $_SESSION['admin_id'];
//           echo $id;           exit();
//      $id =  '2'; 
      
     // $id =  '1';     //   exit();
        $sql = "Select * from contact  where login_id = $id";
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
    
        public function delete_contact_by_id($id){
        $login_id = $_SESSION['admin_id'];
        $sql = "DELETE FROM contact WHERE contact_id='$id' and login_id = $login_id ";
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
    
    public function select_contact_by_id($contact_id_by_url){
        $login_id = $_SESSION['admin_id'];
        $sql = "Select * from contact where contact_id='$contact_id_by_url' and login_id = $login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
        public function update_contact($data) {
         
          $login_id = $_SESSION['admin_id'];;
         $sql = "update contact set name='$data[name]', phoneOne='$data[phoneOne]', phoneTwo='$data[phoneTwo]',phoneThree='$data[phoneThree]',emailOne = '$data[emailOne]',emailTwo = '$data[emailTwo]',websiteOne = '$data[websiteOne]',websiteTwo = '$data[websiteTwo]',relation = '$data[relation]',address = '$data[address]'  where contact_id='$data[contact_id_hidden]' and login_id=$login_id";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            header('Location:contactManage.php');
            session_start();
            $_SESSION['message'] = 'Data Updated Succesfully';
            
            return $query_result;
//            header('Location:viewStudent.php');
            
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
    
}
