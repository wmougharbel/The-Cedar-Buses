<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $db="cedar_buses";
    $conn = new mysqli($servername, $username, $password, $db);
    

    if($conn->connect_error){
      die("Connection Failed: ".$conn->connect_error);
    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query:".$conn->error);
    }
    
    header("location:contact.html");
    exit;
 
?>
