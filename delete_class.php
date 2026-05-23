<?php
include "db_connect.php";

if (isset($_GET['class_id'])) {
    $class_id = mysqli_real_escape_string($conn, $_GET['class_id']);

    mysqli_query($conn, "DELETE FROM bookings WHERE class_id='$class_id'");

    $sql = "DELETE FROM classes WHERE class_id='$class_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_classes.php");
        exit();
    } else {
        echo "Error deleting class: " . mysqli_error($conn);
    }
} else {
    header("Location: manage_classes.php");
    exit();
}
?>