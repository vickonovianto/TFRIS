<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
		<p>
			<?php
				echo "nama: "; echo $_POST["nama"]; echo "<br>";
				echo "ismember: "; if (isset($_POST["ismember"])) echo $_POST["ismember"]; else echo "off"; echo "<br>";
				echo "lapangan: "; echo $_POST["lapangan"]; echo "<br>";
				echo "usagetime: "; echo $_POST["usagetime"]; echo "<br>";
				echo "durasi: "; echo $_POST["durasi"]; echo "<br>";
				echo "harga: "; if ($_POST["harga"] != 0) echo $_POST["harga"]; else echo "0"; echo "<br>";
			?>
		</p>
	</body>
</html>
