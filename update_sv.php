<?php
//nhan du lieu tu form
$msv=$_POST['msv'];
$holot = $_POST['holot'];
$ten = $_POST['ten'];
$sodidong = $_POST['sodidong'];
$email = $_POST['email'];
$mlcn=$_POST['mlcn'];
//ket noi csdl
include('db_conn/db_connection.php');
//viet lenh sql de them du lieu
$updatesql = "UPDATE tbl_sinhvien SET msv='$msv', holot= '$holot', ten='$ten' , sodidong='$sodidong',email='$email',mlcn='$mlcn' WHERE msv=$msv";
//echo $updatesql; exit;
//thuc thi cau lenh them
if (mysqli_query($conn, $updatesql)){
    //in thong bao thanh cong
    //tro ve trang liet ke
header("Location: bai_thuc_hanh_3.php");
}

