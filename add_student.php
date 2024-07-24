<?php
include('db_conn/db_connection.php');

$msg = FALSE;
$error = FALSE;

if (isset($_POST['submit'])) {
  $insert = "
    INSERT INTO tbl_sinhvien
    VALUES('" . $_POST['msv'] . "','" . $_POST['holot'] . "','" . $_POST['ten'] . "','" . $_POST['sodidong'] . "','" . $_POST['email'] . "','" . $_POST['mlcn'] . "')
    ";

  $query = $conn->query($insert);
  if ($query === TRUE) {
    $msg = TRUE;
    // Xoá giá trị các trường input sau khi submit thành công
    $_POST['msv'] = $_POST['holot'] = $_POST['ten'] = $_POST['sodidong'] = $_POST['email'] = $_POST['mlcn'] = '';
  } else {
    $error = TRUE;
  }
}
?>
<script>
  function hienThemSV() {
    $('.thongke').hide();
    $('.add_student').show();
  }
</script>
<style>
  .add_student {
    display: none;
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
            <a href="./index.php"> Trang Chủ |</a>
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
                    $sql = "
  SELECT *
  FROM tbl_lopchuyennganh
";

                    $query = $conn->query($sql);
                    if ($query->num_rows > 0) {
                      while ($row = $query->fetch_assoc()) {
                        $lcn = $row['mlcn'] . ' - ' . $row['tenlop'];
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
            if ($msg === TRUE) {
              $msg = FALSE;
              // ... Code xử lý thêm sinh viên ...

              // Đặt thông báo vào Session
              session_start();
              $_SESSION['submit'] = "Thêm sinh viên thành công";

              // Chuyển hướng đến trang khác hoặc làm bất kỳ điều gì bạn cần
              header('Location: index.php');
              exit();

            ?>

              <div class="alert alert-success left-icon-alert" role="alert">
                echo' <strong>THÊM MỚI THÀNH CÔNG!</strong>';
              </div>

            <?php
            } elseif ($error === TRUE) {
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