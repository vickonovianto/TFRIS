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
	$stmt = $conn->prepare("INSERT INTO member (id_lapangan, nama, no_hp, hari_main, jam_main, durasi_main, tanggal_mulai) VALUES (?, ?, ?, ?, ?, ?, ?)");
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

	switch($hari) {
		case "Senin":
			$hari = 1;
			break;
		case "Selasa":
			$hari = 2;
			break;
		case "Rabu":
			$hari = 3;
			break;
		case "Kamis":
			$hari = 4;
			break;
		case "Jumat":
			$hari = 5;
			break;
		case "Sabtu":
			$hari = 6;
			break;
		case "Minggu":
			$hari = 7;
			break;
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$stmt->execute();

	$stmt->close();

	$id_member = "";
	$id_pemesanan = "";

	$stmt = $conn->prepare("SELECT id_member FROM member WHERE id_lapangan = ? AND nama = ? AND no_hp = ? AND hari_main = ? AND jam_main = ? AND durasi_main = ? AND tanggal_mulai = ?");
	$stmt->bind_param("issisis", $lapangan, $nama, $nomorhp, $hari, $waktupemakaian, $durasi, $waktupengaktifan);
	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($id_member);
	$stmt->fetch();
	$stmt->close();

	$i = 0;
	while ($i < 4) {
		$stmt = $conn->prepare("INSERT INTO pemesanan (id_member, id_lapangan, nama, tanggal_main, jam_main, durasi_main, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iisssii", $id_member, $lapangan, $nama, $waktupengaktifan, $waktupemakaian, $durasi, $status);

		$status = 1;
		if ($i > 0) {
			$date=date_create($waktupengaktifan);
			date_add($date,date_interval_create_from_date_string("7 days"));
			$waktupengaktifan = date_format($date, "Y-m-d");
		}
		
		$stmt->execute();
		$stmt->close();

		if ($i == 0) {
			$stmt = $conn->prepare("SELECT id_pemesanan FROM pemesanan WHERE id_member = ? AND id_lapangan = ? AND nama = ? AND tanggal_main = ? AND jam_main = ? AND durasi_main = ? AND status = ?");
			$stmt->bind_param("iisssii", $id_member, $lapangan, $nama, $waktupengaktifan, $waktupemakaian, $durasi, $status);
			$stmt->execute();

			$stmt->store_result();
			$stmt->bind_result($id_pemesanan);
			$stmt->fetch();
			$stmt->close();
		}

		$i++;
	}

	$stmt = $conn->prepare("INSERT INTO pembayaran (id_pemesanan, jumlah_bayar) VALUES (?, ?)");
	$stmt->bind_param("ii", $id_pemesanan, $harga);
	$harga = 75000 * $durasi * 4;
	$stmt->execute();
	$stmt->close();

	$conn->close();

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
	exit;
?>