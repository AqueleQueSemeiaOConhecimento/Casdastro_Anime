<?php

    // Aqui eu chamo a conexão com o banco de dados
    include './conexao.php';

    // As variaveis que vão receber o $_POST[]
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $date_lancamento = $_POST['lancamento'];
    $genero_anime = $_POST['genero'];


    // Vendo se estou pegando os elementos dos generos dos animes.
    if(isset($_POST['genero'])){

        try{
            // Aqui vou colocar os dados na tabela posts
            $stmt = $pdo->prepare("INSERT INTO posts (title, content, dataano) VALUES (:nome, :descricao, :dataLancamento)");

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':dataLancamento', $date_lancamento);


            $stmt->execute();

                    // Obtenho post_id
                    $post_id = $pdo->lastInsertId();
            echo 'Dados inseridos com sucesso!'.PHP_EOL;

        }

        catch (PDOException $e){

            echo 'Erro ao inserir dados: '. $e->getMessage();
        }

    
        try {
        
        $stmt = $pdo->prepare("INSERT INTO tags (nome) VALUES (:genero)");
        $tags_ids = array();
        foreach($genero_anime as $generosSelecionados) {
    
            $stmt->bindParam(':genero', $generosSelecionados);
            $stmt->execute();

           // Obtenho tags_id
           $tags_ids[] = $pdo->lastInsertId();
            
        }
        echo 'Dados processador com sucesso'.PHP_EOL;
        }

        catch(PDOException $e){

            echo 'Erro ao inserir dados: '. $e->getMessage();
        }

        try {

            $stmt = $pdo->prepare("INSERT INTO post_tags (post_id, tag_id) VALUES (:post, :tag)");
            foreach ($tags_ids as $tag_id) {
                $stmt->bindParam(':post', $post_id);
                $stmt->bindParam(':tag', $tag_id);
                $stmt->execute();
            }

            

            echo 'Dados cedidos com sucesso'.PHP_EOL;

        }
        catch(PDOException $e){

            echo 'Erro ao inserir dados: '. $e->getMessage();
        }
    }

    else{
        echo 'Ta retornando vazio zé';
    }