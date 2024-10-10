<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포스터 세부 정보</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>포스터 세부 정보</h1>
    </header>
    <main>
        <?php
        if (isset($_GET['id'])) {
            $posterId = intval($_GET['id']);
            include('poster_details_server.php');
        } else {
            echo "<p>유효하지 않은 포스터 ID입니다.</p>";
        }
        ?>
    </main>
</body>
</html>
