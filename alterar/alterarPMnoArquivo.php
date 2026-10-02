<?php
    $msg = "";
    $idPergunta = "";
    $pergunta = "";
    $a = "";
    $b = "";
    $c = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idPergunta = $_POST['idPergunta'];
        $pergunta = $_POST['pergunta'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        //pergunta
        $arq = fopen("../perguntas.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $idPergunta){
                $linha = $idPergunta . ";" . $pergunta . "\n";
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("../perguntas.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arq, $novoArquivo);
        fclose($arq);

        //resposta
        $novoArquivo = "";
        $arq = fopen("../respostas.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[1] == $idPergunta){

                if($colunaDados[0] == $idPergunta){
                    $linha = $colunaDados[0] . ";" . $idPergunta . ";" . $a . ";" . $colunaDados[3] . "\n";
                }

                if($colunaDados[0] == $idPergunta + 1){
                    $linha = $colunaDados[0] . ";" . $idPergunta . ";" . $b . ";" . $colunaDados[3] . "\n";
                }

                if($colunaDados[0] == $idPergunta + 2){
                    $linha = $colunaDados[0] . ";" . $idPergunta . ";" . $c . ";" . $colunaDados[3] . "\n";
                }
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("../respostas.txt", "w") or die("erro ao abrir arquivo");
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
