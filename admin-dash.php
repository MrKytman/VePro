<?php
include "header.php";

if (isset($_SESSION['user_id'])) {

    $sqlRoleCheck = "SELECT id, username, role FROM userstable WHERE id = :id";
    $stmtRoleCheck = $pdo->prepare($sqlRoleCheck);
    $stmtRoleCheck->bindValue(':id', $_SESSION['user_id']);
    $stmtRoleCheck->execute();
    $userRoleCheck = $stmtRoleCheck->fetch();

    if ($userRoleCheck['role'] != 3) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vepro - Admin Dashboard</title>
</head>
<body>
<?php include "navbar.php"; ?>

<h1 style="text-align: center;">Admin Dashboard</h1>

</body>
</html>

