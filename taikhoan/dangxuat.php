<?php

session_start();
unset($_SESSION['tenNguoiDung']);
unset($_SESSION['vaiTro']);
header("Location: dangnhap.php");
exit();

?>