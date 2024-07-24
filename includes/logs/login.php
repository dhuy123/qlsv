<?php
include('./../../db_conn/db_connection.php');


#-- lấy thông tin đăng nhập --
$uid = $_POST['uid'];
$upwd = $_POST['upwd'];

session_start();
#-- kiểm tra xác thực tài khoản --
$sql = "
  SELECT * 
  FROM users
  WHERE uid='" . $uid . "' AND upwd='" . $upwd . "';";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $loguser = $result->fetch_assoc();
    $_SESSION['uid'] = $loguser['uid'];
    $_SESSION['urole'] = $loguser['urole'];  
}
 
header('location: ../../index.php');
?>