<?php
    $idPergunta = "";
    $pergunta = "";
    $resposta = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idPergunta'])){
        $idPergunta = $_GET['idPergunta'];
        
        //pergunta
        $arq = fopen("../perguntasTexto.txt", "r") or die("erro ao abrir arquivo");

            while(($linha=fgets($arq)) != false){

                $colunaDados = explode(";", $linha);

                if($colunaDados[0] == $idPergunta){
                    $pergunta = $colunaDados[1];
                    break;
                }
            }

        fclose($arq);

        //respostas  
        $arqR = fopen("../respostasTexto.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arqR)) != false){

            $colunaDados = explode(";", $linha);

            if($colunaDados[1] == $idPergunta){
                $resposta = $colunaDados[2];
                break;
            }
        }

        fclose($arqR);
                
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

    <form action="alterarPTnoArquivo.php" method="POST">
        ID: <input type="number" name="idPergunta" value="<?php echo $idPergunta ?>">
        <br><br>
        
        Pergunta: <input type="text" name="pergunta" value="<?php echo $pergunta ?>">
        <br><br>

        Resposta: <input type="text" name="resposta" value="<?php echo $resposta ?>">
        <br><br>

        <input type="submit" value="Alterar pergunta">
    </form>

</body>
</html>
