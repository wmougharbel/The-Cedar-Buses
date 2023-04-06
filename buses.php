<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="style.css">
	<title>Buses</title>

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

    .top{
      height: 650px;
    }

    .column{
      width: 33.3%;
      float: left;
      margin-top: 100px;
      text-align: center;
      font-weight: bold;
    }

    .imgContainer2{
      width: 30%;
      margin-left: 15%;
      margin-top: 100px;
      text-align: center;
      font-weight: bold;
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
        <li><a class="active" href="buses.php">Buses</a></li>
        <li>
          <a class="hidden" href="schedules.php">Schedules</a>
          <div class="dropdown">
          <button class="dropbtn" role="button" onclick="schedules()">Schedule</button>
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
        <thead>
        <tr>
          <th>Bus Number</th>
          <th>Driver Name</th>
          <th>Route</th>
          <th>Schedule</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $servername="localhost";
          $username="root";
          $password="";
          $db="cedar_buses";

          $conn = new mysqli($servername, $username, $password, $db);

          //check connection
          if($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
          }

          //read row from database table
          $sql= "SELECT * FROM buses";

          //connect to data base and execute query
          $result= $conn->query($sql);

          if(!$result){
            die("Invalid query: ".$conn->error);
          }

          while($row= $result->fetch_assoc()){
            echo "
            <tr>
              <td>$row[number]</td>
              <td>$row[driver]</td>
              <td>$row[route]</td>
              <td>$row[link]</td>
            </tr>
            ";
          }
        ?>
      </tbody>
      </table>

      <div class="column">
        <img src="bus1.jpg">
        <p>Buses 1 & 2</p>
      </div>
        <div class="column">
        <img src="bus3.jpg">
        <p>Buses 3 & 4</p>
      </div>
      <div class="column">
        <img src="bus5.jpg">
        <p>Buses 5 & 6</p>
      </div>
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

<script src="socialmedia.js">
</script>

