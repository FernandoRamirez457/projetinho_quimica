<?php
function Insert_Users($newUser)
{
    require 'conexao.php';

    $conexao = Conectar();

    $nome = $newUser->nome;
    $email = $newUser->email;
    $senha = $newUser->senha;

    // Gera o hash da senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Prepara a consulta SQL com prepared statements
    $stmt = $conexao->prepare("INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (?,?,?)");
    $stmt->bind_param("sss", $nome, $email, $senha_hash);
    if ($stmt->execute()) {
        //Fechando a conexão e a consulta
        $stmt->close();
        Desconectar($conexao);
        return "Sucesso";
    } else {
        //Fechando a conexão e a consulta
        $stmt->close();
        Desconectar($conexao);
        return "Falha";
    }
}
