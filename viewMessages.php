<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Driver Sign In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style type="text/css">
     .table, .td, th{
      width: 80%;
      margin-top: 50px;
      margin-left: 10%;
      border: 1px solid;
      text-align: center;
    }

    td, th{
      width: 25%;
      border: 1px solid;
    }

    .tableTitle{
      font-size: 18px;
      font-weight: bold;
      text-decoration: none;
      color: black;
    }
  </style>
	</head>
	<body onmouseover="displayMap()">
		<nav onmouseover="displayMap()">
      <div class="logo"><img class="busmap" src="bus.png" ></div><div class="logo">Track<font color="#33cc00
"> Cedar</font> Buses</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href="driverPage.php">Home</a></li>
        <li><a href="driverContact.html">Contact</a></li>
        <li><a class="active" href="viewMessages.php">Messages</a></li>
        <li><a href="signin.php">Sign Out</a></li>
      </ul>
    </nav> 
    <div class="top">
      <table class="table">
        <tr>
          <td class="tableTitle" colspan="3">User Messages</td>
        </tr>
        <tr>
          <th>Sender Name</th>
          <th>Date</th>
          <th>Message</th>
        
                <?php 
          $servername="localhost";
          $username="root";
          $password="";
          $db="cedar_buses";
          $conn= new mysqli($servername, $username, $password, $db);
          if($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
          }
          $sql="SELECT * FROM contact ORDER BY (message_date) DESC ";
          $result = $conn->query($sql);
          if(!$result){
            die("Invalid query:".$conn->error);
          }
          while ($row=$result->fetch_assoc()) {
            echo "
              <tr>
                <td>$row[name]</td>
                <td>$row[message_date]</td>
                <td>$row[message]</td>
              </tr>
            ";

          }
        ?>
      </table><br><br>
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