<?php
$uploadFolder = '../uploads/'; // 指定上传文件夹路径
$timestamp = $_POST['timestamp'];

if (!file_exists($uploadFolder)) {
  mkdir($uploadFolder); // 如果文件夹不存在，创建文件夹
}

$uploadedFile = $_FILES['file']['tmp_name'];
$targetPath = $uploadFolder . $timestamp . '/' . $_FILES['file']['name'];

if (move_uploaded_file($uploadedFile, $targetPath)) {
    echo $targetPath; // 返回上传后的文件路径
} else {
    echo 'Error uploading file.';
}
?>