<?php
include "koneksi.php";

$id = $_GET['id'];

$query = $koneksi->prepare("DELETE FROM menu WHERE id_menu = ?");
$query->execute([$id]);

header("Location: menu.php");
?>