<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$servername="localhost";
		$username="root";
		$password="";
		$db="cedar_buses";

		$conn= new mysqli($servername, $username, $password, $db);

		$sql= "DELETE FROM driver_contact WHERE id=$id";
		$conn->query($sql);
	}
	header("location:/The Cedar Buses PHP/driversTable.php");
	exit;
?>