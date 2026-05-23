<?php
include "db_connect.php";

$message_status = "";

if (isset($_POST['send'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (full_name, email, message)
            VALUES ('$full_name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        $message_status = "Message sent successfully.";
    } else {
        $message_status = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>
    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="classes.php">CLASSES</a>
        <a href="membership.php">MEMBERSHIP</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>

<section class="page-container">
    <div class="card">
        <h1>Contact Us</h1>

        <p><?php echo $message_status; ?></p>

        <form method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>

            <textarea name="message" placeholder="Write your message" required></textarea>
            <br><br>

            <button type="submit" name="send">Send Message</button>
        </form>
    </div>
</section>

</body>
</html>