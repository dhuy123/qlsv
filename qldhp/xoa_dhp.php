<?php
//lay du lieu id can xoa
$svid = $_GET['msv'];
$smhp = $_GET['mhp'];
// echo $id;
//ket noi
include('./../db_conn/db_connection.php');
//cau lenh sql 
$xoa_sql = "DELETE FROM tbl_diemhocphan WHERE msv=$svid AND mhp=$smhp";

mysqli_query($conn, $xoa_sql);
echo "<h1>Xoa thanh cong</h1>";
//tro ve trang liet ke
header("Location: dsach_dhp.php");