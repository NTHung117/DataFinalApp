<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "connect.php";
$email = $_POST['email'];
$query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'" '; //Lấy kết quả
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $result[] = ($row);
}
//Sau khi lấy kết quả xong t sẽ kiểm tra kết quả
if(empty($result)){//Nếu kết quả không có, ví dụ: Người dùng nhập một email không có trong database
    $arr = [
        'success' => false,
        'message' => "Dia chi email khong ton tai",
        'result' => $result
    ];
}else{
    //Send mail
    $email=($result[0]["email"]);
    $pass=($result[0]["pass"]);
    $link="<a href='http://192.168.1.173/FoodApp/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "nguyentienhung117@gmail.com";
    // GMAIL password
    $mail->Password = "hungcun123";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From= "nguyentienhung117@gmail.com"; //Mail để gửi đi cho mail khác
    $mail->FromName='App Ban Hang';
    $mail->AddAddress($email, 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
}
print_r($arr);




?>