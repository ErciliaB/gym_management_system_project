<?php
include "db_connect.php";

$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM memberships WHERE membership_id='$id'"
);

$row = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update_membership']))
{
    $membership_name = mysqli_real_escape_string($conn,$_POST['membership_name']);
    $duration = mysqli_real_escape_string($conn,$_POST['duration']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $benefits = mysqli_real_escape_string($conn,$_POST['benefits']);

    $sql = "UPDATE memberships
            SET
            membership_name='$membership_name',
            duration='$duration',
            price='$price',
            benefits='$benefits'
            WHERE membership_id='$id'";

    if(mysqli_query($conn,$sql))
    {
        header("Location: manage_memberships.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Membership</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="manage_memberships.php">BACK</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

<div class="card">

<h1>Edit Membership</h1>

<form method="POST">

<input type="text"
       name="membership_name"
       value="<?php echo $row['membership_name']; ?>"
       required>

<input type="text"
       name="duration"
       value="<?php echo $row['duration']; ?>"
       required>

<input type="number"
       step="0.01"
       name="price"
       value="<?php echo $row['price']; ?>"
       required>

<textarea name="benefits" required><?php echo $row['benefits']; ?></textarea>

<br><br>

<button type="submit" name="update_membership">
Update Membership
</button>

</form>

</div>

</section>

</body>
</html>