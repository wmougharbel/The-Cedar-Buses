<?php ?>
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
        <li><a class="active" href="busesTable.php">Buses</a></li>
        <li><a href="driversTable.php">Drivers</a></li>
        <li><a href="schedulesTable.php">Schedules</a></li>
        <li><a href="messagesTable.php">Messages</a></li>
        <li><a href="admin.php">Sign Out</a>
        
      </ul>
    </nav> 
    <div class="top">
      <div class="container my-5">
        <h2>Buses List</h2>
        <a class="btn btn-primary" href="newBus.php" role="button">New Bus</a><br>
        <table class="table">
          <thead>
            <tr>
              <th>Bus Number</th>
              <th>Driver Name</th>
              <th>Route</th>
              <th>Link</th>
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

              $sql= "SELECT * FROM buses ORDER BY (number) ASC";
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
                    <td>
                      <a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editBuses.php?id=$row[id]'>Update</a>
                      <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteBuses.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

</body>
</html>

