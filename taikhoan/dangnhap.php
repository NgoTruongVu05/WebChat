<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once "../config/config.php";
    include_once "../handlers/nguoidung.php";
    session_start();

    $nguoiDung = new NguoiDung($database);
    
    $tenNguoiDung = $_POST['tenNguoiDung'] ?? '';
    $matKhau = $_POST['matKhau'] ?? '';
    
    $result = $nguoiDung->dangNhap($tenNguoiDung, $matKhau);
    
    if ($result['ketQua'] === true && isset($result['vaiTro']) && $result['vaiTro'] == 0) {
        $_SESSION['tenNguoiDung'] = $tenNguoiDung;
        $_SESSION['vaiTro'] = $result['vaiTro'];
        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                createAlert('" . addslashes($result['thongBao']) . "');
            });
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Dâu và Bơ</title>
    <link rel="stylesheet" href="../vender/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vender/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/dangnhap.css">
</head>
<body>
    <div class="login-card">
        <div class="title">
            <i class="fas fa-seedling"></i> Dâu & Bơ - Đăng nhập
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="tenNguoiDung" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung">
            </div>
            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau">
            </div>
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom text-white">Đăng nhập</button>
            </div>
            <div class="d-grid">
                <a href="dangky.php" class="btn btn-outline-secondary">Đăng ký</a>
            </div>
        </form>
    </div>
    <script src="../vender/js/bootstrap.bundle.min.js"></script>
</body>
</html>
