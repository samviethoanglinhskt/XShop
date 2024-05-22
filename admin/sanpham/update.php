<?php
   if(is_array($sanpham)){
        extract($sanpham);
   }

   $hinhpath="../upload/".$img;
   if(is_file($hinhpath)){
       $hinh="<img src= '".$hinhpath."' width='100px' height='100px'>";
   }else{
       $hinh="No file img!";
   }
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>SỬA SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
              <div class="row2 mb10 form_content_container">
                  <label> Danh mục </label> <br>
                  <<select name="iddm" id="">
                       <option value="0" selected>Tất cả</option>
                       <?php
                       foreach ($listdanhmuc as $danhmuc){
                           extract($danhmuc);
                           if($iddm==$id){
                            echo '<option value="'.$id.'" selected>'.$name.'</option>';
                           }else{
                            echo '<option value="'.$id.'">'.$name.'</option>';
                           }
                               
                       }
                       ?>
                   </select>
              </div>
           <div class="row2 mb10 form_content_container">
           <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
           <label> Tên sản phẩm </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên san phẩm" value="<?php echo $name?>">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="giasp" placeholder="nhập vào của sản phẩm" value="<?php echo $price?>">
           </div>
              <div class="row2 mb10">
                  <label>Hình ảnh </label> <br>
                  <input type="file" name="hinh" >
                  <?php echo $hinh?>
              </div>
              <div class="row2 mb10">
                  <label>Mô tả </label> <br>
                  <textarea name="mota" cols="30" rows="10" ><?php echo $mota ?></textarea>
              </div>
           <div class="row mb10 ">
           <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
         <input class="mr20" name="capnhat" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
              <?php
              if(isset($thanhcong)&& ($thanhcong!="")){
                  echo $thanhcong;
              }

              ?>
          </form>
         </div>
        </div>