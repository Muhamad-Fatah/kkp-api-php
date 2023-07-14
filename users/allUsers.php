<?php

require_once "../connection.php";

$role = $_GET["role"] ?? "";

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
} else {
    $sql = "SELECT user_id, nama_depan, nama_belakang, role, jurusan, kegiatan_id FROM tbl_user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $response = array(
            "success" => true,
            "message" => "Success get list all users",
            "data" => array()
        );

        while ($row = mysqli_fetch_assoc($result)) {
            $response["data"][] = $row;
        }

        $json = json_encode($response);

        echo $json;
    }
}

mysqli_close($conn);
