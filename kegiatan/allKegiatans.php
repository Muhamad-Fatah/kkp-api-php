<?php

require_once "../connection.php";

$sql = "SELECT kegiatan_id, tipe_kegiatan, nama_tempat, alamat, bentuk_kegiatan, nama_pembimbing, nama_ketua, daftar_anggota, tanggal_mulai, tanggal_akhir FROM tbl_kegiatan";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => "Success get list all kegiatan",
        "data" => array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $response["data"][] = $row;
    }

    $json = json_encode($response);

    echo $json;
}

mysqli_close($conn);
