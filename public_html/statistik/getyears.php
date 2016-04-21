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

	$i = 1;
	while ($i <= 12) {
		$stmt = $conn->prepare("SELECT COUNT DISTINCT YEAR(waktu_bayar) FROM maintenance INNER JOIN pembayaran ON WHERE YEAR(waktu_bayar) = ? AND MONTH(waktu_bayar) = ?");
		$stmt->bind_param("ii", $tahun, $i);
		$stmt->execute();

		$stmt->store_result();
		$stmt->bind_result($pengeluaran);
		$stmt->fetch();
		$array[$i-1] = $pengeluaran * 1;
		$i++;

		$stmt->close();
	}
	echo json_encode($array);

	$conn->close();
?>