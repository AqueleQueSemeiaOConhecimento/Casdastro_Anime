<?php

    // Dados conexão com o banco de dados do projeto
    $host = 'localhost';
    $bd_nome = 'teste_anime';
    $user = 'root';
    $password = '0000';

    // try e catch


    // try - tentar isso

    try {
        /* 
        usei o objeto PDO para ter acesso ao banco de dados.
        O objeto PDO pede 4 parametros para realizar a conexão:
        nome do banco de dados acompanhados do tipo de host, nome do banco de dados,
        nome do usuario e a senha.
        */
        $pdo = new PDO("mysql:host=$host;dbname=$bd_nome;user=$user;password=$password");
        echo 'Conexão bem-sucedida! <br>';
        
    }
    // catch - se não isso

    /*
    O objeto PDO tem uma função chamada Exception onde aponta o erro que ocorreu caso
    a conexão não seja bem sucedida.
    */
    catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage() . '<br>';
    }

    // Nesse catch retorna o erro que vai ser armazenado na variavel $e e com o metodo
    // $e->getMessage() podemos visualizar o erro.