<?php 
  $servername="localhost";
  $username="root";
  $password="";
  $db="cedar_buses";

  //create connection
  $conn=new mysqli($servername, $username, $password, $db);

  //check connection
  if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
  }

  $driverId= $_POST['driver_id'];
  $driverEmail= $_POST['email'];
  $driverMessage= $_POST['message'];

  $sql="INSERT INTO driver_contact (driver_id, email, message) VALUES ('$driverId', '$driverEmail', '$driverMessage')";

  $result=$conn->query($sql);

  if(!$result){
    die("Invalid query:".$conn->error);
  }

  header("location:driverContact.html");
  exit;

  
?>
<script>window.alert("Message sent")</script>