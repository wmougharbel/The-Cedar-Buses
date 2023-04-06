<?php
  $servername= "localhost";
  $username="root";
  $password="";
  $db="test";

  $conn= new mysqli($servername, $username, $password, $db);

  if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
  }

  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $number=$_POST['number'];

  $sql="CREATE TABLE customers (First_Name, Last_Name, Phone_Number) VALUES ('$fname', '$lname', '$number') ";
  $result= $conn->query($sql);
  if(!$result){
    die("Invalid query:".$conn->error);
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .form{
      align-self: center;
      width: 80%;
      margin-left: 10%;
      background-color: lightcyan;
      height: auto;
    }

    input{
      width: 80%;
      height: 30px;
      margin-left: 10%;
    }

    label{
      font-weight: bold;
      margin-left: 40%;
    }

    input[type=submit]{
      width: 50%;
      margin-left: 25%;
      font-weight: bold;
    }

    input[type=submit]:hover{
      background-color: darksalmon;
      transition: 0.5s;
    }
  </style>
  <title>Customers Form</title>
</head>
<body>
  <div class="form">
    <form method="POST">
      <label for="fname">First Name:</label><br>
      <input type="text" name="fname"><br><br>
      <label for="lname">Last Name:</label><br>
      <input type="text" name="lname"><br><br>
      <label for="number">Phone Number:</label><br>
      <input type="text" name="number"><br> <br>
      <input type="submit" value="Add"><br>
    </form><br>
  </div>
</body>
</html>