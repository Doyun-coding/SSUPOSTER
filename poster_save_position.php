<?php
include('db.php');
session_start();

if (isset($_POST['user_id']) && isset($_POST['pos_x']) && isset($_POST['pos_y'])) {
    $id = $_POST['user_id'];
    $pos_x = $_POST['pos_x'];
    $pos_y = $_POST['pos_y'];

    $query = "UPDATE posters SET pos_x = ?, pos_y = ? WHERE user_id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('iii', $pos_x, $pos_y, $id);
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
