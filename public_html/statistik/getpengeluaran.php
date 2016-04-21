<?php
	//$array = array(28000, 48000, 40000, 19000, 86000, 27000, 90000, 35000, 69000, 50000, 91000, 26000);
	$array = array();
	// $i = 0;
	// while ($i < 12) {
	// 	// $is = $i . "";
	// 	$array[$i] = $i;
	// 	$i++;
	// }
	// $array[0] = $_GET["tahun"];
	// echo json_encode($array);
	//echo $_GET["tahun"];

	$tahun = $_GET["tahun"] * 1;

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
		$stmt = $conn->prepare("SELECT SUM(jumlah_bayar) FROM maintenance WHERE YEAR(waktu_bayar) = ? AND MONTH(waktu_bayar) = ?");
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