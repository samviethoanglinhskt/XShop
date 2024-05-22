<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- <style>
      form li a{
        
      }
    </style> -->
</head>
<body>
    <div class="boxcenter">
       <!-- BIGIN HEADER -->
       <header>
        <div class="row mb header">
            <h1>XShop</h1>
        </div>
        <div class="row mb menu">
            <ul>
                
                <li class="dropdown">
                  <a class="dropdownbtn" href="xshop.php">Trang chủ</a>
                 
                  <li class="dropdown">
                  <a class="dropdownbtn" href="">Danh mục</a>
                  <div class="dropdown_content">
                     <?php
                     foreach ($dsdm as $dm) {
                        extract($dm);
                        $linkdm = "xshop.php?act=sanpham&iddm=" . $id;
                        echo '<a href="' . $linkdm . '">' . $name . ' </a>';
                     }
                     ?>
                     
                  </div>
               </li>
                <li class="dropdown">
                  <a class="dropdownbtn" href="xshop.php?act=sanpham">Sản Phẩm</a>
                  <div class="dropdown_content">
                     
                  </div>
                <li class="dropdown">
                  <a class="dropdownbtn" href="xshop.php?act=binhluan">Bình luận</a>
               
               </li>

            </ul>
        </div>
       </header>
            <!-- END HEADER -->