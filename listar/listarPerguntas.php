<?php

    $arqPerguntas = fopen("../perguntas.txt", "r");

    fgets($arqPerguntas);

    while(($linha = fgets($arqPerguntas)) !== false){
        $dados = explode(";", $linha);
        $idPergunta = $dados[0];

        echo "ID: " . $dados[0] . "<br>";
        echo "Pergunta: " . $dados[1] . "<br>";

        $arqRespostas = fopen("../respostas.txt", "r");
        $letra = "A";

        while(($linhaResposta = fgets($arqRespostas)) !== false){

            $dadosResposta = explode(";", $linhaResposta);
            if($dadosResposta[1] == $idPergunta){
                echo $letra . ") " . $dadosResposta[2];

                if($dadosResposta[3] == "1"){
                    echo " (CORRETA)";
                }

                echo "<br>";

                $letra++;
            }
        }

        fclose($arqRespostas);

        echo "<br>";
    }

    fclose($arqPerguntas);

    //agora eh perguntas de texto
    $arqPerguntasM = fopen("../perguntasTexto.txt", "r");

    fgets($arqPerguntasM);

    while(($linha = fgets($arqPerguntasM)) !== false){
        $dados = explode(";", $linha);
        $idPergunta = $dados[0];

        echo "ID: " . $dados[0] . "<br>";
        echo "Pergunta: " . $dados[1] . "<br>";

        $arqRespostasM = fopen("../respostasTexto.txt", "r") or die("erro");

        while(($linhaResposta = fgets($arqRespostasM)) !== false){

            $dadosResposta = explode(";", $linhaResposta);
            if($dadosResposta[1] == $idPergunta){
                echo "R: " . $dadosResposta[2];
                echo "<br>";
                break;
            }
        }

        fclose($arqRespostasM);
        echo "<br>";
    }
    fclose($arqPerguntasM);

?>



