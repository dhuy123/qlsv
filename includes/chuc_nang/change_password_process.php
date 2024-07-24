<?php
// includes/chuc_nang/doi_mat_khau.php

// Kết nối đến cơ sở dữ liệu và kiểm tra session/người dùng đăng nhập (đảm bảo đã thực hiện đúng cách)
include('../../db_conn/db_connection.php');
session_start();
if (!isset($_SESSION['uid'])) {
  echo "Vui lòng đăng nhập trước khi đổi mật khẩu.";
  exit;
}

// Lấy thông tin từ form
$matKhauCu = $_POST['matKhauCu'];
$matKhauMoi = $_POST['matKhauMoi'];
$xacNhanMatKhauMoi = $_POST['xacNhanMatKhauMoi'];
$uid = $_SESSION['uid']; // Gán giá trị cho $uid từ session

// Kiểm tra mật khẩu cũ
$sql = "SELECT * FROM users WHERE uid = '$uid' AND upwd = '$matKhauCu'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mật khẩu cũ đúng, kiểm tra và cập nhật mật khẩu mới
  if ($matKhauMoi == $xacNhanMatKhauMoi) {
    $sqlUpdate = "UPDATE users SET upwd = '$matKhauMoi' WHERE uid = '$uid'";
    if ($conn->query($sqlUpdate) === TRUE) {
      echo "Đổi mật khẩu thành công.";
    } else {
      echo "Lỗi khi cập nhật mật khẩu mới: " . $conn->error;
    }
  } else {
    echo "Mật khẩu mới và xác nhận mật khẩu mới không khớp.";
  }
} else {
  echo "Mật khẩu cũ không đúng.";
}

// Đóng kết nối
$conn->close();
?>