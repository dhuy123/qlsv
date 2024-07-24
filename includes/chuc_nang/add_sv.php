<?php
    include('db_conn/db_connection.php');

    $msg = FALSE;
    $error = FALSE;

    if(isset($_POST['submit'])){
        $insert="
        INSERT INTO tbl_sinhvien
        VALUES('" . $_POST['msv'] . "','" . $_POST['holot'] . "','" . $_POST['ten'] . "','" . $_POST['sodidong'] . "','" . $_POST['email'] . "','" . $_POST['mlcn'] . "')
        ";
        
        $query=$conn->query($insert);
        if($query===TRUE){
        $msg = TRUE;
        // Xoá giá trị các trường input sau khi submit thành công
        $_POST['msv'] = $_POST['holot'] = $_POST['ten'] = $_POST['sodidong'] = $_POST['email'] = $_POST['mlcn'] = '';
        
        }else{
        $error = TRUE;
        }
    }
?>