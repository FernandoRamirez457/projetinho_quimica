<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require './DAO/insert_users.php';
require '../model/User.php';
require './utils.php';


$req = $_SERVER;
// Switch case para cadastro de usuários
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
            header('Location: http://localhost/projetinho_quimica/view/login.html');
        } else {
            $status = criarResposta("400","Falha ao Incluir!");
        }
        // Retorno da resposta
        echo json_encode($status);
        break;
    default:
        // ...
        break;
}
