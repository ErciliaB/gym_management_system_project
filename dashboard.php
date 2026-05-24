<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT users.*, memberships.membership_name
        FROM users
        LEFT JOIN memberships ON users.membership_id = memberships.membership_id
        WHERE users.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
 <a href="dashboard.php">DASHBOARD</a>
<a href="classes.php">CLASSES</a>
<a href="my_bookings.php">MY BOOKINGS</a>
<a href="access_card.php">ACCESS CARD</a>
<a href="membership.php">MEMBERSHIPS</a>
<a href="contact.php">CONTACT</a>
<a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1>Welcome, <?php echo $user['first_name']; ?>!</h1>
    <p>Manage your membership, classes and bookings from your dashboard.</p>

    <div class="features">

        <div class="feature-card">
            <h3>Membership</h3>
            <p>
                Current Plan:
                <?php echo $user['membership_name'] ? $user['membership_name'] : "No membership selected"; ?>
            </p>
        </div>

        <div class="feature-card">
            <h3>Book Classes</h3>
            <p>View available gym classes and reserve your spot.</p>
            <br>
            <a class="btn" href="classes.php">View Classes</a>
        </div>

       <div class="feature-card">
    <h3>Access Card</h3>

   <p>
    Access your digital membership card.
</p>

<br>

<a class="btn" href="access_card.php">
    Open Card
</a>
</div>

        <div class="feature-card">
            <h3>Account</h3>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Phone: <?php echo $user['phone_number']; ?></p>
        </div>

    </div>

</section>

</body>
</html>