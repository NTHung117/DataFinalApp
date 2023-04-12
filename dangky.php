<?php
include "connect.php";
$email = $_POST['email'];
$pass = $_POST['pass'];
$username = $_POST['username'];
$phoneNumber = $_POST['phoneNumber'];
$uid = $_POST['uid'];

//Kiểm tra email có bị trùng trên data
$query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'" ';
$data = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($data);//Hàm này kiểm tra xem có giữ liệu trả về không
if ($numrow > 0) {//Nếu numrow > 0 là đã có dữ liệu trả về
    $arr = [
        'success' => false,
        'message' => "Email da ton tai"
    ];
}else{
        $query = 'INSERT INTO `user`(`email`, `pass`, `username`, `phoneNumber`, `uid`) 
                VALUES ("'.$email.'","'.$pass.'","'.$username.'","'.$phoneNumber.'","'.$uid.'") ';
        $data = mysqli_query($conn, $query);
        if ($data == true)  {

            $arr = [
                'success' => true,
                'message' => "Thanh cong"
            ];
        }else {
            $arr = [
                'success' => false,
                'message' => "Khong thanh cong"
            ];
        }
}




print_r(json_encode($arr));



?>