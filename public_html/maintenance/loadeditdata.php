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
	$stmt = $conn->prepare("SELECT deskripsi, jumlah_bayar FROM maintenance WHERE id_maintenance = ?");
	$stmt->bind_param("i", $maintenance_id);

	// set parameters and execute

	// define variables and set to empty values
	$maintenance_id = $deskripsi = $jumlah_bayar = "";

	$maintenance_id = $_GET["id"];

	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($deskripsi, $jumlah_bayar);
	$stmt->fetch();
	$stmt->close();

	echo "<div class=\"form-group\">";
    echo "<label>Deskripsi</label>";
    echo "<textarea class=\"form-control\" rows=\"5\" id=\"edit_deskripsi\" placeholder=\"Masukkan deskripsi\" required name=\"deskripsi\">" . $deskripsi . "</textarea>";
    echo "</div>";
    echo "<div class=\"form-group\">";
    echo "<label for=\"edit_bayar\">Jumlah bayar</label>";
    echo "<input type=\"text\" class=\"form-control\" id=\"edit_bayar\" value=\"" . $jumlah_bayar . "\" required name=\"harga\">";
    echo "</div>";

	$conn->close();
?>