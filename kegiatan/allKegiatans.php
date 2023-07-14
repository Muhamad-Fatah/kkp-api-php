<?php

require_once "../connection.php";

$sql = "SELECT tbl_user.*, tbl_kegiatan.*, tbl_dosen.* 
FROM tbl_user 
JOIN tbl_kegiatan ON tbl_user.mahasiswa_id = tbl_kegiatan.mahasiswa_id
JOIN tbl_dosen ON tbl_kegiatan.dosen_id = tbl_dosen.dosen_id";
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
