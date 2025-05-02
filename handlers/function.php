<?php
function checkLogin($database, $username, $password, $vaiTro){
    $stmt = $database->prepare("SELECT * FROM tvu_nguoiDung WHERE tenNguoiDung = ?");
    if ($stmt === false) {
        die('MySQL prepare error: ' . $database->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if ($admin['vaiTro'] != $vaiTro) {
            return false;
        }
        if (password_verify($password, $admin['matKhau'])) {
            return $admin;
        } else {
            return false;
        }
    } else {
        return false;
    }

    $stmt->close();
}

function test_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
}
?>