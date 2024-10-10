<?php
include('db.php');
session_start();

$user_id = $_SESSION['mb_id'];

$sql_user = "SELECT * FROM member WHERE mb_id = '$user_id'";
$res = mysqli_query($db, $sql_user);
$row = mysqli_fetch_array($res);

$user_email = $row['user_email'];
$user_nick = $row['mb_nick'];
$back_color = $row['back_color'];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
    <base href="http://localhost/SSUPOSTER/poster_user.php">
    
    <style>
        #poster-board {
            background-color: #fdf6e3;
            border: 2px solid #d4af37;
            width: 85%;
            min-height: 600px;
            padding: 20px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h5 style="display: block; text-align: left; padding-left: 20px;">
            <a href="http://localhost/SSUPOSTER/poster_view.php">back</a>
        </h5>
        <h1>디지털 홍보물 플랫폼</h1>

        <div id="sidePanel" class="side_panel">
            <div class="side_panel_logout">
                <span class="logout_btn" onclick="logoutBtn()" style="cursor: pointer;">로그아웃</span>
            </div>
            <div class="side_panel_content">
                <span class="closebtn" onclick="closePanel()">&times;</span>
                <h2>내 정보</h2>
                <p>닉네임: <?php echo htmlspecialchars($user_nick); ?></p>
                <p>아이디: <?php echo htmlspecialchars($user_id); ?></p>
                <p>이메일: <?php echo htmlspecialchars($user_email); ?></p>
            </div>  
        </div>

        <script src="poster_main.js"></script>
    </header>
    <hr>
    <hr>
    <div class="container">
        <div class="left">
            <h2>게시판 선택</h2>
            <ul>
                <li><a href="http://localhost/SSUPOSTER/poster_user.php">내 포스터 게시판</a></li>
                <li><a href="" onclick="loadBoard('humanitiesPoster')">내가 올린 포스터</a></li>
                <li><a onclick="clickIcon()">내 정보</a></li>
            </ul>
        </div>
    
        <div class="right">
            <section id="content">
                <section id="poster-board">
                    <div style="display:inline;">
                        <h2>내 포스터 게시판</h2>
                    </div>
                    <div id="posters-container">
                        <?php include('poster_user_server.php'); ?> 
                    </div>
                </section>
            </section>
            <section id="upload-section">
                <button onclick="load()">포스터 업로드</button>
            </section>
        </div>
    </div>

    <script>
        function clickIcon() { // 아이콘 누르면 패널 여는 함수
            document.getElementById("sidePanel").style.width = "20%";
        }

        function closePanel() { // 패널 닫는 함수
            document.getElementById("sidePanel").style.width = "0";
        }
        
        function logoutBtn() { // 로그아웃 버튼
            window.location.href = 'logout_server.php';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var posterBoard = document.getElementById('poster-board');

            switch(<?php echo $back_color; ?>) {
                case '1':
                    posterBoard.style.backgroundColor = #fdf6e3;
                    break;
                case '2':
                    posterBoard.style.backgroundColor = #9a5a39;
                    break;
                case '3':
                    posterBoard.style.backgroundColor = #888888;
                    break;
                default:
                    posterBoard.style.backgroundColor = #fdf6e3;
                    break;
            }
        });
    </script>
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

/* #poster-board {
    background-color: #fdf6e3;
    border: 2px solid #d4af37;
    width: 85%;
    min-height: 600px;
    padding: 20px;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
} */

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
    position: absolute;
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

    .user_icon {
        width: 30px;
        height: 30px;
        position: absolute;
        right: 0;
        top: 0;
        margin-top: 25px;
        margin-right: 25px;
        cursor: pointer;
    }

    .myinfo {
        font-size: 10px;
        cursor: pointer;
    }

    .side_panel {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        right: 0;
        background-color: #111;
        overflow-x: hidden; /* 수평 스크롤 숨김 */
        transition: 0.5s;
        color: white;
    }

    .side_panel_logout {
        position: absolute;
        margin-top: 36px;
        right: 24%;
    }

    .side_panel_content {
        margin-top: 60px; /* 상단 여백 */
        padding: 20px;
    }

    .closebtn {
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 36px;
        cursor: pointer;
    }

</style>