<?php

// Sử dụng hàm filter_input() để kiểm tra và lọc dữ liệu nhập vào
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Sử dụng hàm mysqli_real_escape_string() để ngăn chặn SQL injection
$conn = mysqli_connect("localhost", "username", "password", "example_db");
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Sử dụng hàm header() để ngăn chặn clickjacking
header("X-Frame-Options: DENY");

// Sử dụng hàm ini_set() để ngăn chặn hiển thị lỗi
ini_set('display_errors', '0');

// Sử dụng hàm session_regenerate_id() để ngăn chặn tấn công session fixation
session_start();
session_regenerate_id(true);
    


?>
