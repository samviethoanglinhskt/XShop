<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold">CẬP NHẬT TÀI KHOẢN</h1>
        </div>
    </div>

    <?php
    if (isset($checktaikhoan) && is_array($checktaikhoan)) {
        extract($checktaikhoan);
    }
    ?>

    <div class="row">
        <div class="col-12">
            <form action="index.php?act=updatetk" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="mb-3">
                    <p class="text-left" for="">Email</p>
                    <input type="email" class="form-control" name="email" value="<?= $email ?>">
                </div>
                <div class="mb-3">
                    <p class="text-left" for="">User</p>
                    <input type="text" class="form-control" name="user" value="<?= $user ?>">
                </div>
                <div class="mb-3">
                    <p class="text-left" for="">Mật khẩu</p>
                    <input type="password" class="form-control" name="pass" value="<?= $pass ?>">
                </div>
                <div class="mb-3">
                    <p class="text-left" for="">Địa chỉ</p>
                    <input type="text" class="form-control" name="address" value="<?= $address ?>">
                </div>

                <div class="mb-3">
                    <p class="text-left" for="">Số điện thoại</p>
                    <input type="text" class="form-control" name="tel" value="<?= $tel ?>">
                </div>
                <div class="mb-3">
                    <p class="text-left" for="">Role</p>
                    <input type="text" class="form-control" name="role" value="<?= $role ?>">
                </div>

                <div class="mb-3">
                    <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT"
                        required>
                    <input class="btn btn-secondary mr-3 text-left" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=dskh"><input class="btn btn-success text-left" type="button"
                            value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>
