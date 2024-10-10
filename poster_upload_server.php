<?php
include('db.php');
session_start();

$user_id = $_SESSION['mb_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $expiry = intval($_POST['poster_expiry']);
    $expiryDate = new DateTime();
    $expiryDate->modify("+$expiry days");

    if (isset($_FILES['poster_file']) && $_FILES['poster_file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['poster_file']['tmp_name'];
        $fileName = $_FILES['poster_file']['name'];
        $fileType = $_FILES['poster_file']['type'];

        $fileData = file_get_contents($fileTmpPath);

        if (isset($_FILES['poster_subfile']) && $_FILES['poster_subfile']['error'] == UPLOAD_ERR_OK) {
            $subfileTmpPath = $_FILES['poster_subfile']['tmp_name'];
            $subfileName = $_FILES['poster_subfile']['name'];
            $subfileType = $_FILES['poster_subfile']['type'];

            $subfileData = file_get_contents($subfileTmpPath);

            $posterDetails = mysqli_real_escape_string($db, $_POST['poster_details']);
            $posterCategory = mysqli_real_escape_string($db, $_POST['poster_category']);

            $expiryDateString = $expiryDate->format('Y-m-d H:i:s');

            $sql = "INSERT INTO posters (user_id, file_name, file_type, file_data, subfile_name, subfile_type, subfile_data, poster_details, poster_category, expiry_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('ssssssssss', $user_id, $fileName, $fileType, $fileData, $subfileName, $subfileType, $subfileData, $posterDetails, $posterCategory, $expiryDateString);

            if ($stmt->execute()) {
                echo "포스터가 성공적으로 업로드되었습니다.";
            } else {
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        } else {
            echo '서브 파일 업로드 오류 발생: ' . $_FILES['poster_subfile']['error'];
        }
    } else {
        echo '파일 업로드 오류 발생: ' . $_FILES['poster_file']['error'];
    }
} else {
    echo '유효하지 않은 요청입니다.';
}
?>
