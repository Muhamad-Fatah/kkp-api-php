<?php

require_once "../connection.php";

$kegiatanId = $_GET["kegiatan_id"] ?? "";
$mahasiswaId = $_GET["mahasiswa_id"] ?? "";
$dosenId = $_GET["dosen_id"] ?? "";

$sql = "";
$message = "";

if ($kegiatanId) {
    $sql = "SELECT * FROM tbl_kegiatan WHERE kegiatan_id = '$kegiatanId'";
    $message = "Success get kegiatan by kegiatan_id $kegiatanId";
} else if ($mahasiswaId) {
    $sql = "SELECT * FROM tbl_kegiatan WHERE mahasiswa_id = '$mahasiswaId'";
    $message = "Success get kegiatan by mahasiswa_id $mahasiswaId";
} else if ($dosenId) {
    $sql = "SELECT * FROM tbl_kegiatan WHERE dosen_id = '$dosenId'";
    $message = "Success get kegiatan by dosen_id $dosenId";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => $message,
        "data" => $result
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $response["data"] = $row;
    }

    $json = json_encode($response);

    echo $json;
}

mysqli_close($conn);
