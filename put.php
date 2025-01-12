<?php
require("koneksi.php");

if (isset($_GET['insert'])) {
    insert();
} else if (isset($_GET['update'])) {
    update();
} else if (isset($_GET['delete'])) {
    delete();
}

function insert() {
    global $koneksi;
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);
    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit;
    } else {
        die("Error: " . $koneksi->error);
    }
}

function update() {
    global $koneksi;
    $id = intval($_GET['id']);
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);
    $query = "UPDATE contacts SET name='$name', email='$email', message='$message' WHERE id=$id";
    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit;
    } else {
        die("Error: " . $koneksi->error);
    }
}

function delete() {
    global $koneksi;
    $id = intval($_GET['id']);
    $query = "DELETE FROM contacts WHERE id=$id";
    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit;
    } else {
        die("Error: " . $koneksi->error);
    }
}
?>
