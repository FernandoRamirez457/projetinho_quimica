<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require './DAO/insert_users.php';
require '../model/User.php';
require './utils.php';


$req = $_SERVER;

switch ($req["REQUEST_METHOD"]) {
    case "POST":
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //Cria uma instancia da classe Usuario
        $newUser = new Usuario($nome,$email,$senha);
        $resultado = Insert_Users($newUser);

        // Criação da resposta
        if($resultado == "Sucesso"){
            $status = criarResposta("200","Sucesso ao Incluir!");
        } else {
            $status = criarResposta("400","Falha ao Incluir!");
        }
        // Retorno da resposta
        echo json_encode($status);
        break;
    default:
        break;
}
