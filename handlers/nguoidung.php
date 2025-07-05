<?php
class NguoiDung
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function themNguoiDung($tenNguoiDung, $matKhau, $email, $soDienThoai, $gioiTinh, $ngaySinh, $vaiTro, $trangThai, $gioiThieu, $tinhThanh, $quanHuyen, $xa, $duong, $anhDaiDien) {
        $checkSql = "SELECT * FROM tvu_nguoidung WHERE tenNguoiDung = ? OR email = ?";
        $checkStmt = $this->database->prepare($checkSql);
    
        $checkStmt->bind_param("ss", $tenNguoiDung, $email);
        $checkStmt->execute();
        $checkStmt->store_result();
    
        if ($checkStmt->num_rows > 0) {
            return [
                "ketQua" => false,
                "thongBao" => "Tên người dùng hoặc email đã tồn tại."
            ];
        }
    
        $checkStmt->close();
    
        $sql = "INSERT INTO tvu_nguoidung(tenNguoiDung, matKhau, email, soDienThoai, gioiTinh, ngaySinh, vaiTro, trangThai, gioiThieu, tinhThanh, quanHuyen, xa, duong, anhDaiDien)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("ssssssiisiiiss", $tenNguoiDung, $matKhau, $email, $soDienThoai, $gioiTinh, $ngaySinh, $vaiTro, $trangThai, $gioiThieu, $tinhThanh, $quanHuyen, $xa, $duong, $anhDaiDien);
        $stmt->execute();
        $stmt->close();
        return [
            "ketQua" => true,
            "thongBao" => "Đăng ký thành công."
        ];
    }
    

    public function suaNguoiDung($tenNguoiDung, $duLieuMoi = []) {
        $stmt = $this->database->prepare("SELECT * FROM tvu_nguoidung WHERE tenNguoiDung = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $tenNguoiDung);
        $stmt->execute();
        $current = $stmt->get_result()->fetch_assoc();
        if (!$current) return false;
    
        $fields = $params = [];
        $types = "";
    
        foreach ($duLieuMoi as $key => $value) {
            if (array_key_exists($key, $current) && $value !== $current[$key]) {
                $fields[] = "$key = ?";
                $params[] = $value;
                $types .= "s";
            }
        }
    
        if (empty($fields)) return true;
    
        $params[] = $tenNguoiDung;
        $types .= "s";
    
        $sqlUpdate = "UPDATE tvu_nguoidung SET " . implode(", ", $fields) . " WHERE tenNguoiDung = ?";
        $stmtUpdate = $this->database->prepare($sqlUpdate);
        if (!$stmtUpdate) return false;
        $stmtUpdate->bind_param($types, ...$params);
    
        return $stmtUpdate->execute();
    }
    
    


    public function khoaNguoiDung($tenNguoiDung){
        $sql = "UPDATE tvu_nguoidung SET trangThai = 0 WHERE tenNguoiDung = ?";
        $stmt = $this->database->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param("s", $tenNguoiDung);
        return $stmt->execute();
    }

    public function dangNhap($tenNguoiDung, $matKhau) {
        $sql = "SELECT vaiTro ,trangThai, matKhau FROM tvu_nguoidung WHERE tenNguoiDung = ?";
        $stmt = $this->database->prepare($sql);

        $stmt->bind_param("s", $tenNguoiDung);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($matKhau, $row['matKhau'])) {
                if ($row['trangThai'] == 1) {
                    return [
                        "ketQua" => true,
                        "thongBao" => "Đăng nhập thành công.",
                        "vaiTro" => $row['vaiTro']
                    ];
                } else {
                    return [
                        "ketQua" => false,
                        "thongBao" => "Tài khoản của bạn đã bị khóa."
                    ];
                }
            } else {
                return [
                    "ketQua" => false,
                    "thongBao" => "Mật khẩu không đúng."
                ];
            }
        } else {
            return [
                "ketQua" => false,
                "thongBao" => "Tên đăng nhập không tồn tại."
            ];
        }
    }

    public function layDanhSachNguoiDung() {
        $sql = "SELECT * FROM tvu_nguoidung";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    public function layThongTinNguoiDung($tenNguoiDung) {
        $sql = "SELECT * FROM tvu_nguoidung WHERE tenNguoiDung = ?";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("s", $tenNguoiDung);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
