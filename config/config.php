<?php
require ('db.inc');
$database = new mysqli($servername, $username, $password, $dbname);
if ($database->connect_error) {
    die("Kết nối thất bại: " . $database->connect_error);
}
?>