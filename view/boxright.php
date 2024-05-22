<div class="boxright">

  <div class="mb">
    <?php
    if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
      extract($_SESSION['user']);
      ?>
      <div class="box_title">TÀI KHOẢN:
        <b>
          <?= $user ?>
        </b>
      </div>
      <br>
      <li class=""><a href="xshop.php?act=quenmk">Quên mật khẩu</a></li>
      <li class=""><a href="xshop.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
      <?php
      if ($role == 1) {
        ?>
        <li class=""><a href="admin/index.php">Đăng nhập Admin</a></li>
        <?php
      }
      ?>
      <li class=""><a href="xshop.php?act=dangxuat">Đăng xuất</a></li>

      <?php
    } else {
      ?>
      <div class="box_content form_account">
        <form action="xshop.php?act=dangnhap" method="POST">
          <h4>Tên đăng nhập</h4><br>
          <input type="text" name="user" id="">
          <h4>Mật khẩu</h4><br>
          <input type="password" name="pass" id=""><br>
          <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
          <br><input type="submit" class="btn btn-success" name="dangnhap" value="Đăng nhập">
          <li class="form_li"><a href="xshop.php?act=quenmk">Quên mật khẩu</a></li>
          <li class="form_li"><a href="xshop.php?act=dangky">Đăng kí thành viên</a></li>
        </form>
      </div>
    <?php } ?>
    <?php
    if (isset($thongbao) && $thongbao != "") {
      echo '<div class="container mt-3"><div class="alert alert-danger " role="alert">' . $thongbao . '</div></div>';
    }
    ?>
  </div>
  
  <div class="mb">
    <div class="box_title">DANH MỤC</div>

    <div class="box_content2 product_portfolio">
      <ul>
        <?php
        foreach ($dsdm as $dm) {
          extract($dm);
          $linkdm = "xshop.php?act=sanpham&iddm=".$id;
          echo '<li><a href="' . $linkdm . '">' . $name . ' </a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="box_search">
      <form class="input-group" action="xshop.php?act=sanpham" method="POST">
        <input type="text" class="form-control" name="kyw" id="" placeholder="Từ khóa tìm kiếm">
        <input type="submit" name="timkiem" value="Tìm kiếm" class="btn btn-primary ">
      </form>
    </div>
  </div>
  <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
  <div class="mb">
    <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
    <div class="box_content">
      <?php
      foreach ($dstop10 as $sp) {
        extract($sp);
        $linksp = "xshop.php?act=sanphamct&idsp=".$id;
        $hinh = $img_path . $img;

        ?>
        <div class="selling_products" style="width:100%;">
          <img src="<?= $hinh ?>" alt="anh">
          <a href="<?= $linksp ?>">
            <?= $name ?>
          </a>
        </div>
        <?php
      }
      ?>


    </div>
  </div>
</div>
