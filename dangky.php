<?php
include "connect.php";
$email = $_POST['email'];
$pass = $_POST['pass'];
$username = $_POST['username'];
$numberPhone = $_POST['numberPhone'];

$query = 'INSERT INTO `user`(`email`, `pass`, `username`, `numberPhone`) VALUES ("'.$email.'","'.$pass.'","'.$username.'","'.$numberPhone.'") ';
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

print_r(json_encode($arr));



?>