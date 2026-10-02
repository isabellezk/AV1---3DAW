<?php
    $msg = "";
    $id = "";
    $nome = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];

        $arq = fopen("usuarios.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $id){
                $linha = $id . ";" . $nome . "\n";
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("usuarios.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arq, $novoArquivo);
        fclose($arq);

        $msg = "Usuário alterado com sucesso!!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <h1>Alterar Usuário</h1>

    <?php echo $msg ?>
</body>
</html>
