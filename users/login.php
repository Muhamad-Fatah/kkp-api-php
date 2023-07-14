<?php

require_once "../connection.php";

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if (empty($data)) {
    $response = array(
        "success" => false,
        "message" => "UserId & Password can't be empty",
    );
    echo json_encode($response);
    return;
};


// Menerima data dari permintaan POST
$user = $data['user_id'];
$password = $data['password'];

// echo ($user);
// echo ($password);
// user_id, nama_depan, nama_belakang, role, jurusan, kegiatan_id

$sql = "SELECT mahasiswa_id, nama_depan, role, nama_belakang, jurusan FROM tbl_user WHERE mahasiswa_id = '$user' AND password = '$password'
        UNION
        SELECT kaprodi_id, nama_kaprodi, role, null, null FROM tbl_kaprodi WHERE kaprodi_id = '$user' AND password = '$password'
        UNION
        SELECT dosen_id, nama_dosen, role, null, null FROM tbl_dosen WHERE dosen_id = '$user' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "message" => "Login success",
        "data" => $result
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $response["data"] = $row;
    }
} else {
    $response = array(
        "success" => false,
        "message" => "Email or Password is wrong",
    );
}
echo (json_encode($response));

// // Validasi data
// if (empty($user) || empty($password)) {
//     // Tanggapi jika data tidak lengkap
//     $response = array(
//         "success" => false,
//         "message" => "UserId dan password harus diisi."
//     );
//     return;
// }
// // Lakukan proses otentikasi
// // Misalnya, periksa email dan password dengan data pengguna yang ada di basis data
// $sql = "SELECT user_id, email, role, nama_depan, nama_belakang, jurusan, kegiatan_id FROM tbl_user WHERE user_id = '$user' AND password = '$password'";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     $response = array(
//         "success" => true,
//         "message" => "Login success",
//         "data" => $result
//     );

//     while ($row = mysqli_fetch_assoc($result)) {
//         $response["data"] = $row;
//     }
// } else {
//     $response = array(
//         "success" => false,
//         "message" => "UserId or Password is Wrong"
//     );
// };

// echo json_encode($response);
