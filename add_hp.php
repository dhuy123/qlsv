<?php
include('db_conn/db_connection.php');

// Truy vấn cơ sở dữ liệu để lấy danh sách các trường
$sql = "SELECT * FROM tbl_hocphan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>

    <!-- favico -->
    <link rel="icon" type="image/x-icon" href="img/it-humg-favicon.ico">

    <!-- css -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
</head>

<body>

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                            <a href="index.php"> <input type="button" value="X" style="float: right; background-color: #dd3d36;"></a>
                                <h5>Thêm học phần mới</h5>
                            </div>
                            <a href="index.php"  style="margin-left: 20px;"> Trang Chủ |</a>
                            <a href="dsach_hp.php"><button type="button" style="margin-left: px;"> Danh sách học phần</button></a>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="add_hp.php">
                                <!-- nhập thông tin -->
                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Mã học phần : </label>
                                    <div class="">
                                        <input type="text" name="mhp" class="form-control" required="required" id="success">
                                        <span class="help-block">* không để trống.</span>
                                    </div>
                                </div>
                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Tên Học phần : </label>
                                    <div class="">
                                        <input type="text" name="tenhocphan" required="required" class="form-control" id="success">
                                        <span class="help-block">* không để trống.</span>
                                    </div>
                                </div>
                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Tín chỉ : </label>
                                    <div class="">
                                        <input type="text" name="tinchi" required="required" class="form-control" id="success">
                                        <span class="help-block">* không để trống .</span>
                                    </div>

                                    <!-- gửi thông tin sang phía máy chủ -->
                                    <div class="form-group has-success">
                                                            <div class="">
                                                                <button type="submit" name="submit" class="btn btn-success btn-labeled">Thêm mới<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            </div>
                                                        </div>
                                                </form>
                            <?php


                            if (isset($_POST['submit'])) {
                                // Lấy dữ liệu từ form
                                $mhp = $_POST['mhp'];
                                $tenhocphan = $_POST['tenhocphan'];
                                $tinchi = $_POST['tinchi'];

                                // Thực hiện truy vấn thêm mới học phần
                                $insert = "INSERT INTO tbl_hocphan (mhp, tenhocphan, tinchi) VALUES ('$mhp', '$tenhocphan', '$tinchi')";
                                $result = $conn->query($insert);

                                if ($result === TRUE) {
                                    echo "Thêm mới học phần thành công!";
                                    
                                } else {
                                    echo "Lỗi khi thêm mới học phần: " . $conn->error;
                                }
                               // Chuyển hướng đến trang khác hoặc làm bất kỳ điều gì bạn cần
                              //  header('Location: dsach_hp.php');
                               // exit;
                            }
                            ?>

</body>

</html>