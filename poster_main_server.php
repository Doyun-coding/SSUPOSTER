<?php
include('db.php');
session_start();

// 카테고리 ID를 GET 파라미터로 받기
$category = isset($_GET['category']) ? $_GET['category'] : 'default';

$sql_category = "";

switch($category) {
    case 'humanitiesPoster':
        $sql_category = "인문대학";
        break;
    case 'sciencePoster':
        $sql_category = "자연과학대학";
        break;
    case 'businessPoster':
        $sql_category = "경영대학";
        break;
    case 'engineeringPoster':
        $sql_category = "공과대학";
        break;
    case 'itPoster':
        $sql_category = "IT대학";
        break;
    case "clubPoster":
        $sql_category = "동아리";
        break;
    case "externalPoster":
        $sql_category = "외부활동";
        break;
    default:
        break;
}

// 데이터베이스에서 저장된 포스터 정보 불러오기
$query = "SELECT user_id, file_name, file_type, file_data, pos_x, pos_y, width, height FROM posters WHERE poster_category = '$sql_category'";
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