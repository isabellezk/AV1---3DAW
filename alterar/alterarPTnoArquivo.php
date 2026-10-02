<?php
    $msg = "";
    $idPergunta = "";
    $pergunta = "";
    $resposta = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idPergunta = $_POST['idPergunta'];
        $pergunta = $_POST['pergunta'];
        $resposta = $_POST['resposta'];

        //pergunta
        $arq = fopen("../perguntasTexto.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $idPergunta){
                $linha = $idPergunta . ";" . $pergunta . "\n";
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("../perguntasTexto.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arq, $novoArquivo);
        fclose($arq);

        //resposta
        $novoArquivo = "";
        $arq = fopen("../respostasTexto.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[1] == $idPergunta){
                $linha = $colunaDados[0] . ";" . $idPergunta . ";" . $resposta . "\n";
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("../respostasTexto.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arq, $novoArquivo);
        fclose($arq);

        $msg = "Pergunta alterada com sucesso!!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta</h1>

    <?php echo $msg ?>
</body>
</html>
