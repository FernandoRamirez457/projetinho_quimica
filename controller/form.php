<?php
// Iniciar a sessão, caso necessário
session_start();

// Incluir arquivo de conexão
require_once __DIR__.'/./DAO/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar os dados do formulário
    $id_comodo = $_POST['id_comodo'];
    $id_categoria = $_POST['id_categoria'];
    $nome_produto = $_POST['nome_produto'];
    $introducao = $_POST['introducao'];
    $composicao = $_POST['composicao'];
    $combinacoes_perigosas = $_POST['combinacoes_perigosas'];
    $manipulacao = $_POST['manipulacao'];
    $video = $_POST['video'];
    $banner = $_POST['banner'];
    $descricao = $_POST['descricao'];
    $data_publicacao = $_POST['data_publicacao'];
    $acessos = $_POST['acessos'];
    $armazenamento = $_POST['armazenamento'];

    // Conectar ao banco de dados
    $conexao = Conectar();
    
    if ($conexao) {
        // Preparar o SQL para inserção
        $sql = "INSERT INTO postagem 
                (id_comodo, id_categoria, nome_produto, introducao, composicao, combinacoes_perigosas, manipulacao, 
                video, banner, descricao, data_publicacao,armazenamento, acessos) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar a declaração
        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // Vincular parâmetros
            mysqli_stmt_bind_param($stmt, 'iissssssssssi', $id_comodo, $id_categoria, $nome_produto, $introducao, 
                                   $composicao, $combinacoes_perigosas, $manipulacao, $video, $banner, $descricao, 
                                   $data_publicacao,$armazenamento, $acessos);

            // Executar a declaração
            if (mysqli_stmt_execute($stmt)) {
                echo "Postagem inserida com sucesso!";
            } else {
                echo "Erro ao inserir postagem: " . mysqli_error($conexao);
            }

            // Fechar a declaração
            mysqli_stmt_close($stmt);
        } else {
            echo "Erro na preparação da consulta: " . mysqli_error($conexao);
        }

        // Fechar a conexão
        Desconectar($conexao);
    }
}

?>