<!DOCTYPE html>
<html>
<head>
    <title>Login | Aura Fitness Club</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA FITNESS CLUB</div>

    <nav class="nav-links">
        <a href="index.php">HOME</a>
        <a href="classes.php">CLASSES</a>
        <a href="register.php">REGISTER</a>
    </nav>
</header>

<section class="page-container">

    <div class="card">

        <h1>Member Login</h1>

        <?php if (!empty($message)) { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <br><br>

            <button type="submit">
                Login
            </button>

        </form>

        <br>

        <p>
            Don't have an account?
            <a href="register.php">Register Here</a>
        </p>

    </div>

</section>

</body>
</html>