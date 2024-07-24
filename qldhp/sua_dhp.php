<?php
include('./../db_conn/db_connection.php');

$msg = FALSE;
$error = FALSE;
$msv = $_GET['smsv'];
$mhp = $_GET['smhp'];

//ket noi


//cau lenh de lay thong ve ve sinh vien co id = $id
$edit_sql = "SELECT * FROM tbl_diemhocphan WHERE msv='$msv' AND  mhp='$mhp' ";

$result = mysqli_query($conn, $edit_sql);

$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>
  <link rel="icon" type="../image/x-icon" href="../img/it-humg-favicon.ico">

  <!-- css -->
  <link rel="stylesheet" href="../css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="../css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" href="../css/main.css" media="screen">
  <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>
  <style>
    span .help-block {
      color: red;
    }

    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>
  <section class="section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a href="./../index.php"> <input type="button" value="X" style="float: right; background-color: #dd3d36;"></a>
                <h5>SỬA HỌC PHẦN SINH VIÊN</h5>
                <button type="button"><a href="./dsach_dhp.php">Trở lại trang </a></button>
              </div>
            </div>
            <div class="panel-body">
              <form method="post" action="update_dhp.php">
                <!-- nhập thông tin -->

                <div class="form-group has-success">
                  <label for="success" class="control-label">Mã Sinh Viên : </label>
                  <div class="">
                    <select name="mlcn" class="form-control" id="default" required="required" onchange="displayStudentInfo()">
                      <?php
                      $sql = "SELECT * FROM tbl_sinhvien";
                      $query = $conn->query($sql);


                      if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                          $msv = $row['msv'];
                          $hoten = $row['holot'] . ' ' . $row['ten'];
                      ?>
                          <option value="<?php echo htmlentities($msv); ?>" data-hoten="<?php echo htmlentities($hoten); ?>">
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
                  <input type="text" id="tensinhvien_dhp" class="form-control" name="tensinhvien" readonly <?php echo htmlentities($hoten); ?> value=<?php echo "HoàngMinhQuang"; ?>>
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
                    <select name="mlcn" class="form-control" id="default_hocphan" required="required" onchange="displayHocPhanInfo()">
                      <?php
                      $sql = "SELECT * FROM tbl_hocphan";
                      $query = $conn->query($sql);
                      if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                          $mhp = $row['mhp'];
                          $tenhocphan = $row['tenhocphan'];
                      ?>
                          <option value="<?php echo htmlentities($mhp); ?>" data-tenhocphan="<?php echo htmlentities($tenhocphan); ?> ">
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
                  <input type="text" id="tenhocphan_dhp" class="form-control" name="tenhocphan" readonly value=<?php echo "IOT"; ?>>
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
                      <input type="text" name="b" required="required" class="form-control" id="success" >
                      <span class="help-block">* không để trống .</span>
                    </div>
                    <div class="form-group has-success">
                      <label for="success" class="control-label">Điểm C: </label>
                      <div class="">
                        <input type="text" name="c" required="required" class="form-control" id="success" >
                        <span class="help-block">* không để trống .</span>
                      </div>




                      <!-- gửi thông tin sang phía máy chủ -->
                      <div class="form-group has-success">
                        <div class="">
                          <button type="submit" name="submit" class="btn btn-success btn-labeled">UPDATE<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                        </div>
                      </div>
              </form>

              <?php
              if ($msg === TRUE) {
              ?>

                <div class="alert alert-success left-icon-alert" role="alert">
                  <strong>UPDATE THÀNH CÔNG!</strong>
                </div>

              <?php
              } elseif ($error === TRUE) {
              ?>

                <div class="alert alert-danger left-icon-alert" role="alert">
                  <strong>THÊM MỚI THẤT BẠI!</strong>
                </div>

              <?php
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>