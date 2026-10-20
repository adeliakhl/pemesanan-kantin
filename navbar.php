<style>
    /* Reset agar semua halaman sama */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Times New Roman, sans-serif;
        margin: 20px;
        background-color: #f8f9fa;
    }

    .navbar {
        background-color: #1b4332; 
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 3px 8px rgba(0,0,0,0.15);
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
        <a href="laporan.php">Laporan</a>
    </div>
</div>