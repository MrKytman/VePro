<div class="nav-outer">
    <ul class="navwrapper">
        <li><a href="index.php">Home</a></li>
        <li><a href="myaccount.php">My Account</a></li>
        <?php
        if (isset($_SESSION['user_id'])) {
            $sqlRole = "SELECT id, username, role FROM userstable WHERE id = :id";
            $stmtRole = $pdo->prepare($sqlRole);
            $stmtRole->bindValue(':id', $_SESSION['user_id']);
            $stmtRole->execute();
            $userRole = $stmtRole->fetch();

            if ($userRole['role'] === 3) {
                echo '<li><a href="admin-dash.php">Admin Dashboard</a></li>';
            }

            echo '<li><form method="post"><input type="submit" name="logout" value="Logout"></form></li>';
        } else {
            echo '<li><<a href="login.php">Login</a></li>';
        }
        ?>

    </ul>
</div>