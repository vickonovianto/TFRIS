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
	$stmt = $conn->prepare("INSERT INTO pembayaran (id_lapangan, nama, no_hp, hari_main, jam_main, durasi_main, tanggal_mulai) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("issisis", $lapangan, $nama, $nomorhp, $hari, $waktupemakaian, $durasi, $waktupengaktifan);

	// set parameters and execute

	// define variables and set to empty values
	$nama = $nomorhp = $hari = $lapangan = $waktupemakaian = $durasi = $waktupengaktifan = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $nama = test_input($_POST["nama"]);
	  $nomorhp = test_input($_POST["nomorhp"]);
	  $hari = test_input($_POST["hari"]);
	  $durasi = test_input($_POST["durasi"]);
	  $lapangan = test_input($_POST["lapangan"]);
	  $waktupemakaian = test_input($_POST["waktupemakaian"]);
	  $waktupengaktifan = test_input($_POST["waktupengaktifan"]);
	}	

	

	if ($lapangan == "Lapangan A") {
		$lapangan = 1;
	} else if ($lapangan == "Lapangan B"){
		$lapangan = 2;
	}

	if ($hari == "Senin") {
		$hari = 1;
	} else if ($hari == "Selasa"){
		$hari = 2;
	} else if ($hari == "Rabu"){
		$hari = 3;
	} else if ($hari == "Kamis"){
		$hari = 4;
	} else if ($hari == "Jumat"){
		$hari = 5;
	} else if ($hari == "Sabtu"){
		$hari = 6;
	} else if ($hari == "Minggu"){
		$hari = 7;
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