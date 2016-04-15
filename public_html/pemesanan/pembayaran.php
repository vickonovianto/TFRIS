<?php
  $con=mysqli_connect("localhost","root","","tfris");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM pembayaran");
  $i = 0;

  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  $i = $i + 1;
  echo "<td>" . $i . "</td>";
  echo "<td>" . $row['jumlah_bayar'] . "</td>";
  echo "<td>" . $row['waktu_bayar'] . "</td>";
  echo "</tr>";
  }

  mysqli_close($con);
?> 
