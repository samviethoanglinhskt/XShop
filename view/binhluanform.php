<?php
session_start();
include "../model/binhluan.php";
include "../model/pdo.php";

    $idpro = $_REQUEST['idsp'];



if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    extract($_SESSION['user']);
}

// $user = $_SESSION['user']['user'];

// $dsbl = ds_binhluan($idpro);
$dsbl = ds_binhluan_inner_form($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/css.css">
</head>
<style>
    .bl{
        font-size:16px;
        font-family:'Roboto', sans-serif;
        padding-left: 15px; 
    }
</style>
<body>
    <div class="mb">
        <div class="box_content2 product_portfolio">
            <?php
            $noi = "";
            foreach ($dsbl as $key => $value) {
                extract($value);
                $noi .= '
                <tr>
                <th scope="row">' . $key + 1 . '</th>
                <td class="bl">' . $user . '</td>
                <td class="bl">' . $noidung . '</td>
                <td class="bl">' . $ngaybinhluan . '</td>
            </tr>
                ';
            }
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="bl">Stt</th>
                        <th scope="col" class="bl">User</th>
                        <th scope="col" class="bl">Nội dung</th>
                        <th scope="col" class="bl">Ngày bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $noi ?>
                </tbody>
            </table>

        </div>
        <div class="box_search">
            <form class="input-group" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="text" class="form-control" name="noidung" id="" placeholder="Gửi bình luận">
                <input type="submit" name="guibinhluan" value="Gửi bình luận" class="btn btn-primary ">
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
        if(isset( $_SESSION['user']['id'])){
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id']; // user này là mảng nên muốn lấy id thôi thì ['id]
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaybinhluan = date("Y-m-d H:i:s");
            
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
    
            header("location:chitietsanpham.php" . $_SERVER["HTTP_REFERER"]); //Quay lại trang cha, link hiên tại
        }
        else{
            echo"Bạn cần đăng nhập để bình luận";
        }
       
    
    }
    ?>
</body>

</html>