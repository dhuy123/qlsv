<div class = "thongke">
  <style>
    .thongke{
      display: none;
    }
  </style>
  <!-- xử lí thống kê -->
  <!-- Tổng sinh viên -->
  <div>
<?php
    include 'db_conn/db_connection.php';
    // Thực hiện truy vấn
    $sql = "SELECT COUNT(*) as TongSinhVien FROM tbl_sinhvien";
    $result = $conn->query($sql);
    // Lấy dữ liệu từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $totalStudents = $row['TongSinhVien'];
    
//  Tổng học phần 
    // Thực hiện truy vấn
    $sql_hp = "SELECT COUNT(*) as TongHP FROM tbl_hocphan";
    $result_hp = $conn->query($sql_hp);
    // Lấy dữ liệu từ kết quả truy vấn
    $row_hp = $result_hp->fetch_assoc();
    $totalHocphan = $row_hp['TongHP'];

//  Tổng các lớp chuyên ngành 
    // Thực hiện truy vấn
    $sql_cn = "SELECT COUNT(*) as Tonghocphan FROM tbl_hocphan";
    $result_cn = $conn->query($sql_cn);
    // Lấy dữ liệu từ kết quả truy vấn
    $row_cn = $result_cn->fetch_assoc();
    $totalChuyenNganh = $row_cn['Tonghocphan'];

    

// Tổng các sv xuất sắc 
    // Thực hiện truy vấn
    $sql_dhp = "SELECT DISTINCT COUNT(*) AS tong FROM tbl_diemhocphan WHERE (a*0.6+b*0.3+c*0.1) >=8;";
    $result_dhp = $conn->query($sql_dhp);
    // Lấy dữ liệu từ kết quả truy vấn
    $row_dhp = $result_dhp->fetch_assoc();
    $totalDiemHocPhan = $row_dhp['tong'];
?>
</div>
            <!--== main-page: thanh điều hướng ==-->
            <div class="container-fluid">
              <div class="row page-title-div">
                <div class="col-md-6">
                  <h2 class="title">THÔNG TIN</h2>
                </div>

                <!-- /.col-md-6 text-right -->
              </div>
              <!-- /.row -->
              <div class="row breadcrumb-div">
                <div class="col-md-6">
                  <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
                    <li class="active">Thống kê</li>
                  </ul>
                </div>

              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <!--== main-page: nội dung ==-->

            <section class="section">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-primary" >
                    <span class="number counter"><?php echo $totalStudents; ?></span>
                      
                      <span class="name">SINH VIÊN</span>
                      <span class="bg-icon"><i class="fa fa-users"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                  </div>
                  <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                  
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-danger" >
                      <span class="number counter"><?php echo $totalHocphan; ?></span>
                      <span class="name">HỌC PHẦN</span>
                      <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                  </div>
                  <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-warning">
                      <span class="number counter"><?php echo $totalChuyenNganh; ?></span>
                      <span class="name">LỚP HỌC PHẦN </span>
                      <span class="bg-icon"><i class="fa fa-bank"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                  </div>
                  <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-success">
                      <span class="number counter"><?php echo $totalDiemHocPhan; ?></span>
                      <span class="name">SINH VIÊN XUẤT XẮC</span>
                      <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                  </div>
                  <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                  <script>
              function hienthongke() {
                $('.add_student').hide();
                $('.tra_cuu_msv').hide();
                $('.add_hp').hide();
                $('.thongke').show();
              }
                  </script>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
            <!-- /.section -->
          </div>
        </div>
      </div>
    </div>
  </div>

    