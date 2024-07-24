<?php
include('./../db_conn/db_connection.php');

// Truy vấn cơ sở dữ liệu để lấy danh sách các trường
$sql = "SELECT * FROM tbl_diemhocphan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>

    <!-- favico -->
    <link rel="icon" type="../image/x-icon" href="../img/it-humg-favicon.ico">

    <!-- css -->
    <link rel="icon" href="../favicon.ico" type="../image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="../css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="../css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="../css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="../css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="../css/main.css" media="screen">
</head>

<body>

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                            <a href="./../index.php"> <input type="button" value="X" style="float: right; background-color: #dd3d36;"></a>
                                <h5>Nhập Điểm </h5>
                            </div>
                            <a href="./../index.php" style="margin-left: 20px;"> Trang chủ |</a>
                            <a href="./dsach_dhp.php"><button type="button" style="margin-left: 0px;"> Danh sách điểm học phần </button></a>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="add_dhp.php">
                                <!-- nhập thông tin -->
                                <!-- <div class="form-group has-success">
                                    <label for="success" class="control-label">Mã Sinh Viên : </label>
                                    <div class="">
                                        <input type="text" name="msv" class="form-control" required="required" id="success" value=" <?php echo $row['msv']  ?>">
                                        <span class="help-block">* không để trống.</span>
                                    </div>
                                </div> -->
                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Mã Sinh Viên : </label>
                                    <div class="">
                                        <select name="msv" class="form-control" id="default" required="required" onchange="displayStudentInfo()">
                                            <?php
                                            $sql = "SELECT * FROM tbl_sinhvien";
                                            $query = $conn->query($sql);

                                            
                                            if ($query->num_rows > 0) {
                                                while ($row = $query->fetch_assoc()) {
                                                    $msv = $row['msv'];
                                                    $hoten = $row['holot'] . ' ' . $row['ten'];
                                            ?>
                                                    <option value="<?php echo htmlentities($msv); ?>"     data-hoten="<?php echo htmlentities($hoten); ?>">
                                                    
                                                        <?php echo htmlentities($msv); ?>
                                                    
                                                    </option>
                                                    
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block">Chọn đúng mã sinh viên.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tensinhvien">Tên Sinh Viên </label>
                                    <input type="text" id="tensinhvien_dhp" class="form-control" name="tensinhvien" readonly value=<?php echo "HoàngMinhQuang"; ?> >
                                </div>
                                <script>
                                    function displayStudentInfo() {
                                        var dropdown = document.getElementById("default");
                                        var selectedOption = dropdown.options[dropdown.selectedIndex];
                                        var hoten = selectedOption.getAttribute("data-hoten");

                                        document.getElementById("tensinhvien_dhp").value = hoten;
                                    }
                                </script>
                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Mã Học Phần : </label>
                                    <div class="">
                                        <select name="mhp" class="form-control" id="default_hocphan" required="required" onchange="displayHocPhanInfo()">
                                            <?php
                                            $sql = "SELECT * FROM tbl_hocphan";
                                            $query = $conn->query($sql);
                                            if ($query->num_rows > 0) {
                                                while ($row = $query->fetch_assoc()) {
                                                    $mhp = $row['mhp'];
                                                    $tenhocphan = $row['tenhocphan'];
                                            ?>
                                                    <option value="<?php echo htmlentities($mhp); ?>" data-tenhocphan="<?php echo htmlentities($tenhocphan); ?>">
                                                        <?php echo htmlentities($mhp); ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block">Chọn đúng mã học phần.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tenhocphan">Tên Học Phần </label>
                                    <input type="text" id="tenhocphan_dhp" class="form-control" name="tenhocphan" readonly value=<?php echo "IOT" ?>>
                                </div>
                                <script>
                                    function displayHocPhanInfo() {
                                        var dropdown = document.getElementById("default_hocphan");
                                        var selectedOption = dropdown.options[dropdown.selectedIndex];
                                        var tenhocphan = selectedOption.getAttribute("data-tenhocphan");

                                        document.getElementById("tenhocphan_dhp").value = tenhocphan;
                                    }
                                </script>




                                <div class="form-group has-success">
                                    <label for="success" class="control-label">Điểm A : </label>
                                    <div class="">
                                        <input type="text" name="a" required="required" class="form-control" id="success">
                                        <span class="help-block">* không để trống .</span>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="success" class="control-label">Điểm B: </label>
                                        <div class="">
                                            <input type="text" name="b" required="required" class="form-control" id="success">
                                            <span class="help-block">* không để trống .</span>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Điểm C: </label>
                                            <div class="">
                                                <input type="text" name="c" required="required" class="form-control" id="success">
                                                <span class="help-block">* không để trống .</span>
                                            </div>

                                            <!-- gửi thông tin sang phía máy chủ -->
                                            <div class="form-group has-success">
                                                <div class="">
                                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Nhập Điểm <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                </div>
                                            </div>
                            </form>
                           <?php 
 
 
 
 
 
 if (isset($_POST['submit'])) {
     // Lấy dữ liệu từ form
     $msv = $_POST['msv'];
     $mhp = $_POST['mhp'];
     $a = $_POST['a'];
     $b = $_POST['b'];
     $c = $_POST['c'];
 
     // Kiểm tra xem sinh viên có tồn tại trong bảng tbl_sinhvien không
     $checkStudent = "SELECT * FROM tbl_sinhvien WHERE msv = '$msv'";
     $resultStudent = $conn->query($checkStudent);
 
     // Kiểm tra xem học phần có tồn tại trong bảng tbl_hocphan không
     $checkCourse = "SELECT * FROM tbl_hocphan WHERE mhp = '$mhp'";
     $resultCourse = $conn->query($checkCourse);
 
     if ($resultStudent->num_rows > 0 && $resultCourse->num_rows > 0) {
         // Sinh viên và học phần tồn tại, thực hiện thêm điểm
         $themsql = "INSERT INTO tbl_diemhocphan (msv, mhp, a, b, c) VALUES ('$msv', '$mhp', $a, $b, $c)";
 
         if (mysqli_query($conn, $themsql)) {
            echo $_SESSION['success_message'] = 'Thêm điểm học phần thành công';
            
         }
         
          //   header("Location: dsach_dhp.php");
             //      exit();
        }}
        
    ?>
   


</body>

</html>