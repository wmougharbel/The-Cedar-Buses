<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
	<title>Admin</title>
	<style type="text/css">
	.btn-outline-primary{
      background-color: black;
      color: white;
      border-color: black;
    }

    .btn-primary{
      background-color: green;
      outline: none;
      border-color: green;
    }

    .btn-primary:hover{
      background-color: #33cc00;
      border-color: #33cc00;
    }

    .btn-primary-blue{
      background-color: #0033cc;
      outline: none;
      border-color: #0033cc;
      color: white;
    }

    .btn-primary-blue:hover{
      background-color: #3366ff;
      border-color: #3366ff;
      color: white;
    }

    .btn-danger:hover{
      background-color: red;
      border-color: red;
    }
        .btn-outline-primary:hover{
      background-color: white;
      color: black;
      border-color: black;
      font-weight: bold;
      cursor: pointer;
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
        <li><a class="active" href="driversTable.php">Drivers</a></li>
        <li><a href="schedulesTable.php">Schedules</a></li>
        <li><a href="messagesTable.php">Messages</a></li>
        <li><a href="admin.php">Sign Out</a>
        
      </ul>
    </nav> 

    <div class="top">
    	<h2>Drivers</h2>
    	<a class="btn btn-primary" href="newDriver.php" role="button">New Driver</a><br>
    	<table class="table">
    		<thead>
    			<th>Name</th>
    			<th>Driver ID</th>
    			<th>Phone Number</th>
    			<th>Email</th>
    			<th>Password</th>
    			<th>Action</th>
    		</thead>
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

    				$sql="SELECT * FROM drivers ORDER BY (driver_id) ASC";
    				$result= $conn->query($sql);

    				if(!$result){
    					die("Invalid Query: ".$conn->error);
    				}
    				while($row= $result->fetch_assoc()){
    					echo "
    						<tr>
    							<td>$row[name]</td>
    							<td>$row[driver_id]</td>
    							<td>$row[phone]</td>
    							<td>$row[email]</td>
    							<td>$row[pwd]</td>
    							<td>
                    <a class='btn btn-primary-blue btn-sm' href='mailto:$row[email]'>Contact</a>
    								<a class='btn btn-primary btn-sm' href='/The Cedar Buses PHP/editDrivers.php?id=$row[id]'>Update</a>
                		<a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteDrivers.php?id=$row[id]'>Hide</a>
    							</td>
    						</tr>
						";
    				}
    			?>
    		</tbody>
    	</table><br><br>
      <h2>Drivers Messages</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Driver ID</th>
            <th>Email</th>
            <th>Date</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
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

            $sql="SELECT * FROM driver_contact ORDER BY (date_sent) DESC";
            $result=$conn->query($sql);

            if(!$result){
              die("Invalid query: ".$conn->error);
            }
            while($row = $result->fetch_assoc()){
              echo "
                <tr>
                  <td>$row[driver_id]</td>
                  <td>$row[email]</td>
                  <td>$row[date_sent]</td>
                  <td>$row[message]</td>
                  <td>
                    <a class='btn btn-primary btn-sm' href='mailto:$row[email]'>Reply</a>
                    <a class='btn btn-danger btn-sm' href='/The Cedar Buses PHP/deleteDriverMessage.php?id=$row[id]'>Hide</a>
                  </td>
                <tr>
              ";
            }
          ?>
        </tbody>
        </thead>
      </table>
      <br>
    </div>
</body>


</html>