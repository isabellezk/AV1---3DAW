<?php
    $idPergunta = $id;
    $certa = $_POST['certa'];
    
    if (!file_exists("../respostas.txt")) {
        $arqRespostas = fopen("../respostas.txt", "w");

        fwrite($arqRespostas, "id;idPergunta;resposta;certa\n");

        fclose($arqRespostas);
    }

    $arqRespostas = fopen("../respostas.txt", "a");

    $linha = $id . ";" . $idPergunta . ";" . $_POST['a'] . ";" . ($certa == 'a' ? '1' : '0') . "\n";
    fwrite($arqRespostas, $linha);

    $id++;

    $linha = $id . ";" . $idPergunta . ";" . $_POST['b'] . ";" . ($certa == 'b' ? '1' : '0') . "\n";
    fwrite($arqRespostas, $linha);

    $id++;

    $linha = $id . ";" . $idPergunta . ";" . $_POST['c'] . ";" . ($certa == 'c' ? '1' : '0') . "\n";

    fwrite($arqRespostas, $linha);
    fclose($arqRespostas);
?>