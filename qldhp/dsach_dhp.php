<?php
include('./../db_conn/db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN -- </title>
  <link rel="icon" type="../image/x-icon" href="../img/it-humg-favicon.ico">
  <!-- css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="../css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
  <link rel="stylesheet" type="../text/css" href="../js/DataTables/datatables.min.css" />
  <link rel="stylesheet" href="../css/main.css" media="screen">
  <script src="../js/modernizr/modernizr.min.js"></script>

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
</head>

<body>
 
  <div class="edit_sv">
    <section class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading">
                <div class="panel-title">
                
                <a href="./../index.php"> <input type="button" value="X" style="float: right; background-color: #dd3d36;"></a>
                  <h5>DANH SÁCH ĐIỂM HỌC PHẦN </h5> 
                  <br> <a href="./../index.php">Trang chủ |</a>
                  <a href="add_dhp.php" onclick="hienThemSV()"> <input type="button" value="thêm điểm học phần "></a>
                </div>
              </div>
              <div class="panel-body p-20">
                <table id="dssv" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mã sinh viên</th>
                      <th>Tên sinh viên</th>
                      <th>Mã học phần</th>
                      <th>Tên học phần</th>
                      <th>Điểm A</th>
                      <th>Điểm B</th>
                      <th>Điểm C</th>
                      <th>Điểm tổng học phần</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                
                    <!-- hiển thị kết quả truy vấn ở đây -->
                    <?php
                    #-- câu lệnh SQL -->
                    $sql = "SELECT 
                  dhp.msv,
                  CONCAT(sv.ho_lot, ' ', sv.ten) AS hoten,
                  dhp.mhp,
                  hp.ten_hocphan,dhp.a,dhp.b,dhp.c,(0.6*dhp.a + 0.3*dhp.b + 0.1*dhp.c) as tongdiem
              FROM tbl_diemhocphan dhp
              INNER JOIN tbl_sinhvien sv ON dhp.msv = sv.msv
              INNER JOIN tbl_hocphan hp ON dhp.mhp = hp.mhp;
              ";
                    #-- truy vấn dữ liệu -->
                    $query = $conn->query($sql);
                    $count = 1;
                    if ($query->num_rows > 0) {
                      while ($row = $query->fetch_assoc()) {
                    ?>
                     <tr>
                          <td><?php echo htmlentities($count); ?></td>
                          <td><?php echo htmlentities($row['msv']); ?></td>
                          <td><?php echo htmlentities($row['hoten']); ?></td>
                          <td><?php echo htmlentities($row['mhp']); ?></td>
                          <td><?php echo htmlentities($row['ten_hocphan']); ?></td>
                          <td><?php echo htmlentities($row['a']); ?></td>
                          <td><?php echo htmlentities($row['b']); ?></td>
                          <td><?php echo htmlentities($row['c']); ?></td>
                          <td><?php echo htmlentities($row['tongdiem']); ?></td>

                          <td>
                            <a class="btn btn-info btn-sm" href="sua_dhp.php?smsv=<?php echo $row['msv'] ?>&smhp=<?php echo $row['mhp']; ?>"><i class="fa fa-edit" title="Sửa"></i></a>
                            |
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xoá điểm sinh viên này không');" href="xoa_dhp.php?msv=<?php echo $row['msv'] ?>&mhp=<?php echo $row['mhp']; ?>"><i class="fa fa-trash" title="Xoá"></i></a>
                          </td>
                        </tr>

                    <?php
                        $count = $count + 1;
                      }
                    }
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.section -->


    <!-- js -->
    <!-- ========== COMMON JS FILES ========== -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/pace/pace.min.js"></script>
    <script src="../js/lobipanel/lobipanel.min.js"></script>
    <script src="../js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="../js/prism/prism.js"></script>
    <script src="../js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
      $(function($) {
        $('#dssv').DataTable({
          language: {
            info: 'Trang số _PAGE_!',
            lengthMenu: 'Hiển thị _MENU_ kết quả trên một trang.',
            search: 'Tìm kiếm: ',
            paginate: {
              next: "Trang sau",
              previous: "Trang trước",
            }
          }
        });

        /*
              $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
              });

              $('#example3').DataTable();
        */
      });
    </script>
    <script>
      function hiends() {
        $('.section').show();
        $('.edit_sv').show();
      }
    </script>
</body>

</html>
</div>