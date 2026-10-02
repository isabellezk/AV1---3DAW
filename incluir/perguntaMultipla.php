<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pergunta = $_POST['pergunta'];

        if (file_exists("../perguntas.txt")) {
            $linhas = file("../perguntas.txt", FILE_IGNORE_NEW_LINES); //aqui é pra criar um id pra pergunta 
            $id = count($linhas);
        } else {
            $id = 1;
        }

        if(!file_exists("../perguntas.txt")){
            $arqPerguntas = fopen("../perguntas.txt", "w") or die("erro ao incluir");
            $linha = "id;pergunta;\n";
            fwrite($arqPerguntas, $linha);
            fclose($arqPerguntas);
        }

        $arqPerguntas = fopen("../perguntas.txt", "a") or die("erro ao incluir");
        $linha = $id . ";" . $pergunta . "\n";
        fwrite($arqPerguntas, $linha);
        fclose($arqPerguntas);

        include("respostaMultipla.php");

        echo "Pergunta cadastrada!!";
    }
?>
