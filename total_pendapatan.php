<?php
require 'koneksi.php';

// Hitung total pendapatan (hanya pesanan yang statusnya Selesai)
$sql = "SELECT COALESCE(SUM(total), 0) AS total_pendapatan 
        FROM pesanan 
        WHERE status = 'Selesai'";
$stmt = $koneksi->query($sql);
$data = $stmt->fetch();
$total_pendapatan = $data['total_pendapatan'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Pendapatan</title>
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

    <h2>Laporan Total Pendapatan</h2>

    <p>
        <a href="menu.php">Manajemen Menu</a>
        <a href="pesan.php">Pemesanan</a>
        <a href="status_pesanan.php">Status Pesanan</a>
        <a href="jumlah_transaksi.php">Jumlah Transaksi</a>
        <a href="total_pendapatan.php">Total Pendapatan</a>
    </p>

    <h3>Total Pendapatan</h3>
    <p>Total pendapatan dari pesanan selesai: <strong>Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></strong></p>

</body>
</html>