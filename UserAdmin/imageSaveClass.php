<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imageSave
 *
 * @author Shahidul Islam
 */
class ImageSave {
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
    public function save_img($data) {
        $id = $_SESSION['admin_id'];
//        echo '<pre>';
//        print_r($_FILES);
//        echo $_FILES['img']['name'];
       $imgName = $_FILES['img']['name'];
//        exit();
        $directory = './assets/user_img/';
        $img_url = $directory.$imgName;
        $img_type = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
        //echo $img_type;
        $img_size = $_FILES['img']['size'];
        //echo $img_size;
        $temp_name = $_FILES['img']['tmp_name'];
       $check =  getimagesize($_FILES['img']['tmp_name']);
//       echo '<pre>';
//       print_r($check);
//       print_r($check['1']);
       
       if($check){
           if(file_exists($img_url)){
               die('<center><h1>This File Already Exits, Please Rename File Name</h1></center>');
           }else{
               if($img_size>=412000){
                   die('<center><h1>Image Size Big. Please Upload max 200KB Image</h1></center>');
               }else{
                   if($img_type !='jpg' && $img_type!='png' && $img_type!='JPG'){
                       die('<center><h1>File Must be jpg Or png</h1></center>');
                   }else{
                       move_uploaded_file($_FILES['img']['tmp_name'], $img_url);
                      // $sql = "insert into tbl_img (img) values ('$img_url')";
                      $sql = " update login set img='$img_url' where login_id = $id";
                       mysqli_query($this->connection, $sql);
                       //echo 'Image Uploded Successully.';
                   }
               }
           }
       }else{
           die('This is Not a image');
       }
       
//        move_uploaded_file($_FILES['img']['tmp_name'], $img_url);
    }
    
    public function selectAllImageInfo() {
          $id = $_SESSION['admin_id'];
        $sql = "SELECT * FROM login where login_id = '$id'";
        
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    
}
