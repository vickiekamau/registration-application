<?php
require "conn.php";
$name = $_GET["name"];
$user_name= $_GET["user_name"];
$user_password=$_GET["user_password"];
$sql = "select * from user where user_name='$user_name'";
$result = mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0)
 {
 $status = "exist";
 }

 else
 {
 $sql= "insert into user(name,user_name,user_password) values('$name','$user_name','$user_password')";
 

   if(mysqli_query($conn,$sql))
    {
    $status= "ok";
    }
    else
    {
     $status = " error";
     }
  }
echo  json_encode(array("response"=>$status));
mysqli_close($conn);

 ?>
