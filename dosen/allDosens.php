<?php

require_once "../connection.php";

$sql = "SELECT dosen_id, nama_dosen FROM tbl_dosen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => "Success get all dosens",
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
        "message" => "No list dosen showing",
    );

    $json = json_encode($response);

    echo $json;
}

mysqli_close($conn);
