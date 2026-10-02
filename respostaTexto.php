<?php

    if(isset($idPergunta)){

        if (!file_exists("../respostasTexto.txt")) {
            $arqRespostas = fopen("../respostasTexto.txt", "w");
            fwrite($arqRespostas, "id;idPergunta;resposta\n");
            fclose($arqRespostas);
        }

        $arqRespostas = fopen("../respostasTexto.txt", "a");
        $linha = $idPergunta . ";" . $idPergunta . ";" . $_POST['resposta'] . "\n";
        fwrite($arqRespostas, $linha);
        fclose($arqRespostas);
    }

?>