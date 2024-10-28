<?php
function increment_view($id_postagem)
{
    require 'conexao.php';
    //Criando a conexão
    $conexao = Conectar();

    //Criação da consulta
    $stmt = $conexao->prepare("UPDATE postagem SET acessos = acessos + 1 WHERE id_postagem = ?");

    //Associando os parametros com as variaveis
    $stmt->bind_param("i", $id_postagem,);

    //Retorna o resultado
    if ($stmt->execute()) {
        //Fechando a conexão
        Desconectar($conexao);

        //Fechando a consulta
        $stmt->close();
        return "Sucesso";
    } else {
        //Fechando a conexão
        Desconectar($conexao);

        //Fechando a consulta
        $stmt->close();
        return "Falha";
    }
}
