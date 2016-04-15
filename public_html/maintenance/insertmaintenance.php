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
	$stmt = $conn->prepare("INSERT INTO maintenance (deskripsi, jumlah_bayar) VALUES (?, ?)");
	$stmt->bind_param("si", $deskripsi, $harga);

	// set parameters and execute

	// define variables and set to empty values
	$harga = $dekskipsi = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $deskripsi = test_input($_POST["deskripsi"]);
	  $harga = test_input($_POST["harga"]);
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