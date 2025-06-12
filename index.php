<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload dan Daftar File</title>
</head>
<body>
    <h2>📤 Unggah File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Pilih file:
        <input type="file" name="fileToUpload">
        <input type="submit" value="Unggah">
    </form>

    <hr>

    <h2>📁 Daftar File yang Sudah Diupload</h2>

    <?php
    $dir = __DIR__ . "/uploads/";
    $web_dir = "uploads/";

    if (is_dir($dir)) {
        $files = scandir($dir);
        $files = array_diff($files, array('.', '..'));

        if (count($files) > 0) {
            echo "<ul>";
            foreach ($files as $file) {
                $safeName = htmlspecialchars($file);
                $urlName = urlencode($file);
                echo "<li>$safeName - 
                    <a href='{$web_dir}$urlName' download>Download</a> | 
                    <a href='delete.php?file=$urlName' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </li>";
            }
            echo "</ul>";
        } else {
            echo "<p><i>Belum ada file.</i></p>";
        }
    } else {
        echo "<p style='color:red;'>❌ Folder uploads tidak ditemukan!</p>";
    }
    ?>
</body>
</html>
