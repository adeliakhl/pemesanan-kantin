<?php
// Memanggil file koneksi database
require_once 'koneksi.php';

// Query untuk mengambil 5 menu yang paling banyak dipesan
$sql_terlaris = "SELECT m.nama_menu, SUM(dp.jumlah) as total_terjual 
                 FROM detail_pesanan dp
                 JOIN menu m ON dp.id_menu = m.id_menu
                 GROUP BY dp.id_menu
                 ORDER BY total_terjual DESC
                 LIMIT 5";
$stmt_terlaris = $koneksi->query($sql_terlaris);
$menu_terlaris = $stmt_terlaris->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Terlaris - Kantin Kampus</title>
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
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-radius: 6px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>

    <!-- Memanggil Navigasi -->
    <?php include 'navbar.php'; ?>

    <h3>Menu Paling Banyak Dipesan (Menu Terlaris)</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Total Terjual (Porsi/Unit)</th>
        </tr>
        <?php if (count($menu_terlaris) > 0): ?>
            <?php $no = 1; foreach ($menu_terlaris as $menu): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($menu['nama_menu']); ?></td>
                <td><?= $menu['total_terjual']; ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align: center;">Belum ada data penjualan.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>