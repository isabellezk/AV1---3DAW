<?php
    $idPergunta = "";
    $pergunta = "";
    $respostaA = "";
    $respostaB = "";
    $respostaC = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idPergunta'])){
        $idPergunta = $_GET['idPergunta'];
        
        //pergunta
        $arq = fopen("../perguntas.txt", "r") or die("erro ao abrir arquivo");

            while(($linha=fgets($arq)) != false){

                $colunaDados = explode(";", $linha);

                if($colunaDados[0] == $idPergunta){
                    $pergunta = $colunaDados[1];
                    break;
                }
            }

        fclose($arq);

        //respostas  
        $arqR = fopen("../respostas.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arqR)) != false){

            $colunaDados = explode(";", $linha);

            if($colunaDados[1] == $idPergunta){

                if($colunaDados[0] == $idPergunta){
                    $respostaA = $colunaDados[2];
                }

                if($colunaDados[0] == $idPergunta + 1){
                    $respostaB = $colunaDados[2];
                }

                if($colunaDados[0] == $idPergunta + 2){
                    $respostaC = $colunaDados[2];
                }
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

    <form action="alterarPMnoArquivo.php" method="POST">
        ID: <input type="number" name="idPergunta" value="<?php echo $idPergunta ?>">
        <br><br>

        Pergunta: <input type="text" name="pergunta" value="<?php echo $pergunta ?>">
        <br><br>

        A: <input type="text" name="a" value="<?php echo $respostaA ?>">
        <br><br>

        B: <input type="text" name="b" value="<?php echo $respostaB ?>">
        <br><br>

        C: <input type="text" name="c" value="<?php echo $respostaC ?>">
        <br><br>

        <input type="submit" value="Alterar pergunta">
    </form>

</body>
</html>