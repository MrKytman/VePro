<?php
include "header.php";

if (isset($_POST['change-pass'])) {
    $old_pass = !empty($_POST['old-pass']) ? trim($_POST['old-pass']) : null;
    $new_pass = !empty($_POST['new-pass']) ? trim($_POST['new-pass']) : null;
    $renew_pass = !empty($_POST['renew-pass']) ? trim($_POST['renew-pass']) : null;

    $sqlChangePass = "SELECT id, username, password FROM userstable WHERE id = :id";
    $stmtChangePass = $pdo->prepare($sqlChangePass);
    $stmtChangePass->bindValue(':id', $_SESSION['user_id']);
    $stmtChangePass->execute();
    $userChangePass = $stmtChangePass->fetch();

    $validPassword = password_verify($old_pass, $userChangePass['password']);

    if ($validPassword) {
        if ($new_pass === $renew_pass && $new_pass != $old_pass) {

            $uppercase = preg_match('@[A-Z]@', $new_pass);
            $lowercase = preg_match('@[a-z]@', $new_pass);
            $number = preg_match('@[0-9]@', $new_pass);

            if (!$uppercase || !$lowercase || !$number || strlen($new_pass) < 8) {
                echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            } else {
                $passwordHash = password_hash($new_pass, PASSWORD_BCRYPT, array("cost" => 12));
                $stmtChangePass = $pdo->prepare("UPDATE userstable SET password = :password WHERE id = :id ");
                $stmtChangePass->bindValue(':password', $passwordHash);
                $stmtChangePass->bindValue(':id', $_SESSION['user_id']);
                $successfull = $stmtChangePass->execute();

                if ($successfull){
                    header('Location: index.php');
                }
            }
        } else {
            echo "New password is the same as the new one or the new ones aren't the same.";
        }
    } else {
        echo "Old password is invalid";

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vepro - Account</title>
</head>
<body>
<?php include "navbar.php"; ?>

<h1 style="text-align: center;">My Account</h1>

<div class="outerwrap">
    <div class="innerwrap changepass">
        <h3>Change password</h3>
        <form method="post" action="myaccount.php">
            <input type="password" name="old-pass" placeholder="Old Password"><br>
            <input type="password" name="new-pass" placeholder="New Password"><br>
            <input type="password" name="renew-pass" placeholder="Repeat New Password"><br>
            <input type="submit" name="change-pass" value="Change Password">
        </form>
    </div>
</div>
</body>
</html>