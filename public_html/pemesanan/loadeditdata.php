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
	$stmt = $conn->prepare("SELECT id_lapangan, nama, tanggal_main, jam_main, durasi_main FROM pemesanan WHERE id_pemesanan = ?");
	$stmt->bind_param("i", $id_pemesanan);

	// set parameters and execute

	// define variables and set to empty values
	$id_pemesanan = $id_lapangan = $lapangan = $nama = $tanggal_main = $jam_main = $durasi_main = "";

	$id_pemesanan = $_GET["id"];
	$member = $_GET["member"];

	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($id_lapangan, $nama, $tanggal_main, $jam_main, $durasi_main);
	$stmt->fetch();
	$stmt->close();

	if ($id_lapangan == 1) {
		$lapangan = "Lapangan A";
	} else if ($id_lapangan == 2){
		$lapangan = "Lapangan B";
	}

	$stmt = $conn->prepare("SELECT jumlah_bayar, waktu_bayar FROM pembayaran WHERE id_pemesanan = ?");
	$stmt->bind_param("i", $id_pemesanan);

	$jumlah_bayar = $waktu_bayar = "";
	$totalharga = 0;

	$stmt->execute();

	$stmt->store_result();
	$stmt->bind_result($jumlah_bayar, $waktu_bayar);
	$numrows = $stmt->num_rows;
	
	echo "<div class=\"form-group\">";
	    echo "<label for=\"tambahPemesananInputNama\">Nama</label>";
	    echo "<input type=\"text\" class=\"form-control\" id=\"tambahPemesananInputNama\" placeholder=\"Masukkan nama\" name=\"nama\" required disabled value=\"" . $nama . "\">";
	  echo "</div>";
	  echo "<div class=\"form-group\">";
	    echo "<label>Lapangan</label>";
	    echo "<select class=\"form-control\" required name=\"lapangan\" disabled>";
	      echo "<option>" . $lapangan . "</option>";
	    echo "</select>";
	  echo "</div>";
	  echo "<div class=\"form-group\">";
	    echo "<label>Waktu Pemakaian</label>";
	    echo "<div class=\"input-group\">";
	      echo "<div class=\"input-group-addon\">";
	        echo "<i class=\"fa fa-clock-o\"></i>";
	      echo "</div>";
	      echo "<input type=\"text\" class=\"form-control pull-left\" id=\"usagetime\" required name=\"usagetime\" disabled value=\"" . $tanggal_main . " " . $jam_main . "\">";
	    echo "</div><!-- /.input group -->";
	  echo "</div><!-- /.form group -->";
	  echo "<div class=\"form-group\">";
	    echo "<label for=\"tambahPemesananInputDurasi\">Durasi</label>";
	    echo "<input type=\"text\" class=\"form-control\" id=\"tambahPemesananInputDurasi\" value=\"" . $durasi_main . "\" required name=\"tambahPemesananInputDurasi\" disabled>";
	  echo "</div>";
	  echo "<h4 class=\"modal-title custom_align\" id=\"Heading\">Edit Pembayaran</h4>"; echo "<br>";
	  echo "<div class=\"form-group\">";
    	echo "<label for=\"harga\">Jumlah bayar</label>";
    		if ($member == 0) {
    			echo "<input type=\"text\" class=\"form-control\" id=\"harga\" value=\"0\" name=\"harga\">";
    		} else {
    			echo "<input type=\"text\" class=\"form-control\" id=\"harga\" value=\"0\" name=\"harga\" disabled>";
    		}
        	
      echo "</div>";
      echo "<input id=\"num_pembayaran_db\" name=\"num_pembayaran_db\" type=\"hidden\" value=\"" . $stmt->num_rows . "\"/>";
      if ($member == 0) {
      	echo "<button type =\"button\" class=\"btn\" onclick=\"tambahPembayaran()\">Tambah Pembayaran</button><br><br>";
      } else {
      	echo "<button type =\"button\" class=\"btn\" onclick=\"tambahPembayaran()\" disabled>Tambah Pembayaran</button><br><br>";
      }
	  echo "<table class=\"table table-bordered table-striped\" >";
                        echo "<thead>";
                          echo "<tr>";
                            echo "<th>Nomor</th>";
                            echo "<th>Jumlah Bayar</th>";
                            echo "<th>Waktu Bayar</th>";
                          echo "</tr>";
                        echo "</thead>";

                        echo "<tbody id=\"tambah_table\">";
                        $i = 0;
                        while ($i < $stmt->num_rows && $stmt->fetch()) {
                        	$i++;
                        	echo "<tr>";
                        		echo "<td>" . $i . "</td>";
                        		$totalharga = $totalharga + $jumlah_bayar;
                        		echo "<td>" . "Rp. " . number_format($jumlah_bayar, 0, ',', '.') . "</td>";
        		                $date=date_create($waktu_bayar);
              					$waktu_bayar = date_format($date, "Y-m-d H:i");
                        		echo "<td>" . $waktu_bayar . "</td>";
                        	echo "</tr>";
                        }
                        echo "</tbody>";
                      echo "</table>";
                      echo "<input id=\"totalharga\" name=\"totalharga\" type=\"hidden\" value=\"" . $totalharga . "\"/>";
                      echo "<input id=\"num_pembayaran_edit\" name=\"num_pembayaran_edit\" type=\"hidden\" value=\"0\"/>";
                      echo "<input id=\"timestamp\" name=\"timestamp\" type=\"hidden\" value=\"\"/>";
                      echo "<input id=\"id_pemesanan\" name=\"id_pemesanan\" type=\"hidden\" value=\"\"/>";
                      echo "<input id=\"durasi\" name=\"durasi\" type=\"hidden\" value=\"" . $durasi_main . "\"/>";

	$stmt->close();
	$conn->close();
?>