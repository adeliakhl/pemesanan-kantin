<?php
require 'koneksi.php';

// Hitung jumlah transaksi
$sql = "SELECT COUNT(*) AS total_transaksi FROM pesanan";
$stmt = $koneksi->query($sql);
$data = $stmt->fetch();
$total_transaksi = $data['total_transaksi'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
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
    <?php include 'navbar.php'; ?>

    <h2>Laporan Transaksi</h2>

    <p>
        <a href="menu.php">Manajemen Menu</a>
        <a href="pesan.php">Pemesanan</a>
        <a href="status_pesanan.php">Status Pesanan</a>
        <a href="laporan.php">Laporan</a>
    </p>

    <h3>Jumlah Transaksi</h3>
    <p>Total transaksi: <strong><?php echo $total_transaksi; ?></strong></p>

</body>
</html>