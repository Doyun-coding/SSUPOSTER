<!DOCTYPE html>
<html>
<head>
    <title>디지털 홍보물 플랫폼</title>
    <link rel="stylesheet" href="style.css">
    <base href="http://localhost/SSUPOSTER/register_view.php">
    <meta charset="UTF-8">
</head>
<body>
    <header>
        <h5 style="display: block; text-align: left; padding-left: 20px;">
            <a href="http://localhost/SSUPOSTER/login_view.php">back</a>
        </h5>
            <h1> 디지털 홍보물 플랫폼 : 애교심</h1>
    </header>
    <hr>
    <form action="register_server.php" method="post">
        <h2>간편회원가입</h2>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }?>

        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php }?>
        
        <?php if(isset($_GET['user_id'])) { ?>
        <input type="text" placeholder="아이디 입력" name="user_id" value="<?php echo $_GET['user_id']; ?>">
        <?php } else { ?>
        <input type="text" placeholder="아이디 입력" name="user_id">
        <?php } ?>

        <?php if(isset($_GET['user_email'])) { ?>
        <input type="text" placeholder="이메일 입력" name="user_email" value="<?php echo $_GET['user_email']; ?>">
        <?php } else { ?>
        <input type="text" placeholder="이메일 입력" name="user_email">
        <?php } ?>

        <?php if(isset($_GET['user_nick'])) { ?>
        <input type="text" placeholder="닉네임 입력" name="user_nick" value="<?php echo $_GET['user_nick']; ?>">
        <?php } else { ?>
        <input type="text" placeholder="닉네임 입력" name="user_nick">
        <?php } ?>

        <input type="password" placeholder="비밀번호 입력" name="pass1">
        <input type="password" placeholder="비밀번호 확인" name="pass2">
        
        <div class="register" style="display: block;">
            <button type="sumbit">가입</button>
        </div>
        
        <div style="display: block; text-align: center; padding-top: 5px;">
            <a href="http://localhost/SSUPOSTER/login_view.php">이미 회원이신가요? (로그인 페이지)</a>
        </div>
    </form>
</body>
</html>

<style>
        body {
            font-family: 'NanumSquare', "Apple SD Neo Gothic", "Malgun Gothic", dotum, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        header {
            background-color: #ffffff;
            color: #2793ff;
            text-align: center;
        }

        h1 {
            color: #2793ff;
        }

        hr {
            border: 1px solid #2793ff;
            width: 80%;
            margin: 20px auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .register button {
            background-color: #2793ff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .register button:hover {
            background-color: #1a73e8;
        }

        .error, .success {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
        }

        a {
            color: #2793ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-link {
            text-align: left;
            padding-left: 20px;
            margin-bottom: 10px;
        }
    </style>