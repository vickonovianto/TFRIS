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
	$stmt = $conn->prepare("DELETE FROM pemesanan WHERE id_pemesanan = ?");
	$stmt->bind_param("i", $id_pemesanan);

	// set parameters and execute

	// define variables and set to empty values
	$id_pemesanan = "";

	$id_pemesanan = $_GET["id"];

	$stmt->execute();
	$stmt->close();

	$stmt = $conn->prepare("DELETE FROM pembayaran WHERE id_pemesanan = ?");
	$stmt->bind_param("i", $id_pemesanan);

	$stmt->execute();
	$stmt->close();

	$conn->close();
?>