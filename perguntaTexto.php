<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pergunta = $_POST['pergunta'];

        if (file_exists("../perguntasTexto.txt")) {
            $linhas = file("../perguntasTexto.txt", FILE_IGNORE_NEW_LINES); //aqui é pra criar um id pra pergunta 
            $id = count($linhas);
        } else {
            $id = 1;
        }

        if(!file_exists("../perguntasTexto.txt")){
            $arqPerguntas = fopen("../perguntasTexto.txt", "w") or die("erro ao incluir");
            $linha = "id;pergunta;\n";
            fwrite($arqPerguntas, $linha);
            fclose($arqPerguntas);
        }

        $arqPerguntas = fopen("../perguntasTexto.txt", "a") or die("erro ao incluir");
        $linha = $id . ";" . $pergunta . "\n";
        fwrite($arqPerguntas, $linha);
        fclose($arqPerguntas);

        $idPergunta = $id;

        include("respostaTexto.php");

        echo "Pergunta cadastrada!!";
    }
?>