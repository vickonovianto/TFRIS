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

	$stmt = $conn->prepare("(SELECT DISTINCT YEAR(waktu_bayar) AS year FROM maintenance ORDER BY YEAR(waktu_bayar) DESC) UNION (SELECT DISTINCT YEAR(waktu_bayar) AS year FROM pembayaran ORDER BY YEAR(waktu_bayar) DESC) UNION SELECT YEAR(NOW())");
	$stmt->execute();

	$result = $stmt->get_result();

	while ($row = mysqli_fetch_array($result)) {
		echo "<option>" . $row['year'] . "</option>";
	}

	$stmt->close();

	$conn->close();
?>