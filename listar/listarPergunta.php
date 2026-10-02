<?php
    if(isset($_GET['idPergunta'])){
        $tipo = $_GET['tipo'];
        $idPergunta = $_GET['idPergunta'];

        if($tipo == 'multipla'){
            $arqPerguntas = fopen("../perguntas.txt", "r") or die("erro");

            fgets($arqPerguntas);

            while(($linha = fgets($arqPerguntas)) !== false){
                $dados = explode(";", $linha);

                if($dados[0] == $idPergunta){
                    echo "Pergunta: " . $dados[1] . "<br>";
                }
            }
            fclose($arqPerguntas);
        } 
        else 
        {
            $arqPerguntas = fopen("../perguntasTexto.txt", "r") or die("erro");

            fgets($arqPerguntas);

            while(($linha = fgets($arqPerguntas)) !== false){
                $dados = explode(";", $linha);

                if($dados[0] == $idPergunta){
                    echo "Pergunta: " . $dados[1] . "<br>";
                }
            }

            fclose($arqPerguntas);
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar pergunta</title>
</head>
<body>
    <h1>Listar Pergunta</h1>

    <form action="listarPergunta.php" method="GET">
        Tipo de pergunta:
        <select name="tipo">
            <option value="multipla">Múltipla escolha</option>
            <option value="texto">Texto</option>
        </select>
        <br><br>

        Digite o ID da pergunta: <input type="number" name="idPergunta">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
