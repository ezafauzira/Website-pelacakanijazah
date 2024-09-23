<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Pelacakan_ijazah_nebo";

$koneksi = new mysqli($servername, $username, $password, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
