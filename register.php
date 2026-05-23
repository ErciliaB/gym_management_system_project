<?php
include "db_connect.php";

$message = "";

if (isset($_POST['register'])) {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $membership_id = $_POST['membership_id'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "Email already exists.";
    } else {

        $sql = "INSERT INTO users
                (first_name, last_name, email, password, phone_number, membership_id)
                VALUES
                ('$first_name', '$last_name', '$email', '$password', '$phone', '$membership_id')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}

$membership_query = "SELECT * FROM memberships";
$membership_result = mysqli_query($conn, $membership_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>

<section class="page-container">

    <div class="card">

        <h1>Create Account</h1>

        <p><?php echo $message; ?></p>

        <form method="POST">

            <input type="text"
                   name="first_name"
                   placeholder="First Name"
                   required>

            <input type="text"
                   name="last_name"
                   placeholder="Last Name"
                   required>

            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   required>

            <input type="text"
                   name="phone"
                   placeholder="Phone Number"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <select name="membership_id" required>

                <option value="">Select Membership</option>

                <?php while($membership = mysqli_fetch_assoc($membership_result)) { ?>

                    <option value="<?php echo $membership['membership_id']; ?>">
                        <?php echo $membership['membership_name']; ?>
                    </option>

                <?php } ?>

            </select>

            <br><br>

            <button type="submit"
                    name="register">
                Register
            </button>

        </form>

    </div>

</section>

</body>
</html>