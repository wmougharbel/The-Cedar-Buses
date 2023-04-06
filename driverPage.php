<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Driver Sign In</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .top{
      height: 900px;
    }

    .map{
      height: 40%;
      margin-top: 275px;
    }

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

    .shiftTable{
      width: 40%;
      float: left;
      text-align: center;
      margin-left: 14%;
      border: solid 1px;
      margin-top: 50px;
    }

    .shiftTd{
      height: 50px;
    }

    #incomplete1{
      color: red;
      background: none;
      text-decoration: none;
      border-color: black;
    }

    #complete1{
      color: green;
      background: none;
      text-decoration: none;
    }

    #incomplete2{
      color: red;
      background: none;
      text-decoration: none;
      border-color: black;
    }

    #complete2{
      color: green;
      background: none;
      text-decoration: none;
    }

    #incomplete3{
      color: red;
      background: none;
      text-decoration: none;
      border-color: black;
    }

    #complete3{
      color: green;
      background: none;
      text-decoration: none;
      border-color: black;
    }

    #incomplete4{
      color: red;
      background: none;
      text-decoration: none;
      border-color: black;
    }

    #complete4{
      color: green;
      background: none;
      text-decoration: none;
    }

    #incomplete1:hover, #incomplete2:hover, #incomplete3:hover, #incomplete4:hover{
      cursor: pointer;
      text-decoration: underline;
      font-weight: bolder;
    }

    #div1{
      width: 20%;
      float: right;
      margin-right: 14%;
      margin-top: 20px;
    }

    #div2, #div3, #div4, #div5{
      width: 20%;
      float: right;
      margin-right: 12%;
      display: none;
      margin-top: 20px;
    }

    @media (max-width: 600px){
       #div1, #div2, #div3, #div4, #div5{
        width: 32%;
       }
        #map{
        position: relative;
    }
    }



  </style>
	</head>
	<body >
		<nav>
      <div class="logo"><img class="busmap" src="bus.png" ></div><div class="logo">Track<font color="#33cc00
"> Cedar</font> Buses</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn" >
        <i class="fas fa-bars" onclick="hideMap()" ></i>
      </label>
      <ul>
        <!--<li><a href="index.html">Home</a></li>
        <li><a  href="buses.php">Buses</a></li>
        <li><div class="dropdown">
          <button class="dropbtn" onclick="schedules()">Schedule</button>
          <div class="dropdown-content">
            <a href="beirut-aley.php">Beirut - Aley</a>
            <a href="beirut-tyr.php">Beirut - Tyr</a>
            <a href="beirut-tripoli.php">Beirut - Tripoli</a>
          </div>
        </div></li>-->
        <li><a class="active" href="driverPage.php">Home</a></li>
        <li><a href="driverContact.html">Contact</a></li>
        <li><a href="viewMessages.php">Messages</a></li>
        <li><a href="signin.php">Sign Out</a></li>
      </ul>
    </nav>
    <div class="top" onmouseover="displayMap()" >
      <table class="shiftTable">
        <tr>
          <th>Shift</th>
          <th>Status</th>
        </tr>
        <tr>
          <td class="shiftTd">1</td>
          <td class="shiftTd" id="incomplete1" onclick="complete1()">Incomplete</td>
        </tr>
        <tr>
          <td class="shiftTd">2</td>
          <td class="shiftTd" id="incomplete2">Incomplete</td>
        </tr>
        <tr>
          <td class="shiftTd">3</td>
          <td class="shiftTd" id="incomplete3">Incomplete</td>
        </tr>
        <tr>
          <td class="shiftTd">4</td>
          <td class="shiftTd" id="incomplete4">Incomplete</td>
        </tr>
      </table>
      <div id="div1">
        <canvas id="chart1"></canvas>
      </div>
      <div id="div2">
        <canvas id="chart2"></canvas>
      </div>
      <div id="div3">
        <canvas id="chart3"></canvas>
      </div>
      <div id="div4">
        <canvas id="chart4"></canvas>
      </div>
      <div id="div5">
        <canvas id="chart5"></canvas>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script type="text/javascript">
        var ctx1 = document.getElementById('chart1').getContext('2d');
var chart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Incomplete', 'Complete'],
        datasets: [{
            label: '# of Votes',
            data: [100, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderWidth: 1
        }]
    },
   /* options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }*/
});

var ctx2 = document.getElementById('chart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Incomplete', 'Complete'],
        datasets: [{
            label: '# of Votes',
            data: [75, 25],
            backgroundColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderWidth: 1
        }]
    },
   /* options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }*/
});

var ctx3 = document.getElementById('chart3').getContext('2d');
var chart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: ['Incomplete', 'Complete'],
        datasets: [{
            label: '# of Votes',
            data: [50, 50],
            backgroundColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderWidth: 1
        }]
    },
   /* options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }*/
});

var ctx4 = document.getElementById('chart4').getContext('2d');
var chart4 = new Chart(ctx4, {
    type: 'doughnut',
    data: {
        labels: ['Incomplete', 'Complete'],
        datasets: [{
            label: '# of Votes',
            data: [25, 75],
            backgroundColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderWidth: 1
        }]
    },
   /* options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }*/
});

var ctx5 = document.getElementById('chart5').getContext('2d');
var chart5 = new Chart(ctx5, {
    type: 'doughnut',
    data: {
        labels: ['Incomplete', 'Complete'],
        datasets: [{
            label: '# of Votes',
            data: [0, 100],
            backgroundColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1.0',
                'rgba(51, 204, 51,1.0)'
            ],
            borderWidth: 1
        }]
    },
   /* options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }*/
});

      function complete1(){
        document.getElementById('div1').style.display="none";
        document.getElementById('div2').style.display="block";
        document.getElementById('incomplete2').innerHTML='<a id="incomplete2" onclick="complete2()">Incomplete</a>'; 
        document.getElementById('incomplete1').innerHTML='<a id="complete1" href="#">Complete</a>';
        window.alert("1st Shift complete");
      }

      function complete2(){
        document.getElementById('div2').style.display="none";
        document.getElementById('div3').style.display="block";
        document.getElementById('incomplete3').innerHTML='<a id="incomplete3" onclick="complete3()">Incomplete</a>';
        document.getElementById('incomplete2').innerHTML='<a id="complete2" href="#">Complete</a>';
        window.alert("2nd Shift complete");
      }

      function complete3(){
        document.getElementById('div3').style.display="none";
        document.getElementById('div4').style.display="block";
        document.getElementById('incomplete4').innerHTML='<a id="incomplete4" onclick="complete4()">Incomplete</a>'; 
        document.getElementById('incomplete3').innerHTML='<a id="complete3" href="#">Complete</a>';
        window.alert("3rd Shift complete");
      }

      function complete4(){
        document.getElementById('div4').style.display="none";
        document.getElementById('div5').style.display="block";
        document.getElementById('incomplete4').innerHTML='<a id="complete4" href="#">Complete</a>';
        window.alert("All shifts complete");
      }

      function hideMap(){
        document.getElementById('map').style.display="none";
      }

      function displayMap(){
        document.getElementById('map').style.display="block"
      }



      </script>
      <br><br><br><br>
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
          <li><a class="underlineLink" href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
</body>
</html>

<script src="socialmedia.js"></script>
</body>
</html>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

<script type="text/javascript">
  var map = L.map('map').setView([33.807812412163635, 35.5988124190964], 8);
  L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=5E7FRMYvo1pd67qknAwh', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    //maxZoom:14,
    minZoom:10
  }).addTo(map);


  L.control.locate().addTo(map);
  </script>