<?php
include "connect.php";
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$mota = $_POST['mota'];
$hinhanh = $_POST['hinhanh'];
$loai = $_POST['loai'];

$query = 'INSERT INTO `sanphammoi`(`tensanpham`, `hinhanh`, `mota`, `loai`, `giasanpham`) 
            VALUES ("'.$tensp.'","'.$hinhanh.'","'.$mota.'",'.$loai.',"'.$gia.'")'; //2 dấu nháy đơn là để ngắt câu sau đó t nối lại hinhanh, "" là sử dụng cho dạng chuỗi như tensp, hinhanh,mota
$data = mysqli_query($conn, $query);

if ($data == true)  {
    $arr = [
    'success' => true,
    'message' => "Thêm sản phẩm thành công"
];
}else {
    $arr = [
    'success' => false,
    'message' => "Không thể thêm sản phẩm"
];
}
print_r(json_encode($arr));
?>