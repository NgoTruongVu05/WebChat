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
        $_SESSION['thongBao'] = "Chào mừng bạn đến với Bơ và Dâu!";
        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                createAlert('" . $result['thongBao'] . "');
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
    <link rel="stylesheet" href="../asset/css/function.css">
</head>
<body>
    <div class="login-card">
        <div class="title">
            <i class="fas fa-seedling"></i> Dâu & Bơ - Đăng nhập
        </div>
        <form method="POST" id="form-add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="tenNguoiDung" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau">
                <span class="form-message"></span>
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
    <script src="../asset/js/function.js"></script>
    <script src="../asset/js/validator.js"></script>
    <script>
        messageRequired = 'Vui lòng nhập thông tin.';
        messagePassword = 'Yêu cầu kí tự hoa, kí tự thường, số và ít nhất 7 kí tự.';
        Validator({
            form: '#form-add',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#tenNguoiDung', messageRequired),
                Validator.isRequired('#matKhau', messageRequired),
                Validator.minLength('#tenNguoiDung', 6),
                Validator.isPassword('#matKhau', messagePassword),
            ]
        })

    </script>
</body>
</html>
