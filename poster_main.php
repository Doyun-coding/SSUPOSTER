<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
    <base href="http://localhost/SSUPOSTER/poster_main.php">
</head>
<body>
    <?php
        $category = isset($_GET['category']) ? $_GET['category'] : 'default';
        $text = "";

        switch ($category) {
            case 'humanitiesPoster':
                $text = "인문대학 게시판";
                break;
            case 'sciencePoster':
                $text = "자연과학대학 게시판";
                break;
            case 'businessPoster':
                $text = "경영대학 포스터";
                break;
            case 'engineeringPoster':
                $text = "공과대학 포스터";
                break;
            case 'itPoster':
                $text = "IT대학 포스터";
                break;
            case 'clubPoster':
                $text = "동아리 포스터";
                break;
            case 'externalPoster':
                $text = "외부활동 포스터";
                break;
            default:
                $text = "내 포스터 게시판";
                break;
        }
    ?>
    <header>
        <h5 style="display: block; text-align: left; padding-left: 20px;">
            <a href="http://localhost/SSUPOSTER/poster_view.php">back</a>
        </h5>
        <h1>디지털 홍보물 플랫폼</h1>
        <script src="poster_main.js"></script>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var category = "<?php echo htmlspecialchars($category); ?>";
            fetch("poster_main_server.php?category=" + category)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("posters").innerHTML = data;
                })
                .catch(error => console.error("Error loading posters:", error));
        });

        function loadBoard(categoryId) {
            window.location.href = 'poster_main.php?category=' + categoryId;
        }
    </script>
    <div class="container" style="padding-top: 70px;">
        <div class="left">
            <h2>게시판 선택</h2>
            <ul>
                <li><a href="http://localhost/SSUPOSTER/poster_user.php">내 포스터 게시판</a></li>
                <li><a onclick="loadBoard('humanitiesPoster')">인문대학 게시판</a></li>
                <li><a onclick="loadBoard('businessPoster')">경영대학 게시판</a></li>
                <li><a onclick="loadBoard('engineeringPoster')">공과대학 게시판</a></li>
                <li><a onclick="loadBoard('itPoster')">IT대학 게시판</a></li>
                <li><a onclick="loadBoard('clubPoster')">동아리 게시판</a></li>
                <li><a onclick="loadBoard('externalPoster')">외부활동 게시판</a></li>
            </ul>
        </div>
        <div class="right">
            <section id="content">
                <section id="poster-board">
                    <div style="display: inline;">
                        <h2><?php echo htmlspecialchars($text); ?></h2>
                    </div>
                    <div id="posters-container">
                        <?php include('poster_main_server.php'); ?> 
                    </div>
                </section>
            </section>
            <section id="upload-section">
                <button onclick="load()">포스터 업로드</button>
            </section>
        </div>
    </div>
</body>
</html>

<style>
body {
    font-family: 'NanumSquare', "Apple SD Neo Gothic", "Malgun Gothic", dotum, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

header {
    background-color: #ffffff;
    color: #2793ff;
    padding: 20px;
    text-align: center;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

header h1 {
    margin: 0;
}

.container {
    width: 100%;
    display: flex;
    margin-top: 80px;
    height: calc(100vh - 80px);
}

.left {
    width: 15%;
    background-color: #ffffff;
    border-right: 2px solid #d4af37;
    padding: 20px;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
    box-sizing: border-box;
}
.left h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}
.left ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.left ul li {
    margin-bottom: 10px;
}
.left ul li a {
    color: black;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.left ul li a:hover {
    background-color: #e0e0e0;
}

.right {
    width: 85%;
    padding: 20px;
    overflow-y: auto;
    box-sizing: border-box;
}

hr {
    border: 1px solid #2793ff;
    width: 100%;
    margin: 20px auto;
}

#upload-section {
    margin-bottom: 20px;
    text-align: right;
}

#upload-section button {
    background-color: #2793ff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

#upload-section button:hover {
    background-color: #1a73e8;
}

#poster-board {
    background-color: #fdf6e3;
    border: 2px solid #d4af37;
    width: 85%;
    min-height: 600px;
    padding: 20px;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

#poster-board h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

#posters-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.poster {
    position: absolute; /* For draggable */
    display: inline-block;
    margin: 10px;
    cursor: pointer;
}

.poster img {
    width: 100px;
    height: 100px;
    display: block;
    border-radius: 10px;
    transition: transform 0.3s;
}

.poster img:hover {
    transform: scale(1.1);
}

.poster-resize {
    width: 10px;
    height: 10px;
    background: red;
    position: absolute;
    bottom: 0;
    left: 100%;
    cursor: nw-resize;
}

.poster-buttons button {
    background-color: #ff5c5c;
    border: none;
    color: white;
    padding: 5px;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s;
}

.poster-buttons button:hover {
    background-color: #e44e4e;
}

a {
    color: #2793ff;
    text-decoration: none;
}


</style>