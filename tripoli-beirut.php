<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tripoli - Beirut</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
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

    .top{
      height: 750px;
    }
  </style>
</head>
<body >
    <nav>
      <div class="logo"><img class="busmap" src="bus.png" ></div><div class="logo">Track<font color="#33cc00
"> Cedar</font> Buses</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars" onclick="hideMap()"></i>
      </label>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="buses.php">Buses</a></li>
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
        <li><a href="signin.php">Sign In</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
    <nav class="nav2">
    	<li class="left"><a class="route" href="beirut-tripoli.php">Beirut - Tripoli</a></li>
    	<li class="right"><a class="route" href="tripoli-beirut.php">Tripoli - Beirut</a></li>
    </nav>
    <div class="top" onmouseover="displayMap()">
      <table class="table">
        <tr>
          <td class="td" colspan="4"><p class="tableTitle">Tripoli-Beirut</p></td>
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
          $sql="SELECT * FROM tripoli_beirut ";
          $result = $conn->query($sql);
          if(!$result){
            die("Invalid query:".$conn->error);
          }
          while ($row=$result->fetch_assoc()) {
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
      <div class="map" id="map"></div>
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
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

<script type="text/javascript">
  var map = L.map('map').setView([34.12508746380521, 35.89151276719853], 7);
  L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=5E7FRMYvo1pd67qknAwh', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    //maxZoom:14,
    minZoom:9
  }).addTo(map);

  
  

  var route1 = L.Routing.control({
      waypoints: [
        L.latLng(34.42310670395753, 35.823580042692065),
        L.latLng(33.87464821632467, 35.49644877447923)
    ],
    routeWhileDragging: true

  }).addTo(map);

  L.control.locate().addTo(map);

  var pointA = L.icon({
    iconUrl: 'pointA.png',
    iconSize: [17,17],
    iconAnchor: [24,24],
    popupAnchor: [0,-25]
  });

  var pointB = L.icon({
    iconUrl : 'pointB.png',
    iconSize : [17,17],
    iconAnchor : [24,24],
    popupAnchor : [0,-25]
  });

  var busStop = L.icon({
    iconUrl: 'bus-stop.png',
    iconSize: [42,42],
    iconAnchor: [24,24],
    popupAnchor: [0,-25]
  })

  var start = L.marker([34.42310670395753, 35.823580042692065], {icon: pointA, title:"Start Point. Click for more details."}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: Start Point</p> <p>Stop Name: Tripoli </p><p>Approx. Departure Time: 0</p> <p>Distance to next stop: 15.1km</p> <p>Distance to destination: 86.3km');

  var stop1 = L.marker([34.32278354878053, 35.73413294749492], {icon:busStop}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: 5</p><p>Stop Name: Chekka </p> <p>Departure Time: +15 Minutes</p> <p>Distance to next stop: 10.9km</p> <p>Distance to destination: 75.9km');

  var stop3 = L.marker([34.25114098072794, 35.66755345379709], {icon:busStop}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: 4</p><p>Stop Name: Batroun </p> <p>Departure Time: +23 Minutes</p> <p>Distance to next stop: 17.9km</p> <p>Distance to destination: 65.0km');
  var stop3 = L.marker([34.104914612483036, 35.6534668431236], {icon:busStop}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: 3</p><p>Stop Name: Byblos </p> <p>Departure Time: +31 Minutes</p> <p>Distance to next stop: 11.2km</p> <p>Distance to destination: 53.8km');

  var stop4 = L.marker([34.016614906599116, 35.64064993179401], {icon:busStop}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: 2</p><p>Stop Name: Jounieh </p> <p>Departure Time: +40 Minutes</p> <p>Distance to next stop: 12.9km</p> <p>Distance to destination: 40.9km');

  var stop5 = L.marker([33.929912083504504, 35.58833952757743], {icon:busStop}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: 1</p><p>Stop Name: Dbayeh </p> <p>Departure Time: +51 Minutes</p> <p>Distance to next stop: 23.0km</p> <p>Distance to destination: 14km');

  var end = L.marker([33.87464821632467, 35.49644877447923], {icon:pointB}).addTo(map).bindPopup('<b><u>Tripoli-Beirut</u></b>  <p>Stop No.: End Point</p><p>Stop Name: Cola </p> <p>Approx. Arrival Time: +63 Minutes</p> <p>Distance to next stop: N/A</p> <p>Distance to destination: 0.0km');

      function hideMap(){
        document.getElementById('map').style.display="none";
      }

      function displayMap(){
        document.getElementById('map').style.display="block"
      }
</script>

