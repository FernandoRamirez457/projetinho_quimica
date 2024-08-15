<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/assets/main.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <a href="" class="forgot-password">Esqueceu sua senha?</a>
                <button type="submit" class="button">ENTRAR</button>
            </form>
        </div>
        <div class="register">
            <h2>Hello, amigo!</h2>
            <p>Insira seus dados pessoais e comece a viagem conosco</p>
            <a href="cadastro.html" class="button">CADASTRE-SE</a>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include '../controller/DAO/conexao.php';
include '../model/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = conectar();
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    // Prepara a consulta
    $query = "SELECT * FROM usuario WHERE email_user = ? AND senha_user = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 1) {
        $_SESSION['email_user'] = $email;
        header("Location: acesso.php");
    } else {
        echo "Email ou senha inválidos!";
    }

    mysqli_stmt_close($stmt);
    fecharConexao($conexao);
}
?>
