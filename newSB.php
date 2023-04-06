<?php 
	
	$servername= "localhost";
	$username= "root";
	$password= "";
	$db= "cedar_buses";

	//create connection
	$conn = new mysqli($servername, $username, $password, $db);



	$trip= "";
	$bus= "";
	$driver = "";
	$time= "";
	$errorMessage= "";
	$successMessage= "";

	if( $_SERVER['REQUEST_METHOD'] == 'POST'){
		$trip = $_POST['trip'];
		$bus = $_POST['bus'];
		$driver = $_POST['driver'];
		$time = $_POST['time'];

		do{
			if(empty($trip) || empty($bus) || empty($driver) || empty($time)){
				$errorMessage = "All fields are required";
				break;
			}

			//insert a new client into database
			$sql= "INSERT INTO tyr_beirut (trip, bus, driver, trip_time)" . "VALUES ('$trip', '$bus', '$driver', '$time')";

			//execute query
			$result= $conn->query($sql);

			if(!$result){
				$errorMessage = "Invalid query: ".$conn->error;
				break;
			}

			$trip= "";
			$bus= "";
			$driver= "";
			$time= "";
			$successMessage= "Schedule added successfully";

			header("location: /The Cedar Buses PHP/schedulesTable.php");
			exit;


		} while(false);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
	.btn-outline-primary{
      background-color: black;
      color: white;
      border-color: black;
    }

    .btn-outline-primary:hover{
    	background-color: white;
    	color: black;
    	border-color: black;
    	font-weight: bold;
    	cursor: pointer;
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
	<div class="container my-5">
		<h2>Tyr-Beirut New Schedule</h2>

		<?php 
			if(!empty($errorMessage)){
				echo "
					<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					<strong>$errorMessage</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>
				";
			}
		?>

		<form method="POST">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Trip</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="trip" value="<?php echo $trip; ?>">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Bus Number</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="bus" value="<?php echo $bus; ?>">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Driver </label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="driver" value="<?php echo $driver; ?>">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Time</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="time" value="<?php echo $time; ?>">
				</div>
			</div>

			

			<div class="row mb-3">
				<div class="offset-sm-3 col-sm-3 d-grid">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="col-sm-3 d-grid">
					<a class="btn btn-outline-primary" href="/The Cedar Buses PHP/schedulesTable.php" role="button">Cancel</a>
				</div>
			</div>
		</form>
		<?php 
				if(!empty($successMessage)){
					echo "
						<div class='row mb-3'>
							<div class='offset-sm-3 col-sm-6'>
								<div class='alert alert-success alert-dismissible fade show' role='alert'>
									<strong>$successMessage</strong>
									<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
								</div>
							</div>
						</div>
					";
				}
			?>
	</div>
</body>
</html>