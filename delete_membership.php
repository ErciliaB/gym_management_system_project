<?php
include "db_connect.php";

if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM memberships
            WHERE membership_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_memberships.php");
        exit();
    } else {
        echo "Error deleting membership: " . mysqli_error($conn);
    }

} else {
    header("Location: manage_memberships.php");
    exit();
}
?>