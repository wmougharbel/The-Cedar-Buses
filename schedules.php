<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Schedules</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style type="text/css">
    table, td, th{
      width: 80%;
      margin-top: 50px;
      margin-left: 10%;
      border: 1px solid;
      text-align: center;
    }

    td, th{
      width: 25%;
    }

    .tableTitle{
      font-size: 18px;
      font-weight: bold;
      text-decoration: none;
      color: black;
    }

    .tableTitle:hover{
      cursor: pointer;
      text-decoration: underline;
    }

    .top{
      height: 100%;
      margin-bottom: 100px;
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
        <li><a href="buses.php">Buses</a></li>
        <li>
          <a class="hidden active" href="schedules.php">Schedules</a><div class="dropdown">
          <button class="dropbtn" href="schedules.php">Schedule</button>
          <div class="dropdown-content">
            <a href="beirut-aley.php">Beirut - Aley</a>
            <a href="beirut-tyr.php">Beirut - Tyr</a>
            <a href="beirut-tripoli.php">Beirut - Tripoli</a>
          </div>
        </div></li>
        <li><a href="signin.php">Sign In</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
    <div class="top">
      <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="beirut-aley.php">Beirut-ALey</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
        <tbody>
          <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM beirut_aley";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
        
        </tbody>
      </table>

      <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="aley-beirut.php">Aley-Beirut</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
                  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM beirut_aley";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
      </table>

        <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="beirut-tripoli.php">Beirut-Tripoli</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
                  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM beirut_tripoli";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
      </table>
      <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="tripoli-beirut.php">Tripoli-Beirut</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
                  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM tripoli_beirut";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
      </table>
      <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="beirut-tyr.php">Beirut-Tyr</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
                  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM beirut_tyr";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
      </table>
      <table class="table">
        <tr>
          <td colspan="4"><a class="tableTitle" href="tyr-beirut.php">Tyr-Beirut</a></td>
        </tr>
        <tr>
          <th>Trip</th>
          <th>Bus</th>
          <th>Driver</th>
          <th>Time</th>
        </tr>
                  <?php
            $servername="localhost";
            $username="root";
            $password="";
            $db="cedar_buses";

            $conn= new mysqli($servername, $username, $password, $db);
            if($conn->connect_error){
              die("Connection Failed: ".$conn->connect_error);
            }

            $sql="SELECT * FROM tyr_beirut";
            $result= $conn->query($sql);
            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row=$result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[trip]</td>
                  <td>$row[bus]</td>
                  <td>$row[driver]</td>
                  <td>$row[trip_time]</td>
                </tr>
              ";
            }
          ?>
      </table>
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
          <li><a class="underlineLink" href="contact.html">Contact</a></li>
        </ul>
      </div>
    </div>
</body>
</html>

<script src="socialmedia.js"></script>