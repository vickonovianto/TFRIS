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
	$stmt = $conn->prepare("UPDATE maintenance SET deskripsi = ?, jumlah_bayar = ? WHERE id_maintenance = ?");
	$stmt->bind_param("sii", $deskripsi, $jumlah_bayar, $maintenance_id);

	// set parameters and execute

	// define variables and set to empty values
	$maintenance_id = $deskripsi = $jumlah_bayar = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	  $maintenance_id = test_input($_POST["id"]);
	  $deskripsi = test_input($_POST["deskripsi"]);
	  $jumlah_bayar = test_input($_POST["jumlah_bayar"]);
	}	

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	$stmt->execute();
	$stmt->close();

	$conn->close();
?>