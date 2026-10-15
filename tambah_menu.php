<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nama     = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];

    $query = $koneksi->prepare("INSERT INTO menu (nama_menu, kategori, harga, stok) VALUES (?, ?, ?, ?)");
    $query->execute([$nama, $kategori, $harga, $stok]);

    header("Location: menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"] {
            padding: 6px;
            width: 250px;
            margin-bottom: 12px;
        }
        input[type="submit"] {
            padding: 7px 18px;
            margin-right: 8px;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

    <h2>Tambah Menu</h2>

    <form method="post">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" required><br>

        <label>Kategori</label>
        <input type="text" name="kategori" required><br>

        <label>Harga</label>
        <input type="number" name="harga" required><br>

        <label>Stok</label>
        <input type="number" name="stok" required><br><br>

        <input type="submit" name="simpan" value="Simpan">
        <a href="menu.php">Kembali</a>
    </form>

</body>
</html>