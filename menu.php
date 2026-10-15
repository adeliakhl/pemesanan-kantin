<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <h2>Data Menu Kantin</h2>
    <a href="tambah_menu.php">+ Tambah Menu</a>
    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = $koneksi->query("SELECT * FROM menu");
        while($data = $query->fetch()){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama_menu']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $data['stok']; ?></td>
            <td>
                <a href="edit_menu.php?id=<?php echo $data['id_menu']; ?>">Edit</a> | 
                <a href="hapus_menu.php?id=<?php echo $data['id_menu']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>