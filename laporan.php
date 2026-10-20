<?php
require 'koneksi.php';

// 1. Jumlah Transaksi
$sql1 = "SELECT COUNT(*) AS total_transaksi FROM pesanan";
$stmt1 = $koneksi->query($sql1);
$data1 = $stmt1->fetch();
$total_transaksi = $data1['total_transaksi'];

// 2. Total Pendapatan (hanya status Selesai)
$sql2 = "SELECT COALESCE(SUM(total), 0) AS total_pendapatan 
         FROM pesanan 
         WHERE status = 'Selesai'";
$stmt2 = $koneksi->query($sql2);
$data2 = $stmt2->fetch();
$total_pendapatan = $data2['total_pendapatan'];

// 3. Menu Terlaris
$sql3 = "SELECT m.nama_menu, SUM(d.jumlah) AS total_terjual
         FROM detail_pesanan d
         JOIN menu m ON d.id_menu = m.id_menu
         GROUP BY d.id_menu
         ORDER BY total_terjual DESC";
$stmt3 = $koneksi->query($sql3);
$menu_terlaris = $stmt3->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            margin: 20px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        select, button {
            padding: 5px;
        }
        a {
            margin-right: 15px;
            text-decoration: none;
    }
        .ringkasan {
            margin-bottom: 22px;
        }
        h3 {
            margin-bottom: 6px;
        }
        p {
            margin-top: 0;
        }
        </style>

    <?php include 'navbar.php'; ?>

    <h2>Laporan Transaksi</h2>

    <!-- 1. Jumlah Transaksi -->
    <div class="ringkasan">
        <h3>1. Jumlah Transaksi</h3>
        <p>Total transaksi yang terjadi: <strong><?php echo $total_transaksi; ?></strong></p>
    </div>

    <!-- 2. Total Pendapatan -->
    <div class="ringkasan">
        <h3>2. Total Pendapatan</h3>
        <p>Total pendapatan dari pesanan selesai: 
            <strong>Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></strong>
        </p>
    </div>

    <!-- 3. Menu Terlaris -->
    <h3>3. Menu Paling Banyak Dipesan</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Total Terjual</th>
        </tr>

        <?php if (count($menu_terlaris) == 0) { ?>
            <tr>
                <td colspan="3" align="center">Belum ada data penjualan</td>
            </tr>
        <?php } else { ?>
            <?php $no = 1; foreach ($menu_terlaris as $row) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_menu']; ?></td>
                <td><?php echo $row['total_terjual']; ?> porsi</td>
            </tr>
            <?php } ?>
        <?php } ?>
    </table>

</body>
</html>