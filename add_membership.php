<?php
include "db_connect.php";

$message = "";

if(isset($_POST['add_membership']))
{
    $membership_name = mysqli_real_escape_string($conn,$_POST['membership_name']);
    $duration = mysqli_real_escape_string($conn,$_POST['duration']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $benefits = mysqli_real_escape_string($conn,$_POST['benefits']);

    $sql = "INSERT INTO memberships
            (membership_name,duration,price,benefits)
            VALUES
            ('$membership_name','$duration','$price','$benefits')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Membership added successfully.";
    }
    else
    {
        $message = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Membership</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="manage_memberships.php">MEMBERSHIPS</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

<div class="card">

<h1>Add Membership Plan</h1>

<p><?php echo $message; ?></p>

<form method="POST">

<input type="text"
       name="membership_name"
       placeholder="Membership Name"
       required>

<input type="text"
       name="duration"
       placeholder="Duration"
       required>

<input type="number"
       step="0.01"
       name="price"
       placeholder="Price"
       required>

<textarea
name="benefits"
placeholder="Membership Benefits"
required></textarea>

<br><br>

<button type="submit" name="add_membership">
Add Membership
</button>

</form>

</div>

</section>

</body>
</html>