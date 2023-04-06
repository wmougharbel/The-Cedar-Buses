<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
    .btn-primary{
      background-color: green;
      outline: none;
      border-color: green;
    }

    .btn-primary:hover{
      background-color: #33cc00;
      border-color: #33cc00;
    }

    .btn-danger:hover{
      background-color: red;
      border-color: red;
    }

    .newRoute{
      background-color: black;
      height: 40px;
      width: 150px;
      color: white;
    }

    .newRoute:hover{
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
        <li><a href="busesTable.php">Buses</a></li>
        <li><a href="driversTable.php">Drivers</a></li>
        <li><a class="active" href="schedulesTable.php">Schedules</a></li>
        <li><a href="messagesTable.php">Messages</a></li>
        <li><a href="admin.php">Sign Out</a>
        
      </ul>
    </nav> 
    <div class="top">
      <div class="container my-5">
        <h2>Schedules</h2><br>
        <h4>Beirut-Aley <a class="btn btn-primary" href="newBA.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM beirut_aley ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editBA.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteBA.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>

        <h4>Aley-Beirut <a class="btn btn-primary" href="newAB.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM aley_beirut ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editAB.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteAB.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>

        <h4>Beirut-Tripoli <a class="btn btn-primary" href="newBT.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM beirut_tripoli ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editBT.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteBT.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>

        <h4>Tripoli-Beirut <a class="btn btn-primary" href="newTB.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM tripoli_beirut ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editTB.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteTB.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>

        <h4>Beirut-Tyr <a class="btn btn-primary" href="newBS.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM beirut_tyr ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editBS.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteBS.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>

        <h4>Tyr-Beirut <a class="btn btn-primary" href="newSB.php" role="button">New Schedule</a><br></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Trip</th>
              <th>Bus</th>
              <th>Driver</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $db="cedar_buses";

              $conn= new mysqli($servername, $username, $password, $db);

              if($conn->connect_error){
                die("Connection Failed: ".$conn->connect_error);
              }

              $sql= "SELECT * FROM tyr_beirut ORDER BY (trip_time) ASC";
              $result= $conn->query($sql);

              if(!$result){
                die("Invalid query: ".$conn->error);
              }

              while($row= $result->fetch_assoc()){
                echo "
                  <tr>
                    <td>$row[trip]</td>
                    <td>$row[bus]</td>
                    <td>$row[driver]</td>
                    <td>$row[trip_time]</td>
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editSB.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteSB.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table><br>
      </div>
    </div>

</body>
</html>

