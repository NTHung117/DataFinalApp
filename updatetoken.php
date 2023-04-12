<?php
include "connect.php";
$token = $_POST['token'];
$id = $_POST['id'];

$query = 'UPDATE `user` SET `token`="'.$token.'" WHERE `id` ='.$id;
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