<?php
    $id = "";
    $nome = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];

        $arq = fopen("usuarios.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){

            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $id){
                $nome = $colunaDados[1];
                break;
            }
        }

        fclose($arq);
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

    <form action="alterarNoArquivo.php" method="POST">
        ID: <input type="number" name="id" value="<?php echo $id ?>">
        <br><br>
        Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
        <br><br>

        <input type="submit" value="Alterar usuário">
    </form>
</body>
</html>
