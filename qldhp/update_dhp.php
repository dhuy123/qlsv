<?php
include('./../db_conn/db_connection.php');

$msg = FALSE;
$error = FALSE;

if (isset($_POST['submit'])) {
    // Get values from the form
    $msv = $_POST['msv'];
    $mhp = $_POST['mhp'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    // Update the record in the database
    $update_sql = "UPDATE tbl_diemhocphan SET a=$a, b=$b, c=$c WHERE msv='$msv' AND mhp='$mhp'";
    
    if (mysqli_query($conn, $updatesql)){
        //in thong bao thanh cong
        //tro ve trang liet ke
    header("Location: dsach_dhp.php");
    }}
    ?>