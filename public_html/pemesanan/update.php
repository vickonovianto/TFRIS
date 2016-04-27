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

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$id_pemesanan = $num_pembayaran_edit = $totalharga = $durasi = $status = "";
	$id_pemesanan = test_input($_POST["id_pemesanan"]);
	$num_pembayaran_edit = test_input($_POST["num_pembayaran_edit"]);
	$totalharga = test_input($_POST["totalharga"]);
	$durasi = test_input($_POST["durasi"]);

	$i = 1;

	if ($num_pembayaran_edit != 0) {
	  	if ($totalharga == 100000 * $durasi) {
	  		$status = 1;

	  		$stmt = $conn->prepare("UPDATE pemesanan SET status = ? WHERE id_pemesanan = ?");
			$stmt->bind_param("ii", $status, $id_pemesanan);
			$stmt->execute();
			$stmt->close();

	  	}
	  	else {
	  		$status = 0;
	  	}

	  	while ($i <= $num_pembayaran_edit) {
			$stmt = $conn->prepare("INSERT INTO pembayaran (id_pemesanan, jumlah_bayar, waktu_bayar) VALUES (?, ?, ?)");
			$stmt->bind_param("iis", $id_pemesanan, $harga, $waktu_bayar);

			$harga = test_input($_POST["harga_" . $i]);
			$waktu_bayar = test_input($_POST["timestamp_" . $i]);

			$stmt->execute();
			$stmt->close();

			$i++;
		}

	}

	// $stmt->close();
	$conn->close();

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
	exit;
?>