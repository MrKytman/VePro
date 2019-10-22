<?php
require 'dbconnect.php';
session_start();

if (isset($_POST['login'])) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, username, password FROM userstable WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user === false) {
        die('Incorrect username / password combination!');
    } else {
        $validPassword = password_verify($passwordAttempt, $user['password']);

        if ($validPassword) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            header('Location: index.php');
            exit;

        } else {
            die('Incorrect username / password combination!');
        }
    }

}
?>
<link rel="stylesheet" href="css/login-style.css" type="text/css">

<div class="login-wrapper">
    <form method="post" action="login.php">
        <fieldset>
            <legend>Log in</legend>
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="login" value="login">
        </fieldset>
    </form>
    <p>Click <a href="register.php">here</a> to register.</p>
</div>