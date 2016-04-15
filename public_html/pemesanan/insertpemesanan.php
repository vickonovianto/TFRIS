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
	$stmt = $conn->prepare("INSERT INTO pemesanan (id_member, id_lapangan, nama, tanggal_main, jam_main, durasi_main, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("iisssii", $idmember, $lapangan, $nama, $usagedate, $usagetime, $durasi, $status);

	// set parameters and execute

	// define variables and set to empty values
	$idmember = 0;
	$lapangan = $nama = $usagetime = $usagetime = $usagedatetime = $durasi = $status = $harga =  "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $nama = test_input($_POST["nama"]);
	  $lapangan = test_input($_POST["lapangan"]);
	  $usagedatetime = test_input($_POST["usagetime"]);
	  $durasi = test_input($_POST["durasi"]);
	  if ($_POST["harga"] != 0) {
	  	$harga = test_input($_POST["harga"]);
	  	$status = 1;
	  } else {
	  	$harga = 0;
	  	$status = 0;
	  }
	}	

	$pieces = explode(" ", $usagedatetime);
	$usagedate = $pieces[0];
	$usagetime = $pieces[1];

	if ($lapangan == "Lapangan A") {
		$lapangan = 1;
	} else if ($lapangan == "Lapangan B"){
		$lapangan = 2;
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