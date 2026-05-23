<?php
include "db_connect.php";

$class_id = $_GET['class_id'];

$class_result = mysqli_query($conn, "SELECT * FROM classes WHERE class_id='$class_id'");
$class = mysqli_fetch_assoc($class_result);

$trainer_result = mysqli_query($conn, "SELECT * FROM trainers");

if (isset($_POST['update_class'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $class_date = mysqli_real_escape_string($conn, $_POST['class_date']);
    $class_time = mysqli_real_escape_string($conn, $_POST['class_time']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $class_description = mysqli_real_escape_string($conn, $_POST['class_description']);
    $trainer_id = mysqli_real_escape_string($conn, $_POST['trainer_id']);

    $sql = "UPDATE classes SET
            class_name='$class_name',
            class_date='$class_date',
            class_time='$class_time',
            capacity='$capacity',
            class_description='$class_description',
            trainer_id='$trainer_id'
            WHERE class_id='$class_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage_classes.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Class | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>
    <nav class="nav-links">
        <a href="manage_classes.php">BACK</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">
    <div class="card">
        <h1>Edit Class</h1>

        <form method="POST">
            <input type="text" name="class_name" value="<?php echo $class['class_name']; ?>" required>

            <input type="date" name="class_date" value="<?php echo $class['class_date']; ?>" required>

            <input type="time" name="class_time" value="<?php echo $class['class_time']; ?>" required>

            <input type="number" name="capacity" value="<?php echo $class['capacity']; ?>" required>

            <textarea name="class_description" required><?php echo $class['class_description']; ?></textarea>

            <select name="trainer_id" required>
                <?php while ($trainer = mysqli_fetch_assoc($trainer_result)) { ?>
                    <option value="<?php echo $trainer['trainer_id']; ?>"
                        <?php if ($trainer['trainer_id'] == $class['trainer_id']) echo "selected"; ?>>
                        <?php echo $trainer['trainer_name']; ?>
                    </option>
                <?php } ?>
            </select>

            <br><br>

            <button type="submit" name="update_class">Update Class</button>
        </form>
    </div>
</section>

</body>
</html>