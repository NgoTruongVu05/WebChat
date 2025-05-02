<?php
class NguoiDung
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function themNguoiDung($tenNguoiDung, $matKhau, $email, $soDienThoai, $gioiTinh, $ngaySinh, $vaiTro, $trangThai, $gioiThieu){
        $sql = "INSERT INTO tvu_nguoidung(tenNguoiDung, matKhau, email, soDienThoai, gioiTinh, ngaySinh, gioiThieu, vaiTro, trangThai)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param("sssssssii", $tenNguoiDung, $matKhau, $email, $soDienThoai, $gioiTinh, $ngaySinh, $gioiThieu, $vaiTro, $trangThai);
        return $stmt->execute();
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
}
