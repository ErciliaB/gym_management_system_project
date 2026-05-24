<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    mysqli_query($conn, "UPDATE classes SET trainer_id = NULL WHERE trainer_id = '$id'");

    $sql = "DELETE FROM trainers WHERE trainer_id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_trainers.php");
        exit();
    } else {
        echo "Error deleting trainer: " . mysqli_error($conn);
    }
} else {
    header("Location: manage_trainers.php");
    exit();
}
?>