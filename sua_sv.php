<?php
include('db_conn/db_connection.php');

$msg = FALSE;
$error = FALSE;

$msv = $_GET['msv'];

//ket noi


//cau lenh de lay thong ve ve sinh vien co id = $id
$edit_sql = "SELECT * FROM tbl_sinhvien WHERE msv=$msv";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>
  <link rel="icon" type="image/x-icon" href="img/it-humg-favicon.ico">
  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" href="css/main.css" media="screen">
  <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>
  <style>
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
              <div class="panel-title" >
              <a href="index.php"> <input type="button" value="X" style="float: right; background-color: #dd3d36;"></a>
                <h5 >SỬA THÔNG TIN SINH VIÊN</h5>
                <button type="button"><a href="./bai_thuc_hanh_3.php">Trở lại trang </a></button>
              </div>
            </div>
            <div class="panel-body">
              <form method="post" action="update_sv.php">
                <!-- nhập thông tin -->
                <div class="form-group has-success">
                  <label for="success" class="control-label">Mã sinh viên: </label>
                  <div class="">
                    <input type="text" name="msv" class="form-control" required="required" id="success" value="<?php echo $row['msv']?>">
                    <span class="help-block">Lưu ý: Mã sinh viên có 10 kí tự.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Họ lót: </label>
                  <div class="">
                    <input type="text" name="holot" required="required" class="form-control" id="success" value="<?php echo $row['holot']?>">
                    <span class="help-block">Bao gồm họ và tên đệm.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Tên: </label>
                  <div class="">
                    <input type="text" name="ten" required="required" class="form-control" id="success" value="<?php echo $row['ten']?>">
                    <span class="help-block">Không bao gồm tên đệm.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Số di động: </label>
                  <div class="">
                    <input type="text" name="sodidong" class="form-control" required="required" id="success" value="<?php echo $row['sodidong']?>">
                    <span class="help-block">Không bao gồm mã vùng miền.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Email: </label>
                  <div class="">
                    <input type="text" name="email" class="form-control" required="required" id="success"  value="<?php echo $row['email'];?>">
                    <span class="help-block">Email sinh viên của trường đại học Mỏ-Địa chất.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Lớp chuyên nghành: </label  value="<?php echo $row['mlcn']?>">
                  <div class="">
                    <select name="mlcn" class="form-control" id="default" required="required">
                      
<?php
$sql="
  SELECT *
  FROM tbl_lopchuyennganh
";

$query = $conn->query($sql);
if($query->num_rows > 0){
  while($row = $query->fetch_assoc()){
    $lcn=$row['mlcn'] . ' - ' . $row['tenlop'];
?>

                      <option value="<?php echo htmlentities($row['mlcn']); ?>">
                        <?php echo htmlentities($lcn); ?>
                      </option>

<?php
  }
}
?>
                    </select>
                    <span class="help-block">Chọn đúng tên lớp chuyên nghành.</span>
                  </div>
                </div>

                <!-- gửi thông tin sang phía máy chủ -->
                <div class="form-group has-success">
                  <div class="">
                    <button type="submit" name="submit" class="btn btn-success btn-labeled">UPDATE<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                  </div>
                </div>
              </form>

<?php 
if($msg===TRUE){
?>

              <div class="alert alert-success left-icon-alert" role="alert">
                <strong>UPDATE THÀNH CÔNG!</strong>
              </div>

<?php  
}elseif($error===TRUE){
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