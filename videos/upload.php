<?php
// 建立資料庫連接
$servername = "localhost";
$username = "root";
$password = "20031208";
$dbname = "videosdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 處理影片上傳
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $videoName = $_POST["videoName"];

  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($_FILES["video"]["name"]);
  $uploadOk = 1;
  $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // 檢查影片格式，這裡僅示例支援mp4格式
  if ($videoFileType != "mp4") {
    echo "抱歉，僅支援MP4格式的影片。";
    $uploadOk = 0;
  }

  // 檢查是否上傳成功
  if ($uploadOk == 0) {
    echo "抱歉，影片上傳失敗。";
  } else {
    // 上傳成功，將資訊存入資料庫
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
      $sql = "INSERT INTO videos (video_name, file_path) VALUES ('$videoName', '$targetFile')";
      if ($conn->query($sql) === TRUE) {
        echo "影片上傳成功！";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "抱歉，影片上傳失敗。";
    }
  }
}

// 關閉資料庫連接
$conn->close();
