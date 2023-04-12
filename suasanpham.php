<?php
include "connect.php";
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$mota = $_POST['mota'];
$hinhanh = $_POST['hinhanh'];
$loai = $_POST['loai'];
$id = $_POST['id'];//Truyền theo biến id để sửa

$query = 'UPDATE `sanphammoi` SET 
           `tensanpham`="'.$tensp.'",`hinhanh`="'.$hinhanh.'",`mota`="'.$mota.'",`loai`='.$loai.',`giasanpham`="'.$gia.'" 
            WHERE `id`='.$id;
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