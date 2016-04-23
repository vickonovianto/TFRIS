<?php
	session_start();

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

	$stmt = $conn->prepare("SELECT id_user, id_akses, username FROM user WHERE username = ? AND password = ?");
	$stmt->bind_param("ss", $username, $password);

	// define variables and set to empty values
	$username = $password = $id_user = $id_akses = $username - "";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $username = test_input($_POST["username"]);
	  $password = test_input($_POST["password"]);
	}	

	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($id_user, $id_akses, $username);
	$stmt->fetch();
	$stmt->close();

	if (isset($id_user)) {
		unset($_SESSION['error']);
		$_SESSION['id_user'] = $id_user;
		$_SESSION['username'] = $username;

		$stmt = $conn->prepare("SELECT nama, kode_pemesanan, kode_pembayaran, kode_member, kode_maintenance FROM akses WHERE id_akses = ?");
		$stmt->bind_param("i", $id_akses);

		// define variables and set to empty values
		$kode_pemesanan = $kode_pembayaran = $kode_member = $kode_maintenance = $nama_akses = "";

		$stmt->execute();

		$stmt->store_result();
		$stmt->bind_result($nama_akses, $kode_pemesanan, $kode_pembayaran, $kode_member, $kode_maintenance);
		$stmt->fetch();
		$stmt->close();

		if(isset($nama_akses) && isset($kode_pemesanan) && isset($kode_pembayaran) && isset($kode_member) && isset($kode_maintenance)) {
			$_SESSION['nama_akses'] = $nama_akses;
			$_SESSION['kode_pemesanan'] = $kode_pemesanan;
			$_SESSION['kode_pembayaran'] = $kode_pembayaran;
			$_SESSION['kode_member'] = $kode_member;
			$_SESSION['kode_maintenance'] = $kode_maintenance;
		}
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.html';
		header("Location: http://$host$uri/../$extra");
		exit;
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.php';
		$_SESSION['error'] = "Your username or password was incorrect";
		header("Location: http://$host$uri/$extra");
		exit;
	}

	$conn->close();

	// $host  = $_SERVER['HTTP_HOST'];
	// $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	// $extra = 'index.php';
	// header("Location: http://$host$uri/$extra");
	// exit;
?>