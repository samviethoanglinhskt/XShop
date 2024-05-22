<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold">Sửa bình luận</h1>
        </div>
    </div>

    <?php
    if (isset($checkcmt) && is_array($checkcmt)) {
        extract($checkcmt);
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngayupdate = date("Y-m-d H:i:s");
    ?>

    <div class="row">
        <div class="col-12">
            <form action="index.php?act=updatecmt" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="mb-3">
                    <p class="text-left" for="">Nội dung</p>
                    <input type="text" class="form-control" name="noidung" value="<?= $noidung ?>">
                </div>

                <input type="hidden" name="ngayupdate" value="<?= $ngayupdate ?>">

                <div class="mb-3">
                    <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT"
                        required>
                    <input class="btn btn-secondary mr-3 text-left" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=dsbl"><input class="btn btn-success text-left" type="button"
                            value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>