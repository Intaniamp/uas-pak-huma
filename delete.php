<?php
require("koneksi.php");

if (isset($_GET['idp'])) {
    $id = intval($_GET['idp']);
    $delete = mysqli_query($koneksi, "DELETE FROM tb_product WHERE product_id = $id");
    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location='data-produk.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location='data-produk.php';</script>";
    }
} else {
    echo "<script>alert('ID produk tidak ditemukan'); window.location='data-produk.php';</script>";
}
?>
