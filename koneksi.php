<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_artedekain");

    if (!$koneksi) {
        die("connection error" . mysqli_connect_error());
    }
    echo "connection successfull";
    ?>