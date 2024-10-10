<?php
include('db.php');
session_start();

// 데이터베이스에서 저장된 포스터 정보 불러오기
$query = "SELECT user_id, file_name, file_type, file_data, pos_x, pos_y, width, height FROM posters";
$result = $db->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="poster" data-id="' . $row['user_id'] . '" style="left: ' . $row['pos_x'] . 'px; top: ' . $row['pos_y'] . 'px; width: ' . $row['width'] . 'px; height: ' . $row['height'] . 'px;">';
        echo '<img src="data:' . $row['file_type'] . ';base64,' . base64_encode($row['file_data']) . '" alt="' . $row['file_name'] . '" style="width: 100%; height: 100%;">';
        echo '<div class="poster-resize"></div>';
        echo '</div>';
    }
} else {
    echo 'No posters found';
}

$db->close();
?>
