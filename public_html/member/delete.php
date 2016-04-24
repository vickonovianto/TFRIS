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
	$stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
	$stmt->bind_param("i", $delete_id);

	// set parameters and execute

	// define variables and set to empty values
	$delete_id = "";

	$delete_id = $_GET["id"];

	$stmt->execute();
	$stmt->close();

	$conn->close();
?>