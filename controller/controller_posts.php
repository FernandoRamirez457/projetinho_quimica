<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


require __DIR__.'/DAO/insert_posts.php';
require __DIR__.'/utils.php';


// Recebe o tipo da requisição
$req = $_SERVER;

switch($req["REQUEST_METHOD"]){
    case "POST":
        // Recebe os dados da requisição
        $dados = json_decode(file_get_contents('php://input'));

        // Função para inserir no banco de dados
        $resultado = Insert_Post($dados);

        // Criação da resposta
        if($resultado == "Sucesso"){
            $status = criarResposta("200","Sucesso ao Incluir!");
        } else {
            $status = criarResposta("400","Falha ao Incluir!");
        }

        // Retorno da resposta
        echo json_encode($status);
        break;

    case "GET":
        // Função para pegar todos os dados da tabela
        $dados = Fetch_All_Posts();

        if ($dados !== null) {
            echo $dados;  // Aqui já é JSON codificado
        } else {
            $status = criarResposta("400", "Erro ao procurar!");
            echo json_encode($status);
        }
        break;
}
