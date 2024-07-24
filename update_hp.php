<?php
//nhan du lieu tu form
$mhp=$_POST['mhp'];
$tenhocphan = $_POST['tenhocphan'];
$tinchi = $_POST['tinchi'];

//ket noi csdl
include('db_conn/db_connection.php');
//viet lenh sql de them du lieu
$updatesql = "UPDATE tbl_hocphan SET mhp='$mhp', tenhocphan= '$tenhocphan', tinchi='$tinchi'  WHERE mhp=$mhp";
//echo $updatesql; exit;
//thuc thi cau lenh them
if (mysqli_query($conn, $updatesql)){
    //in thong bao thanh cong
    //tro ve trang liet ke
header("Location: dsach_hp.php");
}

