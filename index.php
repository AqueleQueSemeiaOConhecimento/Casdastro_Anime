<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Anime</title>
    </head>
    <body>
        <h2>Cadastrar anime</h2>
        <a href="">Ver registros</a>
        <br>
        <br>

        <form action="./post.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>

            <label for="descricao">Sinopse:</label>
            <input type="text" id="descricao" name="descricao" required>
            <br>

            <label for="lancamento">Ano de Lançamento:</label>
            <input type="number" id="lancamento" name="lancamento">
            <br>
            <br>

            <label for="genero">Generos do Anime</label>
            <br>

            <label for="opcao1"> Hentai
                <input type="checkbox" id="opcao1" name="genero[]" value="Hentai">
            </label>
            <br>
            <label for="opcao2"> Ação
                <input type="checkbox" id="opcao2" name="genero[]" value="Ação">
            </label>
            <br>
            <label for="opcao3"> Aventura
                <input type="checkbox" id="opcao3" name="genero[]" value="Aventura">
            </label>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>