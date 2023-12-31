<?php
require_once "../connection.php";

// Mengambil data JSON dari body permintaan
$jsonData = file_get_contents('php://input');

// Mengubah JSON menjadi array atau objek PHP
$data = json_decode($jsonData, true);

// Memeriksa apakah data JSON berhasil diuraikan
if ($data !== null) {
    // Mendapatkan nilai nama dan password dari data JSON
    $kegiatanId = uniqid();
    $tipeKegiatan = $data['tipe_kegiatan'];
    $namaTempat = $data['nama_tempat'];
    $alamat = $data['alamat'];
    $bentukKegiatan = $data['bentuk_kegiatan'];
    // $dosenId = $data['dosen_id'];
    $mahasiswaId = $data['mahasiswa_id'];
    $daftarAnggota = $data['daftar_anggota'];
    $tanggalMulai = $data['tanggal_mulai'];
    $tanggalAkhir = $data['tanggal_akhir'];

    if (strtolower($tipeKegiatan) === "kkn") {
        $stringArray = implode(";", $daftarAnggota);
        // Lakukan operasi untuk membuat pengguna baru
        // Misalnya, Anda dapat menyimpan pengguna ke dalam database
        $sql = "INSERT INTO tbl_kegiatan (kegiatan_id, tipe_kegiatan, nama_tempat, alamat, bentuk_kegiatan, mahasiswa_id, daftar_anggota, tanggal_mulai, tanggal_akhir) VALUES ('$kegiatanId', '$tipeKegiatan', '$namaTempat', '$alamat', '$bentukKegiatan', '$mahasiswaId', '$stringArray', '$tanggalMulai', '$tanggalAkhir')";
        if (mysqli_query($conn, $sql)) {
            // Menyiapkan respons
            $response = array(
                "success" => true,
                "message" => "Kegiatan created sucessfully",
            );

            // Mengubah array respons menjadi format JSON
            $jsonResponse = json_encode($response);

            // Menampilkan JSON respons
            echo $jsonResponse;
        }
    } else {
        // Lakukan operasi untuk membuat pengguna baru
        // Misalnya, Anda dapat menyimpan pengguna ke dalam database
        $sql = "INSERT INTO tbl_kegiatan (kegiatan_id, tipe_kegiatan, nama_tempat, alamat, bentuk_kegiatan, mahasiswa_id, tanggal_mulai, tanggal_akhir) VALUES ('$kegiatanId', '$tipeKegiatan', '$namaTempat', '$alamat', '$bentukKegiatan', '$mahasiswaId', '$tanggalMulai', '$tanggalAkhir')";
        if (mysqli_query($conn, $sql)) {
            // Menyiapkan respons
            $response = array(
                "success" => true,
                "message" => "Kegiatan created sucessfully",
            );

            // Mengubah array respons menjadi format JSON
            $jsonResponse = json_encode($response);

            // Menampilkan JSON respons
            echo $jsonResponse;
        }
    }
    // Menutup koneksi
    mysqli_close($conn);
}
