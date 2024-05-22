<?php  
        include "../model/pdo.php";
        include "../model/danhmuc.php";
        include "../model/sanpham.php";
        include "../model/thongke.php";
        include "../model/binhluan.php";
        include "../model/taikhoan.php";
        include "header.php";
if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {

            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    $sql="insert into danhmuc(name) values('$tenloai')";
                    pdo_execute($sql);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

            case 'listdm':
                $sql= "select * from danhmuc order by id desc";
               $listdanhmuc=pdo_query($sql);
                 include "danhmuc/list.php";
                 break;


            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sql="delete from danhmuc where id=".$_GET['id'];
                    pdo_execute($sql);
                }
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
                  include "danhmuc/list.php";
                  break;

            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sql="select * from danhmuc where id=".$_GET['id'];
                    $dm=pdo_query_one($sql);
                }
                
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    $sql="update danhmuc set name='".$tenloai."' where id=".$id;
                    pdo_execute($sql);
                    $thongbao="Cập nhật thành công";
                }
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
                  include "danhmuc/list.php";
                  break;
//sản phẩm:
                  case "listsp":
                    if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                        $keyw=$_POST['keyw'];
                        $iddm=$_POST['iddm'];
                    }else{
                        $keyw="";
                        $iddm=0;
                    }
                    $listdanhmuc= loadall_danhmuc();
                    $listsanpham = loadall_sanpham($keyw,$iddm);
                    include "sanpham/list.php";
                    break;
                case "addsp":
                    if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $hinh = $_FILES['hinh']['name'];
 
                        $target_dir = "../upload/";
                        $target_file = $target_dir.basename($_FILES['hinh']['name']);
   
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                           echo "Bạn đã upload ảnh thành công";
                        }else{
                           echo "Upload ảnh không thành công";
                        }

                        insert_sanpham($tensp, $giasp, $hinh,$mota, $iddm);
                        $thanhcong = "Thêm thành công";
                    }
    
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/add.php";
                    break;  
                    case "bieudo":
                        $dsthongke = load_thongke_sanpham_danhmuc();
                        include "bieudo.php";
                        break;
                        
                case "thongke":
                    $dsthongke = load_thongke_sanpham_danhmuc();
                        include "thongke.php";
                        break; 
            
                case "suasp":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                       $sanpham= loadone_sanpham($_GET['id']);
                    }
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/update.php";
                    break;

                case "xoasp":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                       delete_sanpham($_GET['id']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;

                case "updatesp":
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id = $_POST['id'];
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $hinh = $_FILES['hinh']['name'];
 
                        $target_dir = "../upload/";
                        $target_file = $target_dir.basename($_FILES['hinh']['name']);
   
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                           echo "Bạn đã upload ảnh thành công";
                        }else{
                           echo "Upload ảnh không thành công";
                        }
                        update_sanpham($iddm,$tensp,$giasp,$hinh,$mota);
                        $thongbao="Cập nhật thành công";
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
                    
                    case "dsbl":
                        // $listcmt = ds_binhluan("");
                        $listcmt = ds_binhluan_inner();
                        include "binhluan/dsbl.php";
                        break;
                    case "xoacmt":
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            $id = $_GET["id"];
                            delete_binhluan($id);
                        }
                        $listcmt = ds_binhluan_inner();
                        include "binhluan/dsbl.php";
                        break;
            
                    case "suacmt":
                        if (isset($_GET["id"]) && $_GET["id"] > 0) {
                            $id = $_GET["id"];
                            $checkcmt = binhluan_one($id);
                        }
                        // $listcmt = ds_binhluan_inner();
                        include "binhluan/update.php";
                        break;
            
                    case "updatecmt":
                        if (isset($_POST['capnhat'])) {
                            $id = $_POST['id'];
                            $noidung = $_POST['noidung'];
                            $ngayupdate = $_POST['ngayupdate'];
                            update_binhluan($id, $noidung, $ngayupdate);
                            $thongbao = "Cập nhật thành công";
                        }
            
                        $listcmt = ds_binhluan_inner();
                        include "binhluan/dsbl.php";
                        break;
                    

                    case "dskh":
                            $listtaikhoan = loadAll_taikhoan();
                            include "taikhoan.php";
                            break;

                            case "xoatk":
                                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                                    $id = $_GET["id"];
                                    delete_taikhoan($id);
                                }
                                $listtaikhoan = loadAll_taikhoan();
                                include "taikhoan.php";
                                break;
                    
                            case "suatk":
                                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                                    $id = $_GET["id"];
                                    $checktaikhoan = taikhoan_one_admin($id);
                                }
                                include "taikhoan_update.php";
                                break;
                    
                            case "updatetk":
                                if (isset($_POST['capnhat'])) {
                                    $id = $_POST['id'];
                                    $email = $_POST['email'];
                                    $user = $_POST['user'];
                                    $pass = $_POST['pass'];
                                    $address = $_POST['address'];
                                    $tel = $_POST['tel'];
                                    $role = $_POST['role'];
                    
                                    update_taikhoan_admin($id, $user, $pass, $email, $address, $tel, $role);
                                    $thongbao = "Cập nhật thành công";
                                }
                    
                                $listtaikhoan = loadAll_taikhoan();
                                include "taikhoan.php";
                                break;
      default:
      include "home.php";
      break;
    }
}
else{
    include "home.php";
}
?>

<?php  include "footer.php";?>