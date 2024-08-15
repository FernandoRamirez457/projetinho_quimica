<?php
function Autenticar($email, $senha)
{
    session_start();

    require 'conexao.php';

    $conexao = conectar();

    /*Continue a partir daqui */
    // Preparar a consulta SQL com UNION para ambas as tabelas
    $sql = "SELECT id_usuario AS id, nome_user AS nome, email_user AS email, senha_user AS senha
    FROM usuario
    WHERE email_user = ?";

    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        return "Erro na preparação da consulta: " . $conexao->error;
    }

    //Procura o email na base de dados
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();

    //Se achar um email correspondente executa o if abaixo
    if($stmt->num_rows > 0){
        $stmt->bind_result($id, $nome, $email_db, $senha_db);
        $stmt->fetch();

        // Verificar a senha
        if (password_verify($senha, $senha_db)) {
            // Senha válida
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email_db;
            return "Sucesso";
        } else {
            // Senha inválida
            session_unset();
            session_destroy();
            return "Erro";
        }
    }else{
        // Nenhum registro encontrado
        session_unset();
        session_destroy();
        return "Erro";
    }

    fecharConexao($conexao);
    $stmt->close();
}
