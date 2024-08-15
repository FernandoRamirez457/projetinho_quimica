<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="./css/assets/main.css">
    <link rel="stylesheet" href="./css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="welcome-back">
            <h2>Bem vindo de volta!</h2>
            <p>Para se manter conectado conosco, faça login com suas informações pessoais</p>
            <a href="login.html" class="button">LOGIN</a>
        </div>
        <div class="create-account">
            <h2>Criar uma conta</h2>
            <form action="cadastro.php" method="POST">
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="dat" placeholder="Dat Nascimento">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="senha" placeholder="Senha">       
                <button type="submit" class="button">CADASTRAR</button>
            </form>
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
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $dat = mysqli_real_escape_string($conexao, $_POST['dat']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    // Prepara a consulta
    $query = "INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

    if (mysqli_stmt_execute($stmt)) {
        // Redireciona para a página de login após o cadastro bem-sucedido
        header("Location: ./login.php");
        exit(); // É uma boa prática usar exit() após redirecionamento
    } else {
        // Lidar com o erro, por exemplo, exibindo uma mensagem de erro
        echo "Erro ao cadastrar usuário.";
    }

    mysqli_stmt_close($stmt);
    fecharConexao($conexao);
}
?>
