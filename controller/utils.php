<?php 
    // Função usada para retornar respostas
    function criarResposta($status, $msg){
       require_once '../model/Resposta.php';
       $resp = new Resposta($status, $msg);
    
        return $resp;
    }