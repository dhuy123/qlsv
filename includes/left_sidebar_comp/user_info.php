<?php
// sql
  //sv
  // require_once '.\db_conn\db_connection.php';
  // $result_cn = mysqli_query($conn,'SELECT tbl_sinhvien.holot, tbl_sinhvien.ten, tbl_lopchuyennganh.tenlop
  // FROM tbl_sinhvien
  // JOIN tbl_lopchuyennganh ON tbl_sinhvien.mlcn = tbl_lopchuyennganh.mlcn;
  // ');
  // $row = $result_cn->fetch_assoc();
  // $ht_sv = $row['holot'] . ' ' . $row['ten'];
  // $lopcn = $row['tenlop'];
  //qtv

if(isset($_SESSION['uid']) && (trim($_SESSION['uid']) != '')){
$sv = '
<div class="user-info closed">
  <img src="img/student.jpg" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h6 class="title">SINH VIÊN</h6>
  <small class="info">'. $_SESSION["uid"] .'</small><br>
</div>
';
$qtv = '
<div class="user-info closed">
  <img src="img/admin.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h6 class="title">QUẢN TRỊ VIÊN</h6>
  <small class="info">' . $_SESSION["uid"] . '</small><br></div>';
$gv = '
<div class="user-info closed">
  <img src="img/lecturer.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
  <h6 class="title">GIẢNG VIÊN</h6>
  <small class="info">'. $_SESSION["uid"] .'</small><br>
</div>
';
}
if(isset($_SESSION['uid']) && (trim($_SESSION['uid']) != '')){
  switch ($_SESSION['urole']) {
    case 'SV':
      echo $sv;
      break;

    case 'gv':
      echo $gv;
      break;

    default:
      echo $qtv;
      break;
  }
}else{
  echo '
  <div class="user-info closed">
    <img src="img/guest.png" alt="ERROR!" class="img-circle profile-img" width="90px" height="90px">
    <h6 class="title">KHÁCH VÃNG LAI</h6>
  </div>
  ';
}
?>