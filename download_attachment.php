<?php
include('db.php');

if (isset($_GET['user_id'])) {
    $posterId = intval($_GET['user_id']);
    $query = "SELECT subfile_name, subfile_type, subfile_data FROM posters WHERE user_id = ?";
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param('i', $posterId);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($subfileName, $subfileType, $subfileData);
            $stmt->fetch();

            header('Content-Description: File Transfer');
            header('Content-Type: ' . $subfileType);
            header('Content-Disposition: attachment; filename="' . $subfileName . '"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            echo $subfileData;
            exit;
        } else {
            echo '<p>첨부 파일을 찾을 수 없습니다.</p>';
        }
        $stmt->close();
    } else {
        echo '<p>데이터베이스 쿼리 오류입니다.</p>';
    }
} else {
    echo '<p>유효하지 않은 요청입니다.</p>';
}
$db->close();
?>
