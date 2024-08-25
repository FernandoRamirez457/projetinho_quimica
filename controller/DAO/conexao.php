<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');

    require_once __DIR__.'/../../model/Resposta.php';
    function Conectar() {
        $host = 'bdprojeto-quimica-projeto-quimica.h.aivencloud.com';
        $usuario = 'avnadmin';
        $senha = 'AVNS_wcVzgD0zEbTL_ztWbhH';
        $port = '15665';
        $bd = 'db_produtos_perigosos';
        
        // Criar a conexão com SSL
        $conexao = mysqli_init();
        mysqli_ssl_set($conexao, NULL, NULL, __DIR__.'/ca.pem', NULL, NULL);
        mysqli_real_connect($conexao, $host, $usuario, $senha, $bd, $port, NULL, MYSQLI_CLIENT_SSL);
        
        if (mysqli_connect_errno()) {
            $retorno = new Resposta(500, "Falha ao Conectar: " . mysqli_connect_error());
            echo json_encode($retorno);
            return null;
        }
    
        return $conexao;
    }
    
    function Desconectar($conexao) {
        if ($conexao) {
            mysqli_close($conexao);
            $retorno = new Resposta(202, "Conexão encerrada.");
        } else {
            $retorno = new Resposta(500, "Não conseguiu fechar a conexão, provavelmente não existiu conexão.");
        }
        return $retorno;
    }