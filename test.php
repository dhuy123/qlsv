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
  <link rel="stylesheet" href="../../css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="../../css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="../../css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="../../css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="../../css/toastr/toastr.min.css" media="screen">
  <link rel="stylesheet" href="../../css/icheck/skins/line/blue.css">
  <link rel="stylesheet" href="../../css/icheck/skins/line/red.css">
  <link rel="stylesheet" href="../../css/icheck/skins/line/green.css">
  <link rel="stylesheet" href="../../css/main.css" media="screen">

</head>

<body class="top-navbar-fixed">
  <!-- html -->
  <div class="main-wrapper">
    <?php include('../includes/admin_ui/admin_nav_bar.php'); ?>

    <div class="content-wrapper">
      <div class="content-container">
        <?php include('../includes/admin_ui/admin_left_sidebar.php'); ?>
        <div class="main-page" id = "main-page">

        <div class="add_student">
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
  <script>
        function hienThemSV() {
          $('.thongke').hide();
        }
  </script>
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
              <div class="panel-title">
                <h5>Thêm Sinh viên mới</h5>
              </div>
            </div>
            <div class="panel-body">
              <form method="post">
                <!-- nhập thông tin -->
                <div class="form-group has-success">
                  <label for="success" class="control-label">Mã sinh viên: </label>
                  <div class="">
                    <input type="text" name="msv" class="form-control" required="required" id="success">
                    <span class="help-block">Lưu ý: Mã sinh viên có 10 kí tự.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Họ lót: </label>
                  <div class="">
                    <input type="text" name="holot" required="required" class="form-control" id="success">
                    <span class="help-block">Bao gồm họ và tên đệm.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Tên: </label>
                  <div class="">
                    <input type="text" name="ten" required="required" class="form-control" id="success">
                    <span class="help-block">Không bao gồm tên đệm.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Số di động: </label>
                  <div class="">
                    <input type="text" name="sodidong" class="form-control" required="required" id="success">
                    <span class="help-block">Không bao gồm mã vùng miền.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Email: </label>
                  <div class="">
                    <input type="text" name="email" class="form-control" required="required" id="success">
                    <span class="help-block">Email sinh viên của trường đại học Mỏ-Địa chất.</span>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label for="success" class="control-label">Lớp chuyên nghành: </label>
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
                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Thêm mới<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                  </div>
                </div>
              </form>

<?php 
if($msg===TRUE){
  $msg = FALSE;
?>

              <div class="alert alert-success left-icon-alert" role="alert">
                <strong>THÊM MỚI THÀNH CÔNG!</strong>
              </div>

<?php  
}elseif($error===TRUE){
  $error = FALSE;
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
</div>

        </div>
      </div>
    </div>
  </div>



  <!-- js lib -->
  <script src="../../js/modernizr/modernizr.min.js"></script>

  <script src="../../js/jquery/jquery-2.2.4.min.js"></script>
  <script src="../../js/jquery-ui/jquery-ui.min.js"></script>
  <script src="../../js/bootstrap/bootstrap.min.js"></script>
  <script src="../../js/pace/pace.min.js"></script>
  <script src="../../js/lobipanel/lobipanel.min.js"></script>
  <script src="../../js/iscroll/iscroll.js"></script>

  <script src="../../js/prism/prism.js"></script>
  <script src="../../js/waypoint/waypoints.min.js"></script>
  <script src="../../js/counterUp/jquery.counterup.min.js"></script>
  <script src="../../js/amcharts/amcharts.js"></script>
  <script src="../../js/amcharts/serial.js"></script>
  <script src="../../js/amcharts/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="../../js/amcharts/plugins/export/export.css" type="text/css" media="all" />
  <script src="../../js/amcharts/themes/light.js"></script>
  <script src="../../js/toastr/toastr.min.js"></script>
  <script src="../../js/icheck/icheck.min.js"></script>

  <script src="../../js/main.js"></script>
  <script src="../../js/production-chart.js"></script>
  <script src="../../js/traffic-chart.js"></script>
  <script src="../../js/task-list.js"></script>
  <script>
    $(function() {
      // Counter for dashboard stats
      $('.counter').counterUp({
        delay: 10,
        time: 1000
      });

      // Welcome notification
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      toastr["success"]("Chào mừng đến trang quản trị !");
    });
  </script>
</body>

</html>