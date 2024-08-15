<?php 
    function Insert_Post($dados){
        require 'conexao.php';

        //Extraindo os dados individualmente
        $comodo = $dados->comodo;
        $categoria = $dados->categoria;
        $nome_produto = $dados->nome_produto;
        $introducao = $dados->introducao;
        $composicao = $dados->composicao;
        $combinacoes_perigosas = $dados->combinacoes_perigosas;
        $manipulacao = $dados->manipulacao;
        $video = $dados->video;
        $banner = $dados->banner;
        $descricao = $dados->descricao;
        $data = $dados->data_publicacao;
        $acessos = $dados->acessos;

        //Declaração da variavel do id do comodo
        $id_comodo;

        //Switch para decidir qual o comodo correspondente
        switch($comodo){
            case "Cozinha":
                $id_comodo = 1;                
                break;
            case "Quarto":
                $id_comodo = 2;                
                break;
            case "Sala":
                $id_comodo = 3;                
                break;
            case "Banheiro":
                $id_comodo = 4;                
                break;
            case "Lavanderia":
                $id_comodo = 5;                
                break;
            default:
                $id_comodo = null;
                break;
        }
        
        //Declaração da variavel do id da categoria
        $id_categoria;

        //Switch para decidir qual a categoria correspondente
        switch($categoria){
            case "Misturas da Internet":
                $id_categoria = 1;                
                break;
            case "Mito ou Verdade":
                $id_categoria = 2;                
                break;
            case "Misturas Perigosas":
                $id_categoria = 3;                
                break;
            case "Usos Errados":
                $id_categoria = 4;                
                break;
            case "Produtos de Higiene":
                $id_categoria = 5;                
                break;
            default:
                $id_categoria = null;
                break;
        }

        //Criando a conexão
        $conexao = conectar();

        //Caso ache os 2 ids necessários
        if($id_categoria && $id_comodo !== null){
            //Uso de prepared statements
            //Criação da consulta
            $stmt = $conexao->prepare("INSERT INTO postagem (id_comodo, id_categoria, nome_produto, introducao, composicao, combinacoes_perigosas, manipulacao, video,banner,descricao,data_publicacao, acessos)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

            //Associando os parametros com as variaveis
            $stmt->bind_param("sssssssssssi",$id_comodo,$id_categoria,$nome_produto,$introducao,$composicao,$combinacoes_perigosas,$manipulacao,$video,$banner,$descricao,$data, $acessos);

            //Retorna o resultado
            if($stmt->execute()){
                return "Sucesso";
            }else{
                return "Falha";
            }
            //Fechando a consulta
            $stmt->close();
            //Fechando a conexão
            fecharConexao($conexao);
        }
    };
    function Fetch_All_Posts() {
        require 'conexao.php';
        $conexao = conectar();
    
        // Monta a consulta SQL usando o valor do input diretamente
        $query = "SELECT * FROM postagem";
    
        // Prepara a consulta
        $stmt = $conexao->prepare($query);
        
        // Executa a consulta
        $stmt->execute();
        
        // Obtém o resultado
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        
        // Fecha a consulta e a conexão
        $stmt->close();
        fecharConexao($conexao);
        
        return json_encode($data);
    }
?>