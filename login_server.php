<?php
include('db.php');
session_start();

if(isset($_POST['user_id']) && isset($_POST['pass1'])) {
    $id = mysqli_real_escape_string($db, $_POST['user_id']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);

    if(empty($id)) {
        header("location: login_view.php?error=아이디를 입력해주세요!");
        exit();
    }
    else if(empty($pass1)) {
        header("location: login_view.php?error=비밀번호를 입력해주세요!");
        exit();
    }
    else {
        $sql = "select * from member where mb_id = '$id'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if(password_verify($pass1, $hash)) {

                $_SESSION['mb_id'] = $row['mb_id'];
                $_SESSION['mb_nick'] = $row['mb_nick'];
                $_SESSION['no'] = $row['no'];

                header("location: http://localhost/SSUPOSTER/poster_view.php");
                exit();
            }
            else {
                header("location: login_view.php?error=비밀번호가 틀립니다! ");
                exit();
            }
        } 
        else {
            header("location: login_view.php?error=아이디가 존재하지 않습니다! ");
                exit();
        }
    }
}
else {
    header("location: login_view.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}

?>