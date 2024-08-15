<?php
session_start();

if (!isset($_SESSION['email_user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['email_user']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
