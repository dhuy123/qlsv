<!--
  THỰC ĐƠN TRÁI KHI ĐĂNG NHẬP LÀ SINH VIÊN
-->
<div class="left-sidebar bg-black-300 box-shadow ">
  <div class="sidebar-content">
    <!-- NGƯỜI ĐĂNG NHẬP -->
    <?php
    include('includes/left_sidebar_comp/user_info.php');
    ?>

    <div class="sidebar-nav">
      <ul class="side-nav color-gray">
        <!-- CATEGORY: THỐNG TIN -->
        <?php
        include('includes/left_sidebar_comp/category_thong_tin.php');
        ?>

        <!-- CATEGORY: TRA CỨU -->
        <?php
        include('includes/left_sidebar_comp/category_tra_cuu.php');
        ?>

        <!-- CATEGORY: TÀI NGUYÊN -->
        <?php
        // include('includes/left_sidebar_comp/category_tai_nguyen.php');
        ?>

        <!-- CATEGORY: THIẾT LẬP -->
        <?php
        include('includes/left_sidebar_comp/category_thiet_lap.php');
        ?>
      </ul>
    </div>
    <!-- /.sidebar-nav -->
  </div>
  <!-- /.sidebar-content -->
</div>