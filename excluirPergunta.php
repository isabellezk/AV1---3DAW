<?php
    $msg = "";
    $novoArquivo = "";

    if(isset($_GET['idPergunta'])){
        $tipo = $_GET['tipo'];
        $idPergunta = $_GET['idPergunta'];

        if($tipo == 'multipla'){
            //excluindo pergunta
            $arqPerguntas = fopen("../perguntas.txt", "r") or die("erro");

            while(($linha = fgets($arqPerguntas)) !== false){
                $dados = explode(";", $linha);

                if($dados[0] != $idPergunta){
                    $novoArquivo = $novoArquivo . $linha;
                }
            }
            fclose($arqPerguntas);

            $arqPerguntas = fopen("../perguntas.txt", "w") or die("erro ao abrir arquivo");
            fwrite($arqPerguntas, $novoArquivo);
            fclose($arqPerguntas);

            //excluindo resposta
            $novoArquivo = "";
            $arqRespostas = fopen("../respostas.txt", "r") or die("erro");

            while(($linha = fgets($arqRespostas)) !== false){
                $dados = explode(";", $linha);

                if($dados[1] != $idPergunta){
                    $novoArquivo = $novoArquivo . $linha;
                }
            }
            fclose($arqRespostas);

            $arqRespostas = fopen("../respostas.txt", "w") or die("erro ao abrir arquivo");
            fwrite($arqRespostas, $novoArquivo);
            fclose($arqRespostas);


            $msg = "Pergunta excluída com sucesso!!!";
        } 
        else 
        {
            $novoArquivo = "";
            $arqPerguntas = fopen("../perguntasTexto.txt", "r") or die("erro");

            while(($linha = fgets($arqPerguntas)) !== false){
                $dados = explode(";", $linha);

                if($dados[0] != $idPergunta){
                    $novoArquivo = $novoArquivo . $linha;
                }
            }
            fclose($arqPerguntas);

            $arqPerguntas = fopen("../perguntasTexto.txt", "w") or die("erro ao abrir arquivo");
            fwrite($arqPerguntas, $novoArquivo);
            fclose($arqPerguntas);

            //excluindo resposta
            $novoArquivo = "";
            $arqRespostas = fopen("../respostasTexto.txt", "r") or die("erro");

            while(($linha = fgets($arqRespostas)) !== false){
                $dados = explode(";", $linha);

                if($dados[1] != $idPergunta){
                    $novoArquivo = $novoArquivo . $linha;
                }
            }
            fclose($arqRespostas);

            $arqRespostas = fopen("../respostasTexto.txt", "w") or die("erro ao abrir arquivo");
            fwrite($arqRespostas, $novoArquivo);
            fclose($arqRespostas);


            $msg = "Pergunta excluída com sucesso!!!";
        }

    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>

    <form action="excluirPergunta.php" method="GET">
        Tipo de pergunta:
        <select name="tipo">
            <option value="multipla">Múltipla escolha</option>
            <option value="texto">Texto</option>
        </select>
        <br><br>

        Digite o ID da pergunta: <input type="number" name="idPergunta">
        <br><br>
        <input type="submit" value="Excluir">
    </form>

    <p><?php echo $msg ?></p>
</body>
</html>