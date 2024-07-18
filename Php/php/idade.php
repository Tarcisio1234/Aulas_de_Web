<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Idade</title>
</head>
<body>
    <?php
    $nome = $_GET['txtNome'];
    $ano = $_GET['txtAno'];
    $sexo = $_GET['txtSexo'];
    $idade = date("Y") - $ano;


    echo "Seu nome é $nome e você tem $idade de idade e o seu sexo é $sexo";

    ?>
</body>
</html>