<?php
include "db_connect.php";
$result = mysqli_query($conn, "SELECT * FROM memberships");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Membership Plans | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>
    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="classes.php">CLASSES</a>
        <a href="contact.php">CONTACT</a>
        <a href="register.php">REGISTER</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>

<section class="page-container">
    <h1>Membership Plans</h1>
    <p>Choose the plan that suits your fitness goals.</p>

    <div class="features">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="feature-card">
                <h3><?php echo $row['membership_name']; ?></h3>
                <p><strong>Duration:</strong> <?php echo $row['duration']; ?></p>
                <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                <p><?php echo $row['benefits']; ?></p>
                <br>
                <a class="btn" href="register.php">Join Now</a>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>