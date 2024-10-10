<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
    <base href="http://localhost/SSUPOSTER/login_view.php">
    <meta charset="UTF-8">
</head>
<body>
    <header>
        <h1>디지털 홍보물 플랫폼 : 애교심</h1>
    </header>
    <hr>
    <main>
        <form action="login_server.php" method="post">
            <h2>로그인</h2>

            <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php }?>

            <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
            <?php }?>

            <input type="text" placeholder="아이디 입력" name="user_id" required>
            <input type="password" placeholder="비밀번호 입력" name="pass1" required>
            
            <div class="login">
                <button type="submit" name="login_btn">로그인</button>
            </div>
            
            <div class="register-link">
                <a href="http://localhost/SSUPOSTER/register_view.php">아직 회원이 아니신가요? (회원가입 페이지)</a>
            </div>
        </form>
    </main>

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
</body>
</html>

<style>
    body {
    font-family: 'NanumSquare', "Apple SD Neo Gothic", "Malgun Gothic", dotum, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
    background-color: #f7f7f7;
}

header {
    background-color: #ffffff;
    color: #2793ff;
    padding: 20px;
    text-align: center;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

main {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    text-align: center;
}

h1 {
    color: #2793ff;
    margin-bottom: 40px
}

hr {
    border: 1px solid #2793ff;
    width: 80%;
    margin: 20px auto;
}

input[type="text"], input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #2793ff;
    outline: none;
    box-shadow: 0 0 5px rgba(39, 147, 255, 0.3);
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #2793ff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

button[type="submit"]:hover {
    background-color: #217bc0;
}

.register-link {
    margin-top: 15px;
}

.register-link a {
    color: #2793ff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

.error {
    color: red;
    font-size: 14px;
}

.success {
    color: green;
    font-size: 14px;
}

footer {
    width: 100%;
    height: 90px;
    bottom: 0px;
    border-top: 1px solid #c4c4c4;
    padding-top: 15px;
    color: #808080;
    font-size: 11px;
}
footer a {
    display: inline-block;
    margin: 0 20px 10px 20px;
    color: #808080; font-size: 11px;
}
  
footer a:visited {
    color: #808080;
}

footer p {
    margin-top: 0; margin-bottom: 0;   
}
  
footer p span {
    display: inline-block;
    margin-left: 20px;
}
</style>