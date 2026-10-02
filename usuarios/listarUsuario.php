<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <table>
        <tr><th>CÓDIGO</th><th>NOME</th></tr>

        <?php 

            $arq = fopen("usuarios.txt", "r") or die("erro ao abrir arquivo");

            while(($linha=fgets($arq)) != false){

                $colunaDados = explode(";", $linha);

                if ($colunaDados[0] != 'id') {

                    echo 
                    "<tr><td>" . $colunaDados[0] . "</td>" .
                        "<td>" . $colunaDados[1] . "</td>" ;
                    echo "</tr>";
                }
            }

            fclose($arq);
        ?>
    </table>
</body>
</html>
