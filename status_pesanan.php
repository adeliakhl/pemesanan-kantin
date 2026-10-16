<?php
require 'koneksi.php';

// Proses ubah status
if (isset($_POST['ubah'])) {
    $id     = $_POST['id_pesanan'];
    $status = $_POST['status'];

    $sql = "UPDATE pesanan SET status = ? WHERE id_pesanan = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$status, $id]);

    header("Location: status_pesanan.php");
    exit;
}

// Ambil semua data pesanan
$sql = "SELECT * FROM pesanan ORDER BY id_pesanan DESC";
$stmt = $koneksi->query($sql);
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Pembeli</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th>Ubah Status</th>
        </tr>

        <?php if (count($data) == 0) { ?>
            <tr>
                <td colspan="6" align="center">Belum ada pesanan</td>
            </tr>
        <?php } else { ?>
            <?php foreach ($data as $row) { ?>
            <tr>
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['nama_pembeli']; ?></td>
                <td><?php echo $row['tanggal_pesanan']; ?></td>
                <td>Rp <?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                        <select name="status">
                            <option value="Menunggu" <?php if($row['status'] == 'Menunggu') echo 'selected'; ?>>Menunggu</option>
                            <option value="Diproses" <?php if($row['status'] == 'Diproses') echo 'selected'; ?>>Diproses</option>
                            <option value="Selesai"  <?php if($row['status'] == 'Selesai')  echo 'selected'; ?>>Selesai</option>
                        </select>
                        <button type="submit" name="ubah">Ubah</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
    </table>

</body>
</html>