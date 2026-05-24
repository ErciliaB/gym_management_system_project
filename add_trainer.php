<?php
include "db_connect.php";

$message = "";

if (isset($_POST['add_trainer'])) {
    $trainer_name = mysqli_real_escape_string($conn, $_POST['trainer_name']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    $sql = "INSERT INTO trainers
            (trainer_name, specialization, email, phone_number)
            VALUES
            ('$trainer_name', '$specialization', '$email', '$phone_number')";

    if (mysqli_query($conn, $sql)) {
        $message = "Trainer added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Trainer | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="manage_trainers.php">TRAINERS</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <div class="card">
        <h1>Add Trainer</h1>

        <p><?php echo $message; ?></p>

        <form method="POST">
            <input type="text" name="trainer_name" placeholder="Trainer Name" required>

            <input type="text" name="specialization" placeholder="Specialization" required>

            <input type="email" name="email" placeholder="Email Address" required>

            <input type="text" name="phone_number" placeholder="Phone Number" required>

            <br><br>

            <button type="submit" name="add_trainer">Add Trainer</button>
        </form>
    </div>
</section>

</body>
</html>