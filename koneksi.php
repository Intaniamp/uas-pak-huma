<?php
    $koneksi = mysqli_connect("localhost", "root", "", "artedekainnn");

    if (!$koneksi) {
        die("connection error" . mysqli_connect_error());
    }
    ?>