<?php

require_once "../connection.php";

$kegiatanId = $_GET["kegiatan_id"] ?? "";
$mahasiswaId = $_GET["mahasiswa_id"] ?? "";
$dosenId = $_GET["dosen_id"] ?? "";

$sql = "";
$message = "";

if ($kegiatanId) {
    $sql = "SELECT tbl_user.*, tbl_kegiatan.*, tbl_dosen.* 
    FROM tbl_user 
    JOIN tbl_kegiatan ON tbl_user.mahasiswa_id = tbl_kegiatan.mahasiswa_id
    JOIN tbl_dosen ON tbl_kegiatan.dosen_id = tbl_dosen.dosen_id
    WHERE tbl_kegiatan.kegiatan_id = '$kegiatanId'
    ";
    $message = "Success get kegiatan by kegiatan_id $kegiatanId";
} else if ($mahasiswaId) {
    $sql = "SELECT tbl_user.*, tbl_kegiatan.*, tbl_dosen.* 
    FROM tbl_user 
    JOIN tbl_kegiatan ON tbl_user.mahasiswa_id = tbl_kegiatan.mahasiswa_id
    JOIN tbl_dosen ON tbl_kegiatan.dosen_id = tbl_dosen.dosen_id
    WHERE tbl_kegiatan.mahasiswa_id = '$mahasiswaId'
    ";
    $message = "Success get kegiatan by mahasiswa_id $mahasiswaId";
} else if ($dosenId) {
    $sql = "SELECT tbl_user.*, tbl_kegiatan.*, tbl_dosen.* 
    FROM tbl_user 
    JOIN tbl_kegiatan ON tbl_user.mahasiswa_id = tbl_kegiatan.mahasiswa_id
    JOIN tbl_dosen ON tbl_kegiatan.dosen_id = tbl_dosen.dosen_id
    WHERE tbl_kegiatan.dosen_id = '$dosenId'
    ";
    $message = "Success get kegiatan by dosen_id $dosenId";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => $message,
        "data" => array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $response["data"][] = $row;
    }

    $json = json_encode($response);

    echo $json;
} else {
    $response = array(
        "success" => false,
        "message" => "Anda belum memiliki kegiatan"
    );

    $json = json_encode($response);

    echo $json;
}

mysqli_close($conn);
