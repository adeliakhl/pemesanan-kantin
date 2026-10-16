<?php
include "koneksi.php";

if(isset($_POST['nama_pembeli'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $id_menu = $_POST['id_menu'];
    $jumlah = $_POST['jumlah'];

    $total = 0;

    // Hitung total
    foreach($id_menu as $id){
        $query = $koneksi->prepare("SELECT * FROM menu WHERE id_menu = ?");
        $query->execute([$id]);
        $menu = $query->fetch();

        $subtotal = $menu['harga'] * $jumlah[$id];
        $total += $subtotal;
    }

    // Simpan ke tabel pesanan
    $query = $koneksi->prepare("INSERT INTO pesanan (nama_pembeli, total) VALUES (?, ?)");
    $query->execute([$nama_pembeli, $total]);
    $id_pesanan = $koneksi->lastInsertId();

    // Simpan detail + kurangi stok
    foreach($id_menu as $id){
        $query = $koneksi->prepare("SELECT * FROM menu WHERE id_menu = ?");
        $query->execute([$id]);
        $menu = $query->fetch();

        $jml = $jumlah[$id];
        $subtotal = $menu['harga'] * $jml;

        if($menu['stok'] < $jml){
            echo "Stok " . $menu['nama_menu'] . " tidak cukup!";
            exit;
        }

        // Simpan detail pesanan
        $query = $koneksi->prepare("INSERT INTO detail_pesanan (id_pesanan, id_menu, jumlah, harga, subtotal) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$id_pesanan, $id, $jml, $menu['harga'], $subtotal]);

        // Kurangi stok
        $stok_baru = $menu['stok'] - $jml;
        $query = $koneksi->prepare("UPDATE menu SET stok = ? WHERE id_menu = ?");
        $query->execute([$stok_baru, $id]);
    }

    echo "<h3>Pesanan berhasil disimpan!</h3>";
    echo "Total: Rp " . number_format($total, 0, ',', '.');
    echo "<br><br><a href='pesan.php'>Kembali ke Form Pemesanan</a>";
}
?>