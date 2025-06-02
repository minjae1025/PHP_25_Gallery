<?php
$dir = "./uploads/";
$file = $_FILES['imgFile']['name'];
$tmp_name = $_FILES['imgFile']['tmp_name'];

$file_name = explode(".", $file);
$ext = end($file_name);

if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "png" || $ext == "PNG" || $ext == "gif") {
    if(!is_dir($dir)){
        mkdir($dir);
    }
    
    $upload_file = $dir.$file;
    
    if(move_uploaded_file($tmp_name, $upload_file)) {
        echo "<script>alert(`업로드 성공!`)</script>";
    }
    else {
        echo "<script>alert(`업로드 실패!`)</script>";
    }
}
else {
    echo "<script>alert('이미지가 아닙니다!')</script>";
    
}
echo "<script>history.go(-2)</script>";



?>