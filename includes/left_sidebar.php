<!--
  THỰC ĐƠN TRÁI KHI CHƯA ĐĂNG NHẬP
-->
<div class="left-sidebar bg-black-300 box-shadow ">
  <div class="sidebar-content">
    <!-- NGƯỜI ĐĂNG NHẬP -->
    <?php
    include('left_sidebar_comp/user_info.php');
    ?>

    <div class="sidebar-nav">
      <ul class="side-nav color-gray">
        <!-- CATEGORY: THỐNG TIN -->
        <?php
        include('left_sidebar_comp/category_thong_tin.php');
        ?>

        <!-- CATEGORY: TRA CỨU -->
        <?php
        include('left_sidebar_comp/category_tra_cuu.php');
        ?>

      </ul>
    </div>
    <!-- /.sidebar-nav -->
  </div>
  <!-- /.sidebar-content -->
</div>