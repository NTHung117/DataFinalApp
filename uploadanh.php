<?php  
include "connect.php";
$target_dir = "images/";  
//name
$query = "select max(id) as id from sanphammoi";
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $result[] = ($row);
}

if ($result[0]['id'] == null ) {
    $name = 1;//Nếu tên của bức ảnh đầu tiên chưa có gì, name = 1 là tên của bức ảnh đầu tiên
}else {
    $name = ++$result[0]['id'];//Tên của hình ảnh là bằng 1 + id
}
$name = $name. ".jpg";
$target_file_name = $target_dir .$name;


// Check if image file is an actual image or fake image  
if (isset($_FILES["file"]))  
   {  
   if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)  )  
      {  
        $arr = [
            'success' => true,
            'message' => "Thành công",
            "name" => $name
        ];
      }  
   else  
      {  
        $arr = [
            'success' => false,
            'message' => "Không thành công"
        ]; 
      }  
   }  
else  
   {  $arr = [
    'success' => false,
    'message' => "loi"
   ];
   }  
   echo json_encode($arr);  
?>  