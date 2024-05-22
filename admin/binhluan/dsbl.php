<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold">DANH SÁCH BÌNH LUẬN</h1>
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
                                <th scope="col">User</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Ngày bình luận</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listcmt as $key => $cmt):
                                extract($cmt);
                                ?>
                                <tr>
                                    <td>
                                        <?= $idbl?>
                                    </td>
                                    <td>
                                        <?= $user ?>
                                    </td>
                                    <td>
                                        <?= $noidung ?>
                                    </td>
                                    <td>
                                        <?= $ngaybinhluan ?>
                                    </td>
                                    <td>
                                       
                                        <a class="btn btn-danger" href="index.php?act=xoacmt&id=<?= $idbl ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>