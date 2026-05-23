<?php
include "db_connect.php";

$result = mysqli_query($conn, "SELECT * FROM memberships");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Memberships</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header class="navbar">
    <div class="logo">AURA ADMIN</div>

    <nav class="nav-links">
        <a href="admin_dashboard.php">DASHBOARD</a>
        <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<section class="page-container">

    <h1 style="margin-bottom: 20px;">
        Manage Membership Plans
    </h1>

    <div style="margin-bottom: 30px;">
        <a href="add_membership.php" class="btn">
            Add Membership
        </a>
    </div>

    <table class="data-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Plan</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['membership_id']; ?></td>

            <td><?php echo $row['membership_name']; ?></td>

            <td><?php echo $row['duration']; ?></td>

            <td>$<?php echo $row['price']; ?></td>

            <td>

                <a class="btn"
                   href="edit_membership.php?id=<?php echo $row['membership_id']; ?>">
                    Edit
                </a>

                <a class="btn-outline"
                   href="delete_membership.php?id=<?php echo $row['membership_id']; ?>"
                   onclick="return confirm('Delete this membership?');">
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</section>

</body>
</html>