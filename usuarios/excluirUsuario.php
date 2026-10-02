<?php
    $msg = "";
    $id = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

        $arqUsuarios = fopen("usuarios.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arqUsuarios)) != false){

            $colunaDados = explode(";", $linha);

            if($colunaDados[0] != $id){
                $novoArquivo = $novoArquivo . $linha;
            }
        }
        fclose($arqUsuarios);

        $arqUsuarios = fopen("usuarios.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arqUsuarios, $novoArquivo);
        fclose($arqUsuarios);

        $msg = "Usuário excluido!!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
</head>
<body>
    <h1>Excluir Usuário</h1>

    <form action="excluirUsuario.php" method="POST">
        Digite o id do usuário para a exclusão: <input type="number" name="id">
        <br><br>
        <input type="submit" value="Excluir usuário">
    </form>

    <p><?php echo $msg ?></p>
</body>
</html>
