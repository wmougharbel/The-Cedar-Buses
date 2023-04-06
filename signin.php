<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Driver Sign In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style type="text/css">
    .signin{
      width: 50%;
      margin-top: 7.5%;
      margin-left:25%;
      border: 1px solid black;
      border-radius: 15px;
      padding: 1%;
      text-align: center;
    }

    input{
      
      width: 100%;
      height: 30px;
      background-color: white;
      border: 1px solid black;
      border-radius: 5px;
      text-align: center;
      font-weight: bold;
    }

    input[type=submit]{
      background-color: black;
      color: white;
    }

    input[type=submit]:hover{
      cursor: pointer;
    }

    input[type=text]:hover, input[type=password]:hover{
      cursor: text;
    }

    .error{
      width: 40%;
      height: 40px;
      margin-left: 30%;
      background-color: #ff6666;
      text-align: center;
      font-size: 25px;
      border-radius: 5px;
    }

    @media (max-width: 600px){
      .top{
        height: 400px;
      }
      .signin{
        width: 80%;
        margin-left: 10%;
      }
    }
  </style>
</head>
<body>
		<nav>
      <div class="logo"><img class="busmap" src="bus.png" ></div><div class="logo">Track<font color="#33cc00
"> Cedar</font> Buses</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a  href="buses.php">Buses</a></li>
        <li>
          <a class="hidden" href="schedules.php">Schedules</a>
          <div class="dropdown">
          <button class="dropbtn" onclick="schedules()">Schedule</button>
          <div class="dropdown-content">
            <a href="beirut-aley.php">Beirut - Aley</a>
            <a href="beirut-tyr.php">Beirut - Tyr</a>
            <a href="beirut-tripoli.php">Beirut - Tripoli</a>
          </div>
        </div></li>
        <li><a class="active" href="signin.php">Sign In</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav> 
    <div class="top">
      <fieldset class="signin">
        <legend><h2>Driver Sign In</h2></legend>
        <form method="POST">
          <label for="driver_id"><b>Driver Id:</b></label><br>
          <input type="text" name="driver_id" required><br>
          <label for="password"><b>Password:</b></label><br>
          <input type="password" name="password" required><br><br>
          <input type="submit" name="submit" value="Sign In"><br><br>
        </form>
      </fieldset>
      <?php
        if($_POST){
          $host="localhost";
          $user="root";
          $pass="";
          $db="cedar_buses";

          $driver_id= $_POST['driver_id'];
          $pwd= $_POST['password'];
          $conn= new mysqli($host, $user,$pass,$db);
          $sql="SELECT * FROM drivers WHERE driver_id='$driver_id' and pwd='$pwd'";
          $result= mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['cedar_buses']='true';
            header('location:driverPage.php');
            exit;
          }
          else{
            echo"<br>";
            echo '<div class="error">Wrong username or password!</div>';
          }
        }
      ?>
      <br><br><br><br>
    </div>
        <div class="footer">
      <div class="card">
        <p class="cardTitle">Get In Touch</p><br>
        <p><img src="google-maps.png">Aley District, Lebanon</p><br>
        <p><img src="phone.png"> +961: 70408636 - 71134902</p><br>
        <p><img src="gmail.png"> thecedarbuses@gmail.com</p><br>
        <img class="socialLink" onclick="facebook()" src="facebook.png">
        <img class="socialLink" onclick="instagram()" src="instagram.png">
        <img class="socialLink" onclick="twitter()" src="twitter.png">
        <img class="socialLink" onclick="pinterest()" src="pinterest.png">
      </div>

      <div class="card2">
        <p class="cardTitle">QuickLinks</p><br>
        <ul type="disc" style="padding-left: 30px;">
          <li><a class="underlineLink" href="index.html">Home</a></li>
          <li><a class="underlineLink" href="buses.php">Buses</a></li>
          <li><a class="underlineLink" href="schedules.php">Schedules</a></li>
          <li><a class="underlineLink" href="about.html">About</a></li>
          <li><a class="underlineLink" href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
</body>
</html>

<script src="socialmedia.js"></script>
</body>
</html>