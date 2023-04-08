<?php
include "connect.php";
$iduser = $_POST['iduser'];
$query = 'SELECT * FROM `donhang` WHERE `iduser` =  '.$iduser;
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {//chạy qua từng vòng của bản dữ liệu đơn hàng
    $truyvan = 'SELECT * FROM `chitietdonhang` INNER JOIN sanphammoi ON chitietdonhang.idsp = sanphammoi.id WHERE chitietdonhang.iddonhang = '.$row['id']; //Nối bảng chitietdonhang vào bảng sanphammoi để lấy hết thông tin của sản phẩm
    $data1 = mysqli_query($conn, $truyvan);
    $item = array();
    while ($row1 = mysqli_fetch_assoc($data1)){//chạy qua từng vòng của bản dữ liệu chi tiết đơn hàng
        $item[] = $row1;
    }
    $row['item'] = $item;

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