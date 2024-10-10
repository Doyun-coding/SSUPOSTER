<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['mb_id'];
    $bg_value = intval($_POST['bg_color']);

    echo "hello";

    // if ($bg_value >= 1 && $bg_value <= 3) {
    //     $query = "UPDATE member SET back_color = '$bg_value' WHERE id = '$user_id'";
    //     $stmt = $db->prepare($query);
    //     $stmt->bind_param('back_color', $bg_value);

    //     if ($stmt->execute()) {
    //         echo "Background color updated successfully.";
    //     } else {
    //         echo "Error updating background color: " . $stmt->error;
    //     }

    //     $stmt->close();
    // } else {
    //     echo "Invalid background value.";
    // }

    // $db->close();
} else {
    echo "Invalid request method.";
}
?>
