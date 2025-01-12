<?php
include("koneksi.php");

// Ambil data dari database berdasarkan ID
$id = intval($_GET['id']);
$query = $koneksi->query("SELECT * FROM contacts WHERE id=$id");
if ($query && $query->num_rows > 0) {
    $contacts = $query->fetch_assoc();
} else {
    die("Data tidak ditemukan!");
}
?>

<form action="put.php?update&id=<?php echo $id; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="name" value="<?php echo htmlspecialchars($contacts['name']); ?>" placeholder="Your Name" required>
    <input type="email" name="email" value="<?php echo htmlspecialchars($contacts['email']); ?>" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your review" required><?php echo htmlspecialchars($contacts['message']); ?></textarea>
    <button type="submit">Submit</button>
</form>
