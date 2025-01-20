<?php require("koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link rel="stylesheet" href="stylecart.css">
</head>
<body>
    <h1>Data Produk</h1>
    <div class="box">
        <p><a href="tambah-produk.php">Tambah Data</a></p>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $produk = mysqli_query($koneksi, "SELECT * FROM tb_product ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_array($produk)) {
                        echo "<tr>
                            <td>" .$no++. "</td>
                            <td>{$row['product_name']}</td>
                            <td>{$row['product_price']}</td>
                            <td>{$row['product_description']}</td>
                            <td><img src='produk/{$row['product_image']}' width='100'></td>
                            <td>
                                <a href='edit-produk.php?id={$row['product_id']}'>Edit</a>
                                <a href='delete.php?idp={$row['product_id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Belum ada data produk</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
