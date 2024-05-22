<?php
    function load_thongke_sanpham_danhmuc(){
        $sql="select dm.id, dm.name, count(*) 'soluong', min(price) 
        'gia_min', max(price)  'gia_max', avg(price)  'gia_avg' from danhmuc
        dm join sanpham sp on dm.id=sp.iddm group by dm.id, dm.name order by 
        soluong desc  ";
        return pdo_query($sql);
    }
?>