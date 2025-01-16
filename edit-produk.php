<?php
require("koneksi.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID produk tidak ditemukan'); window.location='data-produk.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM tb_product WHERE product_id = $id");

if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Produk tidak ditemukan'); window.location='data-produk.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $gambar_lama = $data['product_image'];
    $gambar_baru = $gambar_lama;

    if (!empty($_FILES['gambar']['name'])) {
        $gambar_baru = basename($_FILES['gambar']['name']);
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $folder = "produk/";

        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $file_type = mime_content_type($tmp_name);

        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Format gambar tidak valid (hanya JPG, JPEG, dan PNG)');</script>";
            exit;
        }

        if (file_exists($folder . $gambar_lama)) {
            unlink($folder . $gambar_lama);
        }

        if (!move_uploaded_file($tmp_name, $folder . $gambar_baru)) {
            echo "<script>alert('Gagal mengunggah gambar baru');</script>";
            exit;
        }
    }

    $update = mysqli_query($koneksi, "UPDATE tb_product SET 
        product_name = '$nama', 
        product_price = '$harga', 
        product_description = '$deskripsi', 
        product_image = '$gambar_baru' 
        WHERE product_id = $id");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='data-produk.php';</script>";
    } else {
        echo "<script>alert('Data gagal diperbarui');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="stylecart.css">
</head>
<body>
    <div class="container">
        <h3>Edit Data Produk</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" value="<?php echo $data['product_name']; ?>" placeholder="Nama Produk" required>
            <input type="text" name="harga" value="<?php echo $data['product_price']; ?>" placeholder="Harga" required>
            <textarea name="deskripsi" placeholder="Deskripsi"><?php echo $data['product_description']; ?></textarea>
            <input type="file" name="gambar">
            <p>Gambar Saat Ini:</p>
            <img src="produk/<?php echo $data['product_image']; ?>" width="100">
            <br>
            <input type="submit" name="submit" value="Perbarui">
        </form>
    </div>
</body>
</html>
