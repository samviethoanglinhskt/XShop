<!-- END HEADER -->
<main class="catalog  mb ">
    <div class="boxleft">

        <div class="box_title">Cập nhật tài khoản</div>
        <div class="box_content form_account">
            <?php
            
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                }
                
            ?> 
            <form action="xshop.php?act=edit_taikhoan" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" value="<?=$email?>">
                </div>
                <div>
                    Tên đăng nhập
                    <input type="text" name="user" value="<?=$user?>">
                </div>
                Mật khẩu
                <div>
                    <input type="password" name="pass" value="<?=$pass?>">
                </div>
                Địa chỉ
                <div>
                    <input type="text" name="address" value="<?=$address?>">
                </div>
                Điện thoại
                <div>
                    <input type="text" name="tel"  value="<?=$tel?>">
                </div>
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
            </form>
          
            <h3 class="thongbao">
            <?php 
                if(isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
            ?>
            </h3>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>
