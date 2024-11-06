<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require './DAO/autenticacao_user.php';
require '../model/User.php';
require './utils.php';


$req = $_SERVER;

switch ($req["REQUEST_METHOD"]) {
    case "POST":
        //Recebe os dados de login
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //Função para procurar na base de dados
        $resultado  = Autenticar($email,$senha);

        // Redirecionamento
        if($resultado == "Adm"){
            // Página de Administrador / Contribuidor se for autenticado
            header('Location: ../view/perfilAdm.php');
        }else if($resultado == "User"){
            // Página de usuário se for autenticado
            header('Location: ../view/paginaUser.php');
        } else {
            // Volta para a página de login
            header('Location: http://localhost/projetinho_quimica/view/login.html');
        }
        // // Retorno da resposta
         echo json_encode($status);
        break;
    default:
        break;
}
