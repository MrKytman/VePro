<?php
require 'dbconnect.php';

if (isset($_POST['register'])) {

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $phrase = !empty($_POST['phrase']) ? trim($_POST['phrase']) : null;
    $answer = !empty($_POST['answer']) ? trim($_POST['answer']) : null;

    $sql = "SELECT COUNT(username) AS num FROM userstable WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch();

    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);

    if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
        $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

        $sql = "INSERT INTO userstable (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $passwordHash);

        $successfull = $stmt->execute();

        if ($successfull) {
            header('Location: login.php');
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<form action="register.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br>
    <input type="submit" name="register" value="Register">
</form>
</body>
</html>
