<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require './DAO/autenticacao.php';
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
        if($resultado == "Sucesso"){
            // Página de usuário se for autenticado
            header('Location: ../view/perfilAdm.php');
        } else {
            // Volta para a página de login
            header('Location: http://127.0.0.1:5500/view/login.html');
        }
        // // Retorno da resposta
         echo json_encode($status);
        break;
    default:
        break;
}
