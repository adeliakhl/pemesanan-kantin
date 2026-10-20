<!-- navbar.php -->
<style>
    .navbar {
        background-color: #1b4332; 
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        font-family: Arial, sans-serif;
    }
    .navbar-brand {
        color: #FCBBD9; 
        font-weight: bold;
        font-size: 19px;
        text-decoration: none;
    }
    .navbar-menu {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .navbar-menu a {
        color: #FCBBD9; 
        text-decoration: none;
        padding: 8px 14px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    .navbar-menu a:hover {
        background-color: #2d6a4f; 
        color: #f8edeb;
    }
</style>

<div class="navbar">
    <a href="menu.php" class="navbar-brand">Kantin Kampus</a>
    <div class="navbar-menu">
        <a href="menu.php">Kelola Menu</a>
        <a href="pesan.php">Form Pemesanan</a>
        <a href="status_pesanan.php">Status Pesanan</a>
        <a href="jumlah_transaksi.php">Jumlah Transaksi</a>
        <a href="total_pendapatan.php">Total Pendapatan</a>
        <a href="menu_terlaris.php">Menu Terlaris</a>
    </div>
</div>