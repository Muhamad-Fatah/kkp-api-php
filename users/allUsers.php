<?php

require_once "../connection.php";

$user_id = $_GET["user_id"] ?? "";

if ($user_id) {
    $sql = "SELECT mahasiswa_id, nama_depan, nama_belakang, role, jurusan FROM tbl_user WHERE mahasiswa_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $response = array(
            "success" => true,
            "message" => "Success get user by id $user_id",
            "data" => $result
        );

        while ($row = mysqli_fetch_assoc($result)) {
            $response["data"] = $row;
        }

        $json = json_encode($response);

        echo $json;
    } else {
        $response = array(
            "success" => false,
            "message" => "UserId not found",
        );

        $json = json_encode($response);

        echo $json;
    }
    return;
};

$sql = "SELECT mahasiswa_id, nama_depan, nama_belakang, role, jurusan FROM tbl_user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => "Success get all users",
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
        "message" => "No list user showing",
    );

    $json = json_encode($response);

    echo $json;
}

mysqli_close($conn);
