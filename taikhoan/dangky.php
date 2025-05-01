<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Dâu và Bơ</title>
    <link rel="stylesheet" href="../vender/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vender/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/dangnhap.css">
</head>
<body>
    <div class="register-card">
        <div class="title">
            <i class="fas fa-user-plus"></i> Dâu & Bơ - Đăng ký
        </div>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="hoTen" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" id="hoTen" name="hoTen" required>
            </div>
            <div class="mb-3">
                <label for="tenDangNhap" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="tenDangNhap" name="tenDangNhap" required>
            </div>
            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
            </div>
            <div class="mb-3">
                <label for="xacNhanMatKhau" class="form-label">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="xacNhanMatKhau" name="xacNhanMatKhau" required>
            </div>
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom text-white">Đăng ký</button>
            </div>
            <div class="text-center">
                <small>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập ngay</a></small>
            </div>
        </form>
    </div>

    <script src="../vender/js/bootstrap.bundle.min.js"></script>
</body>
</html>
