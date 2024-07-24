<!--
  THỰC ĐƠN TRÁI KHI ĐĂNG NHẬP LÀ QUẢN TRỊ VIÊN
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

        <!-- CATEGORY: QUẢN LÍ -->
        <li class="nav-header">
          <span class="">QUẢN LÍ</span>
        </li>
        <?php
        include('includes/left_sidebar_comp/mnu_qlsv.php');
        include('includes/left_sidebar_comp/mnu_qlhp.php');
        include('includes/left_sidebar_comp/mnu_qldhp.php');
        
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
