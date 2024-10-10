<?php
session_start();
session_unset(); 
session_destroy();

header("Location: http://localhost/SSUPOSTER/login_view.php"); // 로그인 페이지로 리다이렉트
exit();
?>