<?php
include('db.php');
session_start();

$user_id = $_SESSION['mb_id'];

$sql_user = "SELECT * FROM member WHERE mb_id = '$user_id'";
$res = mysqli_query($db, $sql_user);
$row = mysqli_fetch_array($res);

$user_email = $row['user_email'];
$user_nick = $row['mb_nick'];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="user_icon" onclick="clickIcon()">
            <img src="image/user_icon.png" alt="user_icon">
            <span class="myinfo">내 정보</span>
        </div>
        <h1>디지털 홍보물 플랫폼</h1>
    </header>
    <hr>
    <main>
        <div>
            <h4 class="cate" style="padding-top: 10px">카테고리</h4>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <!-- 왼쪽 버튼 -->
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 8</div>
                <img src="image/path_to_image_1.png" alt="Image 1">
                <span>★ 내 게시판 바로가기</span>
                <!-- <button onclick="toPosterMain('myPoster')" class="btn">게시판 보기</button> -->
                <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 8</div>
                <img src="image/path_to_image_2.png" alt="Image 2">
                <span>인문대학</span>
                <a onclick="toPosterMain('humanitiesPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 8</div>
                <img src="image/path_to_image_3.png" alt="Image 3">
                <span>자연과학대학</span>
                <a onclick="toPosterMain('sciencePoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 8</div>
                <img src="image/path_to_image_4.png" alt="Image 8">
                <span>경영대학</span>
                <a onclick="toPosterMain('businessPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">5 / 8</div>
                <img src="image/path_to_image_5.png" alt="Image 9">
                <span>공과대학</span>
                <a onclick="toPosterMain('engineeringPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">6 / 8</div>
                <img src="image/path_to_image_6.png" alt="Image 10">
                <span>IT대학</span>
                <a onclick="toPosterMain('itPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">7 / 8</div>
                <img src="image/path_to_image_6.png" alt="Image 10">
                <span>동아리</span>
                <a onclick="toPosterMain('clubPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">8 / 8</div>
                <img src="image/path_to_image_6.png" alt="Image 10">
                <span>외부활동</span>
                <a onclick="toPosterMain('externalPoster')" class="btn">게시판 보기</a>
                <!-- <a href="/SSUPOSTER/poster_user.php" class="btn">게시판 보기</a> -->
            </div>

        </div>
        <a class="next" onclick="plusSlides(1)">&#10095;</a> <!-- 오른쪽 버튼 -->

        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
            <span class="dot" onclick="currentSlide(7)"></span>
            <span class="dot" onclick="currentSlide(8)"></span>
        </div>
    </main>

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

        <div class="back_color_container">
            <img class="bg 1" src="image/background_1.png" alt="bg1" onclick="changeBackColor('1')" style="cursor: pointer;">
            <img class="bg 2" src="image/background_2.png" alt="bg2" onclick="changeBackColor('2')" style="cursor: pointer;">
            <img class="bg 3" src="image/background_3.png" alt="bg3" onclick="changeBackColor('3')" style="cursor: pointer;">
        </div>
    </div>

    <footer>
        <nav>
            <a href='' target='_blank'>Github</a> |
            <a href='https://github.com/Doyun-coding' target='_blank'>Github</a>
        </nav>
        <p>
            <span>24시간 문의 : 왓띵 카카오톡 플러스 친구추가 후 문의</span><br/>
            <span>Author : Kim Do-yun</span><br/>
            <span>E-mail : www.roger428@naver.com</span><br/>
            <span>Copyright 2022. Kim Do-yun. All Rights Reserved.</span>
        </p>
    </footer>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }

            // 밑에 목록
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            // 3개 리스트 슬라이드
            for (i = 0; i < 3; i++) {
                if (slideIndex+i-1 < slides.length) {
                    slides[slideIndex+i-1].style.display = "inline-block";
                } else {
                    slides[(slideIndex+i-1) % slides.length].style.display = "inline-block";
                }
            }
            dots[(slideIndex-1) % dots.length].className += " active";
        }

        function toPosterMain(categoryId) {
            window.location.href = 'poster_main.php?category=' + categoryId;
        }

        function clickIcon() { // 아이콘 누르면 패널 여는 함수
            document.getElementById("sidePanel").style.width = "20%";
        }

        function closePanel() { // 패널 닫는 함수
            document.getElementById("sidePanel").style.width = "0";
        }
        
        function logoutBtn() { // 로그아웃 버튼
            window.location.href = 'logout_server.php';
        }

        function changeBackColor(bg_color) {
            fetch('update_background.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'bg_value=' + bg_color
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>


<style>
        * {box-sizing: border-box;}

        body {font-family: Verdana, sans-serif; margin: 0;}

        .mySlides {display: inline-block; width: 33.33%; vertical-align: top;}

        img {width: 100%; height: auto; display: block;} /* 이미지 크기 조정 및 display 속성 추가 */

        header {
            background-color: #ffffff;
            color: #2793ff;
            padding: 20px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        hr {
            border: 1px solid #2793ff;
            width: 80%;
            margin: 20px auto;
        }
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            white-space: nowrap;
            overflow: hidden;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            z-index: 10;
        }

        .prev {
            left: 0;
            background-color: rgba(0,0,0,0.5);
        }

        .next {
            right: 0;
            background-color: rgba(0,0,0,0.5);
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        .btn {
            display: block;
            text-align: center;
            margin: 10px 0;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        @media only screen and (max-width: 300px) {
            .prev, .next, .text {font-size: 11px}
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

        .back_color_container {
            display: flex;
            justify-content: center;
            padding: 4px;
        }

        .bg {
            width: 100px;
            height: 100px;
            margin: 10px;
            cursor: pointer;
        }

    </style>