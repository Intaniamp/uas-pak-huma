<?php 
   $results = $koneksi->query("SELECT * FROM Nama");
    foreach ($results as $value) {
     print_r($value);
 }
  ?>