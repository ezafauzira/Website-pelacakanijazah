<?php
// Menampilkan semua error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set header response type
header('Content-Type: application/json');

// Konfigurasi database
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "Pelacakan_ijazah_nebo"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500); 
    echo json_encode(["message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Memeriksa apakah parameter 'NIS' ada dan tidak kosong
if (!isset($_GET['NIS']) || empty($_GET['NIS'])) {
    http_response_code(400); // Bad request
    echo json_encode(["message" => "NIS tidak disediakan."]);
    exit;
}

$nis = $_GET['NIS'];

// Menyiapkan query SQL
$sql = "SELECT * FROM Siswa WHERE NIS = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    http_response_code(500); 
    echo json_encode(["message" => "Query error: " . $conn->error]);
    exit;
}

$stmt->bind_param("s", $nis);
$stmt->execute();
$result = $stmt->get_result();

// Mengecek hasil
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    http_response_code(200); // OK
    echo json_encode($row);
} else {
    http_response_code(404); 
    echo json_encode(["message" => "Data tidak ditemukan."]);
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>
