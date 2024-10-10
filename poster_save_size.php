<?php
include('db.php');
session_start();

if (isset($_POST['user_id']) && isset($_POST['width']) && isset($_POST['height'])) {
    $id = $_POST['user_id'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    $query = "UPDATE posters SET width = ?, height = ? WHERE user_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('iii', $width, $height, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Success';
    } else {
        echo 'Error';
    }

    $stmt->close();
    $db->close();
}
?>
