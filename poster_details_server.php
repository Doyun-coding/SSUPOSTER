<?php
include('db.php');

if (isset($posterId)) {
    $query = "SELECT file_name, file_type, file_data, subfile_name, subfile_type, subfile_data, poster_details FROM posters WHERE user_id = ?";
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param('i', $posterId);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($fileName, $fileType, $fileData, $subfileName, $subfileType, $subfileData, $posterDetails);
            $stmt->fetch();
            
            // 포스터 이미지 출력
            echo '<div class="poster">';
            echo '<img src="data:' . htmlspecialchars($fileType) . ';base64,' . base64_encode($fileData) . '" alt="' . htmlspecialchars($fileName) . '">';
            // 포스터 세부사항 출력
            echo '<div class="poster-details">';
            echo '<h2>포스터 세부사항</h2>';
            echo '<p>' . nl2br(htmlspecialchars($posterDetails)) . '</p>';
            echo '</div>';
            // 첨부 파일 다운로드 링크 출력
            echo '<div class="poster-attachment">';
            echo '<h2>첨부 파일</h2>';
            echo '<a href="download_attachment.php?user_id=' . $posterId . '">' . htmlspecialchars($subfileName) . ' 다운로드</a>';
            echo '</div>';
            
            echo '</div>';

        } else {
            echo '<p>포스터를 찾을 수 없습니다.</p>';
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
