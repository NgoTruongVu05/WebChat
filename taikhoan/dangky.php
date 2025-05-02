<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}


?>




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
        <form method="POST">
            <div class="mb-3">
                <label for="tenNguoiDung" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung" placeholder="Nhập tên người dùng...">
            </div>
            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu...">
            </div>
            <div class="mb-3">
                <label for="xacNhanMatKhau" class="form-label">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="xacNhanMatKhau" name="xacNhanMatKhau" placeholder="Nhập lại mật khẩu...">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email..." required>
            </div>
            <div class="mb-3">
                <label for="soDienThoai" class="form-label">Số điện thoại:</label>
                <input type="tel" class="form-control" id="soDienThoai" name="soDienThoai" placeholder="Nhập số điện thoại..." required>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Nam" name="gioiTinh" value="Nam" checked>Nam
                    <label class="form-check-label" for="Nam"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Nu" name="gioiTinh" value="Nữ">Nữ
                    <label class="form-check-label" for="Nữ"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Khac" name="gioiTinh" value="Khác">Khác
                    <label class="form-check-label" for="Khác"></label>
                </div>
            </div>
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh">
            </div>
            <div class="mb-3">
                <label for="tinhThanh" class="form-label">Địa chỉ:</label>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="tinhThanh" name="tinhThanh" required>
                            <option value="">Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="quanHuyen" name="quanHuyen" required>
                            <option value="">Chọn quận huyện</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="xa" name="xa" required>
                            <option value="">Chọn xã</option>
                        </select>
                    </div>
                </div>
                <input type="text" class="form-control" id="duong" name="duong" placeholder="Nhập tên đường..." required>
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
    <script src="../asset/js/validator.js"></script>
    <script>
        messageRequired = 'Vui lòng nhập thông tin.';
        messageRequiredRole = 'Vui lòng chọn vai trò.';
        messageEmail = 'Vui lòng nhập đúng email.';
        messagePhone = 'Vui lòng nhập đúng số điện thoại.';
        messagePassword = 'Yêu cầu kí tự hoa, kí tự thường, số và ít nhất 7 kí tự.';
        messageConfirmPassword = 'Nhập sai mật khẩu, vui lòng nhập lại.';
        Validator({
            form: '#form-add',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#tenNguoiDung', messageRequired),
                Validator.isRequired('#matKhau', messageRequired),
                Validator.isRequired('#kiemTraMatKhau', messageRequired),
                Validator.isRequired('#vaiTro', messageRequiredRole),
                Validator.isRequired('#tinhThanh', 'Vui lòng chọn tỉnh thành.'),
                Validator.isRequired('#quanHuyen', 'Vui lòng chọn quận huyện.</br>*Chọn tỉnh thành trước.'),
                Validator.isRequired('#xa', 'Vui lòng chọn xã.</br>*Chọn tỉnh và quận huyện trước.'),
                Validator.isRequired('#duong', messageRequired),
                Validator.isEmail('#email', messageEmail),
                Validator.isPhone('#soDienThoai', messagePhone),
                Validator.minLength('#tenNguoiDung', 6),
                Validator.isPassword('#matKhau', messagePassword),
                Validator.comparePassword('#kiemTraMatKhau', 'matKhau', messageConfirmPassword),
            ]
        })
    </script>
</body>

</html>