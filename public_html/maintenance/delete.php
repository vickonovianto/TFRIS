<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tfris";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// prepare and bind
	$stmt = $conn->prepare("DELETE FROM maintenance WHERE id_maintenance = ?");
	$stmt->bind_param("i", $maintenance_id);

	// set parameters and execute

	// define variables and set to empty values
	$maintenance_id = "";

	$maintenance_id = $_GET["id"];

	$stmt->execute();
	$stmt->close();

	$conn->close();
?>