<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Upload Berhasil</title>
        </head>
        <body>
            <p>File <strong><?= htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) ?></strong> berhasil diupload.</p>
            <a href="index.html">Kembali ke halaman utama</a>
        </body>
        </html>
        <?php
    } else {
        echo "Maaf, file gagal diupload.";
    }
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Form Upload</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Pilih file:
        <input type="file" name="fileToUpload" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
<?php
}
?>