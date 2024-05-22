<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold">DANH SÁCH TÀI KHOẢN</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#" method="POST">
                <div class="mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Phân cấp</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listtaikhoan as $key => $taikhoan):
                                extract($taikhoan);
                                ?>
                                <tr>
                                    <td>
                                        <?= $key + 1 ?>
                                    </td>
                                    <td>
                                        <?= $user ?>
                                    </td>
                                    <td>
                                        <?= $pass ?>
                                    </td>
                                    <td>
                                        <?= $email ?>
                                    </td>
                                    <td>
                                        <?= $address ?>
                                    </td>
                                    <td>
                                        <?= $tel ?>
                                    </td>
                                    <td>
                                        <?= $role ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="index.php?act=suatk&id=<?= $id ?>">Sửa</a>
                                        <a class="btn btn-danger" href="index.php?act=xoatk&id=<?= $id ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="mb-3 text-left">
                    <input class="btn btn-primary mr-3" type="button" value="CHỌN TẤT CẢ">
                    <input class="btn btn-secondary mr-3" type="button" value="BỎ CHỌN TẤT CẢ">
                    <a href="index.php?act=addsp"><input class="btn btn-success" type="button" value="NHẬP THÊM"></a>
                </div> -->
            </form>
        </div>
    </div>
</div>