<?php
session_start();
if (!isset($_SESSION['tenNguoiDung'] ) || !isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] != 0) {
    header("Location: dangnhap.php");
    exit();
}
require_once '../config/config.php';
require_once '../handlers/nguoiDung.php';

$nguoiDung = new nguoiDung($database);
$thongTin = $nguoiDung->layThongTinNguoiDung($_SESSION['tenNguoiDung']);


?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Cá Nhân - Dâu & Bơ</title>
    <link rel="stylesheet" href="../vender/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vender/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/dangnhap.css">
    <link rel="stylesheet" href="../asset/css/function.css">
    <style>
        
    </style>
</head>

<body class="bg-light">

    <div class="profile-card text-center">
        <img src="https://i.pravatar.cc/150?img=5" alt="avatar" class="profile-avatar">
        <h3><?php echo $thongTin['tenNguoiDung']?>></h3>
        <p class="text-muted mb-4">@nguyenvana</p>

        <div class="text-start mb-4">
            <p><strong>Email:</strong><?php echo $thongTin['email']?></p>
            <p><strong>Giới tính:</strong><?php echo $thongTin['gioiTinh']?></p>
            <p><strong>Ngày sinh:</strong><?php echo $thongTin['ngaySinh']?></p>
            <p><strong>Giới thiệu:</strong><?php echo $thongTin['gioiThieu']?></p>
        </div>

        <a href="#" class="btn btn-edit">Chỉnh sửa</a>
        <a href="../index.php" class="btn btn-secondary ms-2">Quay lại chat</a>
    </div>

    <script src="../vender/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/function.js"></script>
</body>

</html>