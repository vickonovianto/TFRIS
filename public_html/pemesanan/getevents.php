<?php
	$events = array();
	$con=mysqli_connect("localhost","root","","tfris");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$status = $_GET["status"] * 1;

	if ($status == 2) {
		$stmt = $con->prepare("SELECT * FROM pemesanan ORDER BY tanggal_main, jam_main, id_lapangan");
	} else if ($status == 1) {
		$stmt = $con->prepare("SELECT * FROM pemesanan WHERE status=1 ORDER BY tanggal_main, jam_main, id_lapangan");
	} else if ($status == 0) {
		$stmt = $con->prepare("SELECT * FROM pemesanan WHERE status=0 ORDER BY tanggal_main, jam_main, id_lapangan");
	}

	$stmt->execute();
	$result = $stmt->get_result();
	
	$i = 0;
	while ($row = mysqli_fetch_array($result)) {
		$a = array();
		$a['id'] = "" . $i;
		$i++;
		$a['title'] = $row['nama'];
		$date = date_create($row['tanggal_main'] . " " . $row['jam_main']);
		$a['start'] = date_format($date, "c");
		//$a['start'] = $date;
		date_add($date,date_interval_create_from_date_string($row['durasi_main'] . " hours"));
		$a['end'] = date_format($date, "c");
		//$a['end'] = $date;
		if (($row['id_lapangan'] == 1) && ($row['id_member'] == 0)) {
			$a['backgroundColor'] = "#0073B7";
			$a['borderColor'] = "#0073B7";	
		} else if (($row['id_lapangan'] == 1) && ($row['id_member'] != 0)) {
			$a['backgroundColor'] = "#00C0EF";
			$a['borderColor'] = "#00C0EF";	
		} else if (($row['id_lapangan'] == 2) && ($row['id_member'] == 0)) {
			$a['backgroundColor'] = "#C30300";
			$a['borderColor'] = "#C30300";	
		} else if (($row['id_lapangan'] == 2) && ($row['id_member'] != 0)) {
			$a['backgroundColor'] = "#F012BE";
			$a['borderColor'] = "#F012BE";	
		}
		array_push($events, $a);
	}
	echo json_encode($events);

	$stmt->close();
	mysqli_close($con);
?>