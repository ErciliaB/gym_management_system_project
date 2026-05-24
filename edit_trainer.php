<?php
include "db_connect.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM trainers WHERE trainer_id='$id'");
$trainer = mysqli_fetch_assoc($result);

if (isset($_POST['update_trainer'])) {
    $trainer_name = mysqli_real_escape_string($conn, $_POST['trainer_name']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    $sql = "UPDATE trainers
            SET trainer_name='$trainer_name',
                specialization='$specialization',
                email='$email',
                phone_number='$phone_number'
            WHERE trainer_id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_trainers.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Trainer | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="manage_trainers.php">BACK</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <div class="card">
        <h1>Edit Trainer</h1>

        <form method="POST">
            <input type="text" name="trainer_name"
                   value="<?php echo $trainer['trainer_name']; ?>" required>

            <input type="text" name="specialization"
                   value="<?php echo $trainer['specialization']; ?>" required>

            <input type="email" name="email"
                   value="<?php echo $trainer['email']; ?>" required>

            <input type="text" name="phone_number"
                   value="<?php echo $trainer['phone_number']; ?>" required>

            <br><br>

            <button type="submit" name="update_trainer">Update Trainer</button>
        </form>
    </div>
</section>

</body>
</html>