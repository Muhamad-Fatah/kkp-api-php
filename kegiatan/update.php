<?php
require_once "../connection.php";

// Mengambil data JSON dari body permintaan
$jsonData = file_get_contents('php://input');
$kegiatanId = $_GET["kegiatan_id"] ?? "";

// Mengubah JSON menjadi array atau objek PHP
$data = json_decode($jsonData, true);

if (!$kegiatanId) return;

// Memeriksa apakah data JSON berhasil diuraikan
if ($data != null) {
    // Mendapatkan nilai nama dan password dari data JSON
    $dosenId = $data['dosen_id'];

    // Lakukan operasi untuk membuat pengguna baru
    // Misalnya, Anda dapat menyimpan pengguna ke dalam database
    $sql = "UPDATE tbl_kegiatan SET dosen_id = '$dosenId'";
    if (mysqli_query($conn, $sql)) {
        // Menyiapkan respons
        $response = array(
            "success" => true,
            "message" => "Kegiatan updated sucessfully",
        );

        // Mengubah array respons menjadi format JSON
        $jsonResponse = json_encode($response);

        // Menampilkan JSON respons
        echo $jsonResponse;
    }
    // Menutup koneksi
    mysqli_close($conn);
}
