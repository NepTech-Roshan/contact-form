<?php
$fullName=$_POST['FullName'];
$email=$_POST['Email'];
$password=$_POST['Password'];
$message=$_POST['Message'];
$subject=$_POST['Subject'];
//Database Connection
$con=new mysqli ('127.0.0.1','root','root','test');
if($con->connect_error){
  die('Connection Failed:'.$con->connect_error);
}else{
  $stmt=$con->prepare("insert into registration(FullName,Email,Password,Message,Subject)
  values(?,?,?,?,?)");
  $stmt->bind_param("sssss",$fullName,$email,$password,$message,$subject);
  $stmt->execute();
  echo"registration successful ...";
  $stmt->close();
  $con->close();
}
?>