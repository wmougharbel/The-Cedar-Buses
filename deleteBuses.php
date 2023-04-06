<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "cedar_buses";

		//create connection
		$conn= new mysqli($servername, $username, $password, $db);

		$sql = "DELETE FROM buses WHERE id=$id";
		$conn->query($sql);


	}
	header("location:/The Cedar Buses PHP/busesTable.php");
	exit;
?>