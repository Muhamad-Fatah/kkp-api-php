<?php
require_once "../connection.php";

// Mengambil data JSON dari body permintaan
$jsonData = file_get_contents('php://input');

// Mengubah JSON menjadi array atau objek PHP
$data = json_decode($jsonData, true);

// Memeriksa apakah data JSON berhasil diuraikan
if ($data !== null) {
    // Mendapatkan nilai nama dan password dari data JSON
    $mahasiswaId = $data['mahasiswa_id'];
    $password = $data['password'];
    $role = $data['role'];
    $namaDepan = $data['nama_depan'];
    $namaBelakang = $data['nama_belakang'];
    $jurusan = $data['jurusan'];

    // Lakukan operasi untuk membuat pengguna baru
    // Misalnya, Anda dapat menyimpan pengguna ke dalam database
    $sql = "INSERT INTO tbl_user (mahasiswa_id, password, role, nama_depan, nama_belakang, jurusan) VALUES ('$mahasiswaId', '$password', '$role', '$namaDepan', '$namaBelakang', '$jurusan')";
    if (mysqli_query($conn, $sql)) {
        // Menyiapkan respons
        $response = array(
            "success" => true,
            "message" => "User created successfully with userId $mahasiswaId",
        );

        // Mengubah array respons menjadi format JSON
        $jsonResponse = json_encode($response);

        // Menampilkan JSON respons
        echo $jsonResponse;
    }
    // Menutup koneksi
    mysqli_close($conn);
}
