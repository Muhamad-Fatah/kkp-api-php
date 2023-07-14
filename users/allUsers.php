<?php

require_once "../connection.php";

$role = $_GET["role"] ?? "";
$user_id = $_GET["user_id"] ?? "";

if ($role) {
    $sql = "SELECT user_id, nama_depan, nama_belakang, role, jurusan, kegiatan_id FROM tbl_user WHERE role = '$role'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $response = array(
            "success" => true,
            "message" => "Success get list all $role",
            "data" => array()
        );

        while ($row = mysqli_fetch_assoc($result)) {
            $response["data"][] = $row;
        }

        $json = json_encode($response);

        echo $json;
    }

    return;
}

if ($user_id) {
    $sql = "SELECT user_id, nama_depan, nama_belakang, role, jurusan, kegiatan_id FROM tbl_user WHERE user_id = '$user_id'";
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
}

$sql = "SELECT user_id, nama_depan, nama_belakang, role, jurusan, kegiatan_id FROM tbl_user";
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
