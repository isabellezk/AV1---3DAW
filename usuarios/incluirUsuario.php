<?php
    $msg = "";
    $nome = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];

        if (file_exists("usuarios.txt")) {
            $linhas = file("usuarios.txt", FILE_IGNORE_NEW_LINES); //aqui é pra criar um id pro usuario 
            $id = count($linhas);
        } else {
            $id = 1;
        }

    
        if(!file_exists("usuarios.txt")){
            $arqUsuarios = fopen("usuarios.txt", "w") or die("erro ao incluir");
            $linha = "id;nome;\n";
            fwrite($arqUsuarios, $linha);
            fclose($arqUsuarios);
        }

        $arqUsuarios = fopen("usuarios.txt", "a") or die("erro ao incluir");
        $linha = $id . ";" . $nome . "\n";
        fwrite($arqUsuarios, $linha);
        fclose($arqUsuarios);

        $msg = "Deu tudo certo!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Usuário</title>
</head>
<body>
    <h1>Incluir usuário</h1>

    <form action="incluirUsuario.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        <input type="submit" value="Incluir">
    </form>

    <p><?php echo $msg ?></p>
</body>
</html>
