<?php require("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="stylecart.css">
</head>
<body>
    <div class="container">
        <h3>Tambah Data Produk</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama Produk" required>
            <input type="text" name="harga" placeholder="Harga" required>
            <input type="file" name="gambar" required>
            <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
            <input type="submit" name="submit" value="Tambah">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
            $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
            
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $folder = "produk";

            if (move_uploaded_file($tmp_name, $folder . $gambar)) {
                $insert = mysqli_query($koneksi, "INSERT INTO tb_product (product_name, product_price, product_description, product_image) 
                                                  VALUES ('$nama', '$harga', '$deskripsi', '$gambar')");
                if ($insert) {
                    echo "<script>alert('Data berhasil ditambahkan'); window.location='data-produk.php';</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar');</script>";
            }
        }
        ?>
    </div>
</body>
</html>
