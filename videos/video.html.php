<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>test測試網頁</title>
    <!-- Favicon-->
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/video.css">
    <script src="../js/all.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
</head>

<body id="page-top">
    <!-- 上方導覽列-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3"
        style="display: block; background-color: white; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../index.html"><b>test測試網頁</b></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <!-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="../index.html"><b>首頁</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="../article.html"><b>文章專區</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="video.html.php"><b>影音專區</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="../aboutus.html"><b>團隊介紹</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><b>登入</b></a></li>
                </ul>
            </div>

        </div>
    </nav>
    <html>

    <body>
        <div class="head" style="margin-top: 6rem;">
            <div class="headerobjectswrapper">
                <header>影音專區</header>
            </div>
            <div class="subhead">這裡收錄的我們所有的直播影片</div>
        </div>

        <div class="container">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="video">選擇影片：</label>
                <input class="btn btn-outline-secondary" type="file" name="video" id="video" accept="video/*" required>
                <br>
                <br>
                <label for="videoName">影片名稱：</label>
                <input type="text" name="videoName" id="videoName" required>
                <br>
                <br>
                
                <input class="btn btn-outline-secondary" type="submit" value="上傳影片">
            </form>
            <hr>
            <h2>觀看影片</h2>
            <!-- 這裡顯示已經上傳的影片列表 -->
            <div id="videoList">
                <?php
                // 處理從資料庫檢索影片資訊並顯示在網頁上
                $servername = "localhost";
                $username = "root";
                $password = "20031208";
                $dbname = "videosdb";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // 從資料庫檢索影片資訊
                $sql = "SELECT id, video_name, file_path FROM videos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // 開始一個新的 section
                    echo '<section>';
                
                    // 顯示每一個影片的信息
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="video-container">
                                <p style="font-size:large;">' . $row["video_name"] . '</p>
                                <video width="350px" height="500" controls>
                                    <source src="' . $row["file_path"] . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>';
                    }
                
                    // 結束 section
                    echo '</section>';
            } else {
                echo "目前沒有可觀看的影片。";
            }
            $conn->close();
            ?>
            </div>
        
        </div>

        <div class="container">
            <section>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/kf3Xen_g4Gc" frameborder="0" allowfullscreen></iframe>
                    <div class="card-content">
                        <p>第一步影片標題</p>
                        <p>第一部影片概述</p>
                    </div>
                </div>

                <div class="card">
                    <iframe src="https://www.youtube.com/embed/mEzjx1yaW60" frameborder="0" allowfullscreen></iframe>
                    <div class="card-content">
                        <p>第二部影片標題</p>
                        <p>第二部影片概述</p>
                    </div>
                </div>

                <div class="card">
                    <iframe src="https://www.youtube.com/embed/emQ5ku_iFtg" frameborder="0" allowfullscreen></iframe>
                    <div class="card-content">
                        <p>第三部影片標題</p>
                        <p>第三部影片概述</p>
                    </div>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/HPHcRiSd6no" frameborder="0" allowfullscreen></iframe>
                    <div class="card-content">
                        <p>第四部影片標題</p>
                        <p>第四部影片概述</p>
                    </div>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/EeZ4O_qgaEk" frameborder="0" allowfullscreen></iframe>
                    <div class="card-content">
                        <p>第五部影片標題</p>
                        <p>第五部影片概述</p>
                    </div>
                </div>
            </section>
        </div>

    </body>

    </html>

    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - Company Name</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>