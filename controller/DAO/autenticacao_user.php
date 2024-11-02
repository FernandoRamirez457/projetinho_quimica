<?php
function Autenticar($email, $senha)
{
    session_start();

    require 'conexao.php';

    $conexao = Conectar();

    // Preparação da primeira consulta na tabela usuario
    $sql = "SELECT id_usuario AS id, nome_user AS nome, email_user AS email, senha_user AS senha
            FROM usuario
            WHERE email_user = ?";

    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        return "Erro na preparação da consulta: " . $conexao->error;
    }

    // Procura o email na tabela usuario
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Se o email for encontrado na tabela usuario
        $stmt->bind_result($id, $nome, $email_db, $senha_db);
        $stmt->fetch();

        if (password_verify($senha, $senha_db)) {
            // Senha válida
            $_SESSION['id_user'] = $id;
            $_SESSION['nome_user'] = $nome;
            $_SESSION['email_user'] = $email_db;

            Desconectar($conexao);
            $stmt->close();

            return "Sucesso";
        }
    } else {
        // Se o email não for encontrado na tabela usuario, procura na tabela contribuidor
        $sql = "SELECT id_contribuidor AS id, nome_contribuidor AS nome, email_contribuidor AS email, senha_contribuidor AS senha
                FROM contribuidor
                WHERE email_contribuidor = ?";

        $stmt = $conexao->prepare($sql);
        if (!$stmt) {
            return "Erro na preparação da consulta: " . $conexao->error;
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Se o email for encontrado na tabela contribuidor
            $stmt->bind_result($id, $nome, $email_db, $senha_db);
            $stmt->fetch();

            if (password_verify($senha, $senha_db)) {
                // Senha válida
                $_SESSION['id_contribuidor'] = $id;
                $_SESSION['nome_contribuidor'] = $nome;
                $_SESSION['email_contribuidor'] = $email_db;

                Desconectar($conexao);
                $stmt->close();

                return "Sucesso";
            }
        }
    }

    // Se nenhum registro foi encontrado ou senha inválida
    session_unset();
    session_destroy();

    Desconectar($conexao);
    $stmt->close();

    return "Erro";
}
