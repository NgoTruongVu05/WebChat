<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../config/db.inc';
    include_once '../config/config.php';
    include_once '../handlers/function.php';
    include_once '../handlers/nguoidung.php';

    $nguoiDung = new NguoiDung($database);

    $tenNguoiDung = test_input($_POST['tenNguoiDung']);
    $matKhau = test_input($_POST['matKhau']);
    $email = test_input($_POST['email']);
    $soDienThoai = test_input($_POST['soDienThoai']);
    $gioiTinh = test_input($_POST['gioiTinh']);
    $ngaySinh = test_input($_POST['ngaySinh']);
    $tinhThanh = test_input($_POST['tinhThanh']);
    $quanHuyen = test_input($_POST['quanHuyen']);
    $xa = test_input($_POST['xa']);
    $duong = test_input($_POST['duong']);

    $result = $nguoiDung->themNguoiDung($tenNguoiDung, password_hash($matKhau, PASSWORD_DEFAULT), $email, $soDienThoai, $gioiTinh, $ngaySinh, 0, 1, '' , $tinhThanh, $quanHuyen, $xa, $duong, '');

    if ($result['ketQua'] == true) {
        echo "<form action='dangnhap.php' method='POST' id='form-login'>
                <input type='hidden' name='tenNguoiDung' value='{$tenNguoiDung}'>
                <input type='hidden' name='matKhau' value='{$matKhau}'>
            </form>";
        echo "<script>document.getElementById('form-login').submit();</script>";
    } else {
        echo "<script>createAlert('{$result['thongBao']}');</script>";
    }
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
    <link rel="stylesheet" href="../asset/css/function.css">
</head>

<body>
    <div class="register-card">
        <div class="title">
            <i class="fas fa-user-plus"></i> Dâu & Bơ - Đăng ký
        </div>
        <form method="POST" id="form-add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="tenNguoiDung" class="form-label">Tên người dùng:</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung" placeholder="Nhập tên người dùng...">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu...">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="xacNhanMatKhau" class="form-label">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="xacNhanMatKhau" name="xacNhanMatKhau" placeholder="Nhập lại mật khẩu...">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email...">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="soDienThoai" class="form-label">Số điện thoại:</label>
                <input type="tel" class="form-control" id="soDienThoai" name="soDienThoai" placeholder="Nhập số điện thoại...">
                <span class="form-message"></span>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Nam" name="gioiTinh" value="Nam" checked>Nam
                    <label class="form-check-label" for="Nam"></label>
                    <span class="form-message"></span>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Nu" name="gioiTinh" value="Nữ">Nữ
                    <label class="form-check-label" for="Nữ"></label>
                    <span class="form-message"></span>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="Khac" name="gioiTinh" value="Khác">Khác
                    <label class="form-check-label" for="Khác"></label>
                    <span class="form-message"></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh">
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="tinhThanh" class="form-label">Địa chỉ:</label>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="tinhThanh" name="tinhThanh">
                            <option value="">Chọn tỉnh thành</option>
                        </select>
                        <span class="form-message"></span>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="quanHuyen" name="quanHuyen">
                            <option value="">Chọn quận huyện</option>
                        </select>
                        <span class="form-message"></span>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="xa" name="xa">
                            <option value="">Chọn xã</option>
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
                <input type="text" class="form-control" id="duong" name="duong" placeholder="Nhập tên đường...">
                <span class="form-message"></span>
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
    <script src="../asset/js/function.js"></script>
    <script src="../asset/js/validator.js"></script>
    <script type="module" src="../asset/js/apiAddress.js"></script>
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
                Validator.isRequired('#xacNhanMatKhau', messageRequired),
                Validator.isRequired('#tinhThanh', 'Vui lòng chọn tỉnh thành.'),
                Validator.isRequired('#quanHuyen', 'Vui lòng chọn quận huyện.</br>*Chọn tỉnh thành trước.'),
                Validator.isRequired('#xa', 'Vui lòng chọn xã.</br>*Chọn tỉnh và quận huyện trước.'),
                Validator.isRequired('#duong', messageRequired),
                Validator.isRequired('#ngaySinh', 'Vui lòng chọn ngày sinh.'),
                Validator.isEmail('#email', messageEmail),
                Validator.isPhone('#soDienThoai', messagePhone),
                Validator.minLength('#tenNguoiDung', 6),
                Validator.isPassword('#matKhau', messagePassword),
                Validator.comparePassword('#xacNhanMatKhau', 'matKhau', messageConfirmPassword),
            ]
        })

    </script>
    <script type="module">
        import {
            addressHandler
        } from '../asset/js/apiAddress.js';
        const addressHandler1 = new addressHandler('tinhThanh', 'quanHuyen', 'xa');
        addressHandler1.loadProvinces();
    </script>
</body>

</html>