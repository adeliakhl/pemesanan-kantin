<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'navbar.php'; ?>
    <title>Pemesanan</title>
    <style>
body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        a {
            margin-right: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h2>Form Pemesanan</h2>

    <form method="post" action="proses_pesan.php">
        Nama Pembeli: <br>
        <input type="text" name="nama_pembeli" required><br><br>

        <table>
            <tr>
                <th>Pilih</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jumlah</th>
            </tr>

            <?php
            $query = $koneksi->query("SELECT * FROM menu");
            while($data = $query->fetch()){
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="id_menu[]" value="<?php echo $data['id_menu']; ?>">
                </td>
                <td><?php echo $data['nama_menu']; ?></td>
                <td><?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td>
                    <input type="number" name="jumlah[<?php echo $data['id_menu']; ?>]" min="1" value="1">
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <input type="submit" value="Pesan Sekarang">
    </form>

    <br>
    <a href="menu.php">Kembali ke Data Menu</a>
    

</body>
</html>
