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
	$idmember = $totalharga = 0;
	$lapangan = $nama = $usagetime = $usagetime = $usagedatetime = $durasi = $status = $harga = $num_pembayaran = $id_pemesanan = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $nama = test_input($_POST["nama"]);
	  $lapangan = test_input($_POST["lapangan"]);
	  $usagedatetime = test_input($_POST["usagetime"]);
	  $durasi = test_input($_POST["durasi"]);
	  $num_pembayaran = test_input($_POST["num_pembayaran"]);
	  $totalharga = test_input($_POST["totalharga"]);
	  if ($num_pembayaran != 0) {
	  	if ($totalharga == 100000 * $durasi) {
	  		$status = 1;
	  	}
	  	else {
	  		$status = 0;
	  	}
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

	$stmt = $conn->prepare("SELECT id_pemesanan FROM pemesanan WHERE id_member = ? AND id_lapangan = ? AND nama = ? AND tanggal_main = ? AND jam_main = ? AND durasi_main = ? AND status = ?");
	$stmt->bind_param("iisssii", $idmember, $lapangan, $nama, $usagedate, $usagetime, $durasi, $status);
	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($id_pemesanan);
	$stmt->fetch();
	$stmt->close();

	$i = 1;

	while ($i <= $num_pembayaran) {
		$stmt = $conn->prepare("INSERT INTO pembayaran (id_pemesanan, jumlah_bayar, waktu_bayar) VALUES (?, ?, ?)");
		$stmt->bind_param("iis", $id_pemesanan, $harga, $waktu_bayar);

		$harga = test_input($_POST["harga_" . $i]);
		$waktu_bayar = test_input($_POST["timestamp_" . $i]);

		$stmt->execute();
		$stmt->close();

		$i++;
	}

	// $stmt->close();
	$conn->close();

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
	exit;
?>