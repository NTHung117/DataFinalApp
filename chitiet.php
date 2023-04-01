<?php
include "connect.php";
$page = $_POST['page'];
$total = 5; //Biến tổng cần lấy 5 sản phẩm trên 1 trang
$pos = ($page-1)*$total; //Nếu khi chúng ta truyền vào trang số 1 thì 1-1=0 rồi * cho $total= 5 kqua= 0 => Từ đó t lấy từ vị trí số 0 và 5 sản phẩm / Nếu t truyền vào trang số 2 thì t sẽ lấy sản phẩm ở vị trí số 5 và lấy 5 sản phẩm
$loai = $_POST['loai'];
$query = 'SELECT * FROM `sanphammoi` WHERE `loai` = '.$loai.' LIMIT '.$pos.','.$total.' ';
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $result[] = ($row);
}

if (!empty($result))  {

    $arr = [
        'success' => true,
        'message' => "Thanh cong",
        'result' => $result
    ];
}else {
    $arr = [
        'success' => false,
        'message' => "Khong thanh cong",
        'result' => $result
    ];
}

print_r(json_encode($arr));



?>