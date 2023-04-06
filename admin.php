<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Sign In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
        <li><div class="dropdown">
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
    		<legend><h2>Admin Sign In</h2></legend>
    		<form method="POST">
    			<label for="username"><b>Username:</b></label><br>
    			<input type="text" name="username" required><br>
    			<label for="password"><b>Password:</b></label><br>
    			<input type="password" name="password" required><br><br>
    			<input type="submit" name="submit" value="Sign In"><br><br>
    		</form>
    	</fieldset>
    
    <?php 
    	
    	if ($_POST){
    		$host="localhost";
    		$user="root";
    		$pass="";
    		$db="cedar_buses";

    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		$conn = mysqli_connect($host, $user, $pass, "cedar_buses");
$query="SELECT * FROM admins WHERE username = '$username' and pwd = '$password'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)==1){
			session_start();
			$_SESSION['cedar_buses'] = 'true';
			header('location:messagesTable.php');
			exit;
		}
		else{
			echo "<br>";
			echo '<div class="error">wrong username or password!</div>';
		}
			
	}
    	
    ?>
    </div>
</body>
</html>