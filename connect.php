<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$pass= $_POST['pass'];
$num= $_POST['num'];
$gender= $_POST['gender'];
// $fname= $_POST['firstname'];


// database connection
$conn= new mysqli('localhost','root','','form');
if($conn->connect_error){
    die("connection failed : ". $conn->connect_error);
//    if error
}
else{
    $stmt= $conn->prepare("insert into registration (fname,lname,gender,email,pass,num) values (?,?,?,?,?,?)");
  $stmt->bind_param("sssssi",$fname,$lname,$gender,$email,$pass,$num);
  $stmt->execute();
  echo "registration successfully";
  $stmt->close();
  $conn->close();
}
?>