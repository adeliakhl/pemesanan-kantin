<?php
include "koneksi.php";

$id = $_GET['id'];
$query = $koneksi->prepare("SELECT * FROM menu WHERE id_menu = ?");
$query->execute([$id]);
$data = $query->fetch();

if(isset($_POST['update'])){
    $nama     = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];

    $update = $koneksi->prepare("UPDATE menu SET nama_menu=?, kategori=?, harga=?, stok=? WHERE id_menu=?");
    $update->execute([$nama, $kategori, $harga, $stok, $id]);

    header("Location: menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
</head>
<body>
    <h2>Edit Menu</h2>
    <form method="post">
        Nama Menu: <br>
        <input type="text" name="nama_menu" value="<?php echo $data['nama_menu']; ?>" required><br><br>

        Kategori: <br>
        <input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" required><br><br>

        Harga: <br>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required><br><br>

        Stok: <br>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required><br><br>

        <input type="submit" name="update" value="Update">
        <a href="menu.php">Kembali</a>
    </form>
</body>
</html>
